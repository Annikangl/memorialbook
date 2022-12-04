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
    private FileUploader $fileUploader;

    public function __construct(FileUploader $fileUploader)
    {
        $this->fileUploader = $fileUploader;
    }

    public function create(int $userId, array $data): Human
    {
        $avatarPath = Profile::EMPTY_AVATAR_PATH;
        $documentPath = null;
        $cemetery = null;

        if (isset($data['avatar'])) {
            $avatarPath = $this->fileUploader
                ->upload($data['avatar'], Human::AVATAR_PATH);
        }

        if (isset($data['death_certificate'])) {
            $documentPath = $this->fileUploader
                ->upload($data['death_certificate'], Human::DOCUMENTS_PATH);
        }

        try {
            return DB::transaction(function () use ($avatarPath, $documentPath, $data, $userId, $cemetery) {

                if ($data['burial_place']) {
                    $cemetery = Cemetery::createFromProfile(
                        \Auth::id(),
                        $data['burial_place'],
                        $data['burial_place_coords'],
                        $data['burial_place'],
                    );
                }

                $human = Human::make([
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'description' => $data['description'],
                    'gender' => $data['gender'],
                    'avatar' => $avatarPath,
                    'date_birth' => $data['date_birth'],
                    'date_death' => $data['date_death'],
                    'birth_place' => $data['birth_place'],
                    'burial_place' => $data['burial_place'],
                    'latitude' => $data['burial_place_coords']['lat'] ?? null,
                    'longitude' => $data['burial_place_coords']['lng'] ?? null,
                    'death_reason' => $data['death_reason'],
                    'death_certificate' => $documentPath,
                    'status' => Human::STATUS_ACTIVE,
                    'access' => $data['access']
                ]);

                $human->users()->associate($userId);
                $human->cemeteries()->associate($cemetery);

                $human->father()->associate($data['father_id']['id'] ?? null);
                $human->father()->associate($data['mother_id']['id'] ?? null);
                $human->father()->associate($data['spouse_id']['id'] ?? null);
                $human->father()->associate($data['religious_id']['id'] ?? null);

                $human->save();

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
                        $images_path = $this->fileUploader->upload($image, Human::GALLERY_PATH);

                        $human->galleries()->create([
                            'item' => $images_path,
                            'item_sm' => $images_path,
                            'extension' => $image->extension(),
                            'human_id' => $human->id
                        ]);
                    }
                }

                return $human;
            });

        } catch (\Throwable $exception) {
            throw new \DomainException($exception->getMessage());
        }
    }

    public function createPet(int $ownerId, array $data): Pet
    {
        $avatarPath = Profile::EMPTY_AVATAR_PATH;
        $bannerPath = null;

        if (isset($data['avatar'])) {
            $avatarPath = $this->fileUploader->upload($data['avatar'], Pet::AVATAR_PATH);
        }

        if (isset($data['pet_banner'])) {
            $bannerPath = $this->fileUploader->upload($data['pet_banner'], Pet::BANNER_PATH);
        }

        try {
            return DB::transaction(function () use ($data, $avatarPath, $bannerPath, $ownerId) {
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
                    'avatar' => $avatarPath,
                    'banner' => $bannerPath,
                ]);

                $pet->user()->associate($ownerId);

                $pet->save();

                if (isset($data['pet_gallery'])) {
                    /** @var UploadedFile $item */
                    foreach ($data['pet_gallery'] as $item) {
                        $itemPath = $this->fileUploader->upload($item, Pet::GALLERY_PATH);

                        $pet->galleries()->create([
                            'item' => $itemPath,
                            'extension' => $item->getExtension(),
                        ]);
                    }
                }

                return $pet;
            });
        } catch (\DomainException $exception) {
            throw new \DomainException($exception->getMessage());
        } catch (\Throwable $e) {
            throw new \DomainException($e->getMessage());
        }
    }

    public function search(string $searchText): LengthAwarePaginator
    {
        return Human::bySearch($searchText)->paginate(5);
    }
}
