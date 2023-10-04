<?php


namespace App\Services;

use App\DTOs\Profile\HumanDTO;
use App\Models\Profile\Base\Profile;
use App\Models\Profile\Human\Human;
use App\Models\User\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\Exceptions\MediaCannotBeDeleted;

class HumanService
{
    public function create(int $userId, HumanDTO $humanDTO, bool $draft = false): Human
    {
        try {
            $human = DB::transaction(function () use ($humanDTO, $userId, $draft) {

                $human = Human::make([
                    'first_name' => $humanDTO->first_name,
                    'last_name' => $humanDTO->last_name,
                    'middle_name' => $humanDTO->middle_name,
                    'description' => $humanDTO->description,
                    'gender' => $humanDTO->gender,
                    'hobbies' => $humanDTO->hobbies,
                    'religions' => $humanDTO->religions,
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

                $human->save();

                return $human;
            });

            if ($humanDTO->avatar) {
                $this->uploadMedia($human, 'avatars', $humanDTO->avatar);
            }

            if ($humanDTO->banner) {
                $this->uploadMedia($human, 'banners', $humanDTO->banner);
            }

            if ($humanDTO->gallery) {
                foreach ($humanDTO->gallery as $image) {
                    $this->uploadMedia($human, 'gallery', $image);
                }
            }

            if ($humanDTO->death_certificate) {
                $this->uploadMedia($human, 'attached_document', $humanDTO->death_certificate);
            }

        } catch (\Throwable $exception) {
            throw new \DomainException($exception->getMessage());
        }

        return $human;
    }

    /**
     * @throws MediaCannotBeDeleted
     * @throws \Throwable
     */
    public function update(int $id, HumanDTO $humanDTO, User $user, bool $isDraft): Human
    {
        $human = Human::query()->find($id);

        $human->fill([
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
            'status' => $isDraft ? Profile::STATUS_DRAFT : Profile::STATUS_ACTIVE,
            'access' => $humanDTO->access,
            'father_id' => $humanDTO->father_id,
            'mother_id' => $humanDTO->mother_id,
            'spouse_id' => $humanDTO->spouse_id,
            'religion_id' => $humanDTO->religion_id,
        ]);

        $human->save();

        if ($humanDTO->removedImageIds) {
            foreach ($humanDTO->removedImageIds as $mediaId) {
                $this->deleteMedia($human, $mediaId);
            }
        }

        if ($humanDTO->avatar) {
            $this->uploadMedia($human, 'avatars', $humanDTO->avatar);
        }

        if ($humanDTO->gallery) {
            foreach ($humanDTO->gallery as $image) {
                $this->uploadMedia($human, 'gallery', $image);
            }
        }

        return $human;
    }

    /**
     * @throws FileIsTooBig
     * @throws FileDoesNotExist
     */
    private function uploadMedia(Human $human, string $collectionName, UploadedFile $file): void
    {
        $human->addMedia($file)->toMediaCollection($collectionName);
    }

    /**
     * @throws MediaCannotBeDeleted
     */
    private function deleteMedia(Human $user, int $mediaId): void
    {
        $user->deleteMedia($mediaId);
    }
}
