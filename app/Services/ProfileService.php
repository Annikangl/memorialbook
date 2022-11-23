<?php


namespace App\Services;


use App\Classes\Files\FileUploader;
use App\Http\Requests\Profile\ProfileCreateRequest;
use App\Models\Cemetery\Cemetery;
use App\Models\Profile\Human\Human;
use Illuminate\Support\Facades\DB;

class ProfileService
{
    private FileUploader $fileUploader;

    public function __construct(FileUploader $fileUploader)
    {
        $this->fileUploader = $fileUploader;
    }

    public function create(int $userId, ProfileCreateRequest $request): Human
    {
        $avatarPath = null;
        $documentPath = null;
        $cemetery = null;

        if ($request->hasFile('avatar')) {
            $avatarPath = $this->fileUploader
                ->upload($request->file('avatar'), Human::AVATAR_PATH);
        }

        if ($request->hasFile('death_certificate')) {
            $documentPath = $this->fileUploader
                ->upload($request->file('death_certificate'), Human::DOCUMENTS_PATH);
        }

        try {
            return DB::transaction(function () use ($avatarPath, $documentPath, $request, $userId, $cemetery) {

                if ($request->get('burial_place')) {
                    $cemetery = Cemetery::createFromProfile(
                        \Auth::id(),
                        $request->get('burial_place'),
                        $request->get('burial_place_coords'),
                        $request->get('burial_place')
                    );
                }

                $human = Human::make([
                    'first_name' => $request->get('first_name'),
                    'last_name' => $request->get('last_name'),
                    'patronymic' => $request->get('patronymic'),
                    'description' => $request->get('description'),
                    'gender' => $request->get('gender'),
                    'avatar' => $avatarPath,
                    'date_birth' => $request->get('date_birth'),
                    'date_death' => $request->get('date_death'),
                    'birth_place' => $request->get('birth_place'),
                    'burial_place' => $request->get('burial_place'),
                    'latitude' => $request->get('burial_place_coords')['lat'] ?? null,
                    'longitude' => $request->get('burial_place_coords')['lng'] ?? null,
                    'death_reason' => $request->get('death_reason'),
                    'death_certificate' => $documentPath,
                    'status' => Human::STATUS_ACTIVE,
                    'access' => $request->get('access')
                ]);

                $human->users()->associate($userId);
                $human->cemeteries()->associate($cemetery);

                $human->father()->associate($request->get('father_id')['id'] ?? null);
                $human->mother()->associate($request->get('mother_id')['id'] ?? null);
                $human->spouse()->associate($request->get('spouse_id')['id'] ?? null);
                $human->religions()->associate($request->get('religious_id')['id'] ?? null);

                $human->save();

                if ($request->get('father_id') || $request->get('mother_id') ) {
                    Human::updateChildForParent($request->get('father_id')['id']
                        ?? $request->get('mother_id')['id'],
                        $human->id
                    );
                }

                if ($spouse = $request->get('spouse_id')) {
                    Human::updateSpouse($spouse['id'], $human->id);
                }

                if ($images = $request->file('profile_images')) {
                    foreach ($images as $image) {
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
}
