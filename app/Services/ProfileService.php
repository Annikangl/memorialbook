<?php


namespace App\Services;

use App\Models\Cemetery\Cemetery;
use App\Models\Profile\Base\Profile;
use App\Models\Profile\Human\Human;
use App\Models\Profile\Pet\Pet;
use App\Models\Profile\Religion;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class ProfileService
{
    public function create(int $userId, array $data, bool $draft = false): Human
    {
        try {
            return DB::transaction(function () use ($data, $userId, $draft) {

                $human = Human::make([
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'description' => $data['description'],
                    'gender' => $data['gender'],
                    'date_birth' => $data['date_birth'],
                    'date_death' => $data['date_death'],
                    'birth_place' => $data['birth_place'],
                    'burial_place' => $data['burial_place'],
                    'latitude' => $data['burial_coords']['lat'] ?? null,
                    'longitude' => $data['burial_coords']['lng'] ?? null,
                    'death_reason' => $data['death_reason'],
                    'status' => $draft ? Profile::STATUS_DRAFT : Profile::STATUS_ACTIVE,
                    'access' => $data['access']
                ]);

                $human->users()->associate($userId);
                $human->save();

                if (isset($data['father_id']['id'])) {
                    $father = Human::findOrFail($data['father_id']['id']);
                    $human->father()->associate($father);
                    $father->children_id = $human->id;
                    $father->save();
                }

                if (isset($data['mother_id']['id'])) {
                    $mother = Human::findOrFail($data['mother_id']['id']);
                    $human->mother()->associate($mother);
                    $mother->children()->associate($human);
                    $mother->save();
                }

                if (isset($data['spouse_id']['id'])) {
                    $spouse = Human::findOrFail($data['spouse_id']['id']);
                    $human->spouse()->associate($spouse);
                    $spouse->spouse_id = $human->id;
                    $spouse->save();
                }

                if (isset($data['religious_id']['id'])) {
                    $religion = Religion::findOrFail($data['religious_id']['id']);
                    $human->religion()->associate($religion);
                }

                $human->save();

                if (isset($data['avatar'])) {
                    $human->addMedia($data['avatar'])
                        ->toMediaCollection('avatars');
                }

                if (isset($data['profiles_files'])) {
                    foreach ($data['profiles_files'] as $image) {
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

    /**
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function createPet(int $ownerId, array $data): Pet|Builder
    {
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

        if (isset($data['pets_files'])) {
            foreach ($data['pets_files'] as $image) {
                $pet->addMedia($image)->toMediaCollection('gallery');
            }
        }

        return $pet;
    }

    public function search(string $searchText): LengthAwarePaginator
    {
        return Human::bySearch($searchText)->paginate(5);
    }
}
