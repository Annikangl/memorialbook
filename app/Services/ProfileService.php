<?php


namespace App\Services;


use App\Classes\Files\FileUploader;
use App\Http\Requests\Profile\ProfileCreateRequest;
use App\Models\Cemetery\Cemetery;
use App\Models\Profile\Profile;
use Illuminate\Support\Facades\DB;

class ProfileService
{
    private FileUploader $fileUploader;

    public function __construct(FileUploader $fileUploader)
    {
        $this->fileUploader = $fileUploader;
    }

    public function create(int $userId, ProfileCreateRequest $request)
    {
        $avatarPath = null;
        $documentPath = null;
        $cemetery = null;

        if ($request->hasFile('avatar')) {
            $avatarPath = $this->fileUploader
                ->upload($request->file('avatar'), Profile::AVATAR_PATH);
        }

        if ($request->hasFile('death_certificate')) {
            $documentPath = $this->fileUploader
                ->upload($request->file('death_certificate'), Profile::DOCUMENTS_PATH);
        }

        try {
            return DB::transaction(function () use ($avatarPath, $documentPath, $request, $userId, $cemetery) {

                if ($request->get('burial_place')) {
                    $cemetery = Cemetery::createFromProfile(
                        $request->get('burial_place'),
                        $request->get('burial_place_coords'),
                        $request->get('burial_place')
                    );
                }

                $profile = Profile::make([
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
                    'status' => Profile::STATUS_MODERATION,
                    'access' => $request->get('access')
                ]);

                $profile->users()->associate($userId);
                $profile->cemeteries()->associate($cemetery);
                $profile->father()->associate($request->get('father_id')['id'] ?? null);
                $profile->mother()->associate($request->get('mother')['id'] ?? null);
                $profile->spouse()->associate($request->get('spouse')['id'] ?? null);
                $profile->religions()->associate($request->get('religious_id')['id'] ?? null);

                $profile->save();

                if ($images = $request->file('profile_images')) {
                    foreach ($images as $image) {
                        $images_path = $this->fileUploader->upload($image, Profile::GALLERY_PATH);

                        $profile->galleries()->create([
                            'item' => $images_path,
                            'item_sm' => $images_path,
                            'extension' => $image->extension(),
                            'profile_id' => $profile->id
                        ]);
                    }
                }

                return $profile;
            });

        } catch (\DomainException $exception) {
            throw $exception;
        }
    }
}
