<?php

namespace App\Http\Controllers\Api\v1\Community\Post;

use App\DTOs\Community\CommunityPostDTO;
use App\Events\CommunityPostCreated;
use App\Exceptions\Api\Community\Post\CommunityPostException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Community\Post\CommunityPostRequest;
use App\Http\Resources\Community\Posts\PostResource;
use App\Models\Community\Community;
use App\Models\Community\Posts\Post;
use App\Services\Community\PostService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Throwable;
use WendellAdriel\ValidatedDTO\Exceptions\CastTargetException;
use WendellAdriel\ValidatedDTO\Exceptions\MissingCastTypeException;

class PostController extends Controller
{
    public function __construct(private PostService $postService)
    {
    }

    /**
     * @param CommunityPostRequest $request
     * @return JsonResponse
     * @throws Throwable|CastTargetException|MissingCastTypeException
     */
    public function store(CommunityPostRequest $request): JsonResponse
    {
        $community = $this->getCommunity($request->validated('community_id'));

        $this->authorize('create', [Post::class, $community]);

        $postDto = CommunityPostDTO::fromArray($request->validated());

        $post = $this->postService->create(
            $postDto,
            auth('sanctum')->user(),
            $community
        );

        return response()->json(['status' => true, 'post' => new PostResource($post)])
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * @throws CastTargetException
     * @throws MissingCastTypeException
     */
    public function update(Post $post, CommunityPostRequest $request)
    {
        $community = $this->getCommunity($request->validated('community_id'));

        $this->authorize('create', [Post::class, $community]);

        $postDto = CommunityPostDTO::fromArray(
            collect($request->validated())->except(['published_at', 'is_pinned'])->toArray()
        );

        $updatedPost = $this->postService->update($post, $postDto);

        return response()->json(['status' => true, 'post' => new PostResource($updatedPost)])
            ->setStatusCode(Response::HTTP_OK);
    }

    public function pin(Post $post)
    {
        $this->postService->pin($post);

        return response()->json(['status' => true, 'message' => 'Post pinned'])
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Delete post
     * @throws CommunityPostException
     */
    public function delete(Post $post): JsonResponse
    {
        $this->authorize('delete', [Post::class, $post->community->getModel()]);

        $this->postService->delete($post);

        return response()->json(['status' => true, 'message' => "Post $post->id deleted"])
            ->setStatusCode(Response::HTTP_OK);
    }

    private function getCommunity(int $communityId): Community
    {
        return Community::find($communityId);
    }
}
