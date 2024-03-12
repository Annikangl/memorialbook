<?php

namespace Tests\Feature\Auth;

use App\Enums\UserRole;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Tests\TestCase;

class UserRegistrationTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function test_user_registration(): void
    {
        $endpoint = $this->getBaseUrl() . '/api/v1/auth/register';
        $userData = $this->getUserData();

        $response = $this->json('POST', $endpoint, $userData->toArray());

        dump($response->json());

        $response->assertStatus(Response::HTTP_CREATED);

        $response->assertJson(['status' => true]);

        $this->assertDatabaseHas('users', [
            'email' => $userData->get('email'),
            'username' => $userData->get('username'),
            'role' => UserRole::ROLE_USER
        ]);

        $this->assertDatabaseMissing('users', [
            'role' => UserRole::ROLE_SELLER
        ]);
    }

    public function test_seller_registration(): void
    {
        $endpoint = $this->getBaseUrl() . '/api/v1/auth/register';
        $userData = $this->getUserData();

        $response = $this->json('POST', $endpoint, $userData->toArray());

        $response->assertStatus(Response::HTTP_CREATED);

        $this->assertDatabaseHas('users', [
            'email' => $userData->get('email'),
            'username' => $userData->get('username'),
            'role' => UserRole::ROLE_SELLER
        ]);
    }

    protected function getUserData(): Collection
    {
        return collect([
            'username' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => $password = $this->faker->password(),
            'password_confirmation' => $password,
            'fcm_token' => $this->faker->randomElement([
                null,
                $this->faker->sha256()
            ]),
            'device_name' => $this->faker->userAgent(),
            'location' => substr($this->faker->country(), 0, 15),
        ]);
    }

    private function getBaseUrl(): string
    {
        return  config('app.url');
    }
}
