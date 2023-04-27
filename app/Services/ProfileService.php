<?php


namespace App\Services;

use App\DTOs\Profile\HumanDTO;
use App\Models\Profile\Base\Profile;
use App\Models\Profile\Human\Human;
use App\Models\Profile\Pet\Pet;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class ProfileService
{
    public function create(int $userId, HumanDTO $humanDTO, bool $draft = false): Human
    {
        try {
            return DB::transaction(function () use ($humanDTO, $userId, $draft) {

                $human = Human::make([
                    'first_name' => $humanDTO->first_name,
                    'last_name' => $humanDTO->last_name,
                    'description' => $humanDTO->description,
                    'gender' => $humanDTO->gender,
                    'date_birth' => $humanDTO->date_birth,
                    'date_death' => $humanDTO->date_death,
                    'birth_place' => $humanDTO->birth_place,
                    'burial_place' => $humanDTO->burial_place,
                    'latitude' => $humanDTO->burial_coords['lat'],
                    'longitude' => $humanDTO->burial_coords['lng'],
                    'death_reason' => $humanDTO->death_reason,
                    'status' => $draft ? Profile::STATUS_DRAFT : Profile::STATUS_ACTIVE,
                    'access' => $humanDTO->access
                ]);

                $human->users()->associate($userId);
                $human->save();

                if ($fatherId = $humanDTO->father_id) {
                    $father = Human::findOrFail($fatherId);
                    $human->father()->associate($father);
                    $father->children_id = $human->id;
                    $father->save();
                }

                if ($motherId = $humanDTO->mother_id) {
                    $mother = Human::findOrFail($motherId);
                    $human->mother()->associate($mother);
                    $mother->children()->associate($human);
                    $mother->save();
                }

                if ($spouseId = $humanDTO->spouse_id) {
                    $spouse = Human::findOrFail($spouseId);
                    $human->spouse()->associate($spouse);
                    $spouse->spouse_id = $human->id;
                    $spouse->save();
                }

                if ($religionId = $humanDTO->religion_id) {
                    $human->religion()->associate($religionId);
                }

                $human->save();

                if ($humanDTO->avatar) {
                    $human->addMedia($humanDTO->avatar)
                        ->toMediaCollection('avatars');
                }

                if ($humanDTO->gallery) {
                    foreach ($humanDTO->gallery as $image) {
                        $human->addMedia($image)->toMediaCollection('gallery');
                    }
                }

                if ($humanDTO->death_certificate) {
                    $human->addMedia($humanDTO->death_certificate)
                        ->toMediaCollection('attached_document');
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
