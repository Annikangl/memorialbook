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
use Spatie\MediaLibrary\MediaCollections\Exceptions\MediaCannotBeDeleted;
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

                $post = $contentPost->post()->create([
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

    public function update(Post $post, CommunityPostDTO $communityPostDTO): Post
    {
        $contentPost = $this->updatePostContent($post, $communityPostDTO);

        return $contentPost->post;
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

    public function updateTextPost(Post $post, CommunityPostDTO $postDTO): TextPost
    {
        $updatedData = collect($postDTO->validatedData)
            ->except(['community_id', 'content_type'])
            ->filter()
            ->toArray();

        $post->postable->update($updatedData);

        return $post->postable;
    }

    /**
     * @param Post $post
     * @param CommunityPostDTO $postDTO
     * @return MediaPost
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     * @throws MediaCannotBeDeleted
     */
    public function updateMediaPost(Post $post, CommunityPostDTO $postDTO): MediaPost
    {
        foreach ($postDTO->post_media as $media) {
            /** @var UploadedFile $media */
            $post->postable->addMedia($media)->toMediaCollection('gallery');
        }

        if ($mediaIds = $postDTO->post_media_removed_ids) {
            foreach ($mediaIds as $mediaId) {
                $post->postable->deleteMedia($mediaId);
            }
        }

        return $post->postable;
    }

    /**
     * @param Post $post
     * @return void
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

    /**
     * Pin post in feed
     * @param Post $post
     * @return void
     */
    public function pin(Post $post): void
    {
        $community = $post->community;

        $community->posts()->where('id', '<>', $post->id)->update(['is_pinned' => false]);

        $post->is_pinned = true;
        $post->save();
    }

    /**
     * @throws FileIsTooBig
     * @throws FileDoesNotExist
     */
    protected function createPostContent(CommunityPostDTO $communityPostDTO): Post|TextPost|MediaPost|null
    {
        switch ($communityPostDTO->content_type) {
            case Post::TYPE_TEXT:
                return $this->createTextPost($communityPostDTO);
            case Post::TYPE_MEDIA:
                return $this->createMediaPost($communityPostDTO);
            default:
                return null;
        }
    }

    protected function updatePostContent(Post $post, CommunityPostDTO $communityPostDTO)
    {
        switch ($communityPostDTO->content_type) {
            case Post::TYPE_TEXT:
                return $this->updateTextPost($post, $communityPostDTO);
            case Post::TYPE_MEDIA:
                return $this->updateMediaPost($post, $communityPostDTO);
            default:
                return null;
        }
    }

    protected function getFilenames($mediaArray): array
    {
        return collect($mediaArray)->map(function (UploadedFile $media) {
            return $media->getClientOriginalName();
        })->toArray();
    }

}
