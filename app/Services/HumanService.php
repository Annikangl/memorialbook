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

class HumanService
{
    public function create(int $userId, HumanDTO $humanDTO, bool $draft = false): Human
    {
        try {
            $human = DB::transaction(function () use ($humanDTO, $userId, $draft) {

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

                return $human;
            });

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

        } catch (\Throwable $exception) {
            throw new \DomainException($exception->getMessage());
        }

        return $human;
    }
}
