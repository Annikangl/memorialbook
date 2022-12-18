<?php


namespace App\Services;


use App\Classes\Files\FileUploader;
use App\Http\Requests\Profile\ProfileCreateRequest;
use App\Models\Cemetery\Cemetery;
use App\Models\Profile\Base\Profile;
use App\Models\Profile\Human\Human;
use App\Models\Profile\Pet\Pet;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class ProfileService
{
    public function create(int $userId, array $data): Human
    {
        $cemetery = null;

        try {
            return DB::transaction(function () use ($data, $userId, $cemetery) {


                $human = Human::make([
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'description' => $data['description'],
                    'gender' => $data['gender'],
                    'date_birth' => $data['date_birth'],
                    'date_death' => $data['date_death'],
                    'birth_place' => $data['birth_place'],
                    'burial_place' => $data['burial_place'],
                    'latitude' => $data['burial_place_coords']['lat'] ?? null,
                    'longitude' => $data['burial_place_coords']['lng'] ?? null,
                    'death_reason' => $data['death_reason'],
                    'status' => Human::STATUS_ACTIVE,
                    'access' => $data['access']
                ]);

                $human->users()->associate($userId);

                $human->father()->associate($data['father_id']['id'] ?? null);
                $human->father()->associate($data['mother_id']['id'] ?? null);
                $human->father()->associate($data['spouse_id']['id'] ?? null);
                $human->father()->associate($data['religious_id']['id'] ?? null);

                if ($data['burial_place']) {
                    $cemetery = Cemetery::createFromProfile(
                        \Auth::id(),
                        $data['burial_place'],
                        $data['burial_place_coords'],
                        $data['burial_place'],
                    );
                }

                $human->cemeteries()->associate($cemetery);

                $human->save();

                if (isset($data['avatar'])) {
                    $human->addMedia($data['avatar'])
                        ->toMediaCollection('avatars');
                }

                if ($data['father_id'] || $data['mother_id']) {
                    Human::updateChildForParent($data['father_id']['id']
                        ?? $data['mother_id']['id'],
                        $human->id
                    );
                }

                if ($spouse = $data['spouse_id']) {
                    Human::updateSpouse($spouse['id'], $human->id);
                }

                if (isset($data['profile_images'])) {
                    foreach ($data['profile_images'] as $image) {
                        $human->addMedia($image)->toMediaCollection('gallery');
                    }
                }

                if (isset($data['death_certificate'])) {
                    $human->addMedia($data['death_certificate'])->toMediaCollection('attached_document');
                }

                return $human;
            });

        } catch (\Throwable $exception) {
            throw new \DomainException($exception->getMessage());
        }
    }

    public function createPet(int $ownerId, array $data): Pet
    {
        try {
            return DB::transaction(function () use ($data, $ownerId) {
                /** @var Pet $pet */
                $pet = Pet::query()->make([
                    'name' => $data['name'],
                    'breed' => $data['breed'],
                    'date_birth' => $data['date_birth'],
                    'date_death' => $data['date_death'],
                    'birth_place' => $data['birth_place'],
                    'burial_place' => $data['burial_place'],
                    'death_reason' => $data['death_reason'],
                    'description' => $data['description'],
                ]);

                $pet->user()->associate($ownerId);

                $pet->save();

                if (isset($data['avatar'])) {
                    $pet->addMedia($data['avatar'])->toMediaCollection('avatars');
                }

                if (isset($data['pet_banner'])) {
                    $pet->addMedia($data['pet_banner'])->toMediaCollection('banner');
                }

                if (isset($data['pet_gallery'])) {
                    foreach ($data['pet_gallery'] as $image) {
                        $pet->addMedia($image)->toMediaCollection('gallery');
                    }
                }

                return $pet;
            });
        } catch (\Throwable $e) {
            throw new \DomainException($e->getMessage());
        }
    }

    public function search(string $searchText): LengthAwarePaginator
    {
        return Human::bySearch($searchText)->paginate(5);
    }
}
