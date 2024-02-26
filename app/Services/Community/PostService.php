<?php

namespace App\Services\Community;

use App\DTOs\Community\CommunityPostDTO;
use App\Events\CommunityPostCreated;
use App\Exceptions\Api\Community\Post\CommunityPostException;
use App\Models\Community\Community;
use App\Models\Community\Posts\MediaPost;
use App\Models\Community\Posts\Post;
use App\Models\Community\Posts\TextPost;
use App\Models\Community\Posts\TextWithMediaPost;
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
     * @param Community $community
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

    /**
     * Create only text content post
     * @param CommunityPostDTO $communityPostDTO
     * @return TextPost
     */
    public function createTextPost(CommunityPostDTO $communityPostDTO): TextPost
    {
        return TextPost::query()->create([
            'title' => $communityPostDTO->title,
            'description' => $communityPostDTO->description
        ]);
    }

    /**
     * Create only media content post
     * @param CommunityPostDTO $communityPostDTO
     * @return MediaPost
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function createMediaPost(CommunityPostDTO $communityPostDTO): MediaPost
    {
        $filenames = $this->getFilenames($communityPostDTO->post_media);

        $postContent = MediaPost::query()->create([
            'filename' => implode(',', $filenames)
        ]);

        foreach ($communityPostDTO->post_media as $media) {
            /** @var UploadedFile $media */
            $postContent->addMedia($media)->toMediaCollection('gallery');
        }

        return $postContent;
    }

    /**
     * Create text with media post
     * @param CommunityPostDTO $postDTO
     * @return TextWithMediaPost
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function createTextWithMediaPost(CommunityPostDTO $postDTO): TextWithMediaPost
    {
        $postContent = TextWithMediaPost::query()->create([
            'title' => $postDTO->title,
            'description' => $postDTO->description
        ]);

        foreach ($postDTO->post_media as $media) {
            /** @var UploadedFile $media */
            $postContent->addMedia($media)->toMediaCollection('gallery');
        }

        return $postContent;
    }

    /**
     * @param Post $post
     * @param CommunityPostDTO $communityPostDTO
     * @return Post
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     * @throws MediaCannotBeDeleted
     */
    public function update(Post $post, CommunityPostDTO $communityPostDTO): Post
    {
        $contentPost = $this->updatePostContent($post, $communityPostDTO);

        return $contentPost->post;
    }

    /**
     * Update text post
     * @param Post $post
     * @param CommunityPostDTO $postDTO
     * @return TextPost
     */
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
     * Update media post
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
     * @param CommunityPostDTO $communityPostDTO
     * @return Post|TextPost|MediaPost|TextWithMediaPost|null
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    protected function createPostContent(CommunityPostDTO $communityPostDTO): Post|TextPost|MediaPost|TextWithMediaPost|null
    {
        return match ($communityPostDTO->content_type) {
            Post::TYPE_TEXT => $this->createTextPost($communityPostDTO),
            Post::TYPE_MEDIA => $this->createMediaPost($communityPostDTO),
            Post::TYPE_TEXT_WITH_MEDIA => $this->createTextWithMediaPost($communityPostDTO),
            default => null,
        };
    }

    /**
     * @param Post $post
     * @param CommunityPostDTO $communityPostDTO
     * @return TextPost|MediaPost|null
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     * @throws MediaCannotBeDeleted
     */
    protected function updatePostContent(Post $post, CommunityPostDTO $communityPostDTO): TextPost|MediaPost|null
    {
        return match ($communityPostDTO->content_type) {
            Post::TYPE_TEXT => $this->updateTextPost($post, $communityPostDTO),
            Post::TYPE_MEDIA => $this->updateMediaPost($post, $communityPostDTO),
            default => null,
        };
    }

    protected function getFilenames($mediaArray): array
    {
        return collect($mediaArray)->map(function (UploadedFile $media) {
            return $media->getClientOriginalName();
        })->toArray();
    }

}
