<?php

namespace App\Services\Community;

use App\DTOs\Community\CommunityPostDTO;
use App\Events\CommunityPostCreated;
use App\Exceptions\Api\Community\Post\CommunityPostException;
use App\Models\Community\Community;
use App\Models\Community\Posts\MediaPost;
use App\Models\Community\Posts\Post;
use App\Models\Community\Posts\TextPost;
use App\Models\Event\Event;
use App\Models\User\User;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Throwable;

class PostService
{
    /**
 * @param CommunityPostDTO $communityPostDTO
 * @param User $user
 * @return Post
 * @throws CommunityPostException
 */
    public function create(CommunityPostDTO $communityPostDTO, User $user, Community $community): Post
    {
        try {
            return DB::transaction(function () use ($communityPostDTO, $user, $community) {
                $contentPost = $this->createPostContent($communityPostDTO);

                $post =  $contentPost->post()->create([
                    'author_id' => $user->id,
                    'community_id' => $communityPostDTO->community_id,
                    'content_type' => $communityPostDTO->content_type,
                    'is_pinned' => $communityPostDTO->is_pinned,
                    'published_at' => $communityPostDTO->published_at,
                ]);

                $event = Event::query()->create([
                    'event_type' => 'community_post',
                    'title' => "{$post->community->title}",
                    'description' => 'Published a new post',
                    'author_avatar_url' => $post->community->getFirstMediaUrl('avatars', 'thumb'),
                ]);

                $event->users()->attach($community->users);

                event(new CommunityPostCreated($post, $event, $community->users));

                return $post;
            });
        } catch (Throwable $exception) {
            throw new CommunityPostException($exception->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @throws FileIsTooBig
     * @throws FileDoesNotExist
     */
    protected function createPostContent(CommunityPostDTO $communityPostDTO): Post|TextPost|MediaPost
    {
        switch ($communityPostDTO->content_type) {
            case Post::TYPE_TEXT:
                return $this->createTextPost($communityPostDTO);
            case Post::TYPE_MEDIA:
                return $this->createMediaPost($communityPostDTO);
        }
    }

    public function createTextPost(CommunityPostDTO $communityPostDTO): TextPost
    {
        return TextPost::query()->create([
            'title' => $communityPostDTO->title,
            'description' => $communityPostDTO->description
        ]);
    }

    /**
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function createMediaPost(CommunityPostDTO $communityPostDTO): MediaPost
    {
        $filenames = $this->getFilenames($communityPostDTO->post_media);

        $postWithMedia = MediaPost::query()->create([
            'filename' => implode(',', $filenames)
        ]);

        foreach ($communityPostDTO->post_media as $media) {
            /** @var UploadedFile $media */
            $postWithMedia->addMedia($media)->toMediaCollection('gallery');
        }

        return $postWithMedia;
    }

    /**
     * @throws CommunityPostException
     */
    public function delete(Post $post): void
    {
        try {
            $post->delete();
        } catch (Throwable $exception) {
            throw new CommunityPostException($exception->getMessage());
        }
    }

    protected function getFilenames($mediaArray): array
    {
        return collect($mediaArray)->map(function (UploadedFile $media) {
            return $media->getClientOriginalName();
        })->toArray();
    }

}
