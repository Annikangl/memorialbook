<?php

namespace App\Http\Controllers\Api\v1\Community\Post;

use App\DTOs\Community\CommunityPostDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Community\Post\CommunityPostRequest;
use App\Http\Resources\Community\Posts\PostResource;
use App\Services\Community\PostService;
use Illuminate\Http\Response;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use WendellAdriel\ValidatedDTO\Exceptions\CastTargetException;
use WendellAdriel\ValidatedDTO\Exceptions\MissingCastTypeException;

class PostController extends Controller
{
    public function __construct(private PostService $postService)
    {
    }

    /**
     * @throws \Throwable
     * @throws MissingCastTypeException
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     * @throws CastTargetException
     */
    public function store(CommunityPostRequest $request)
    {
        $postDto = CommunityPostDTO::fromArray($request->validated());

        $post = $this->postService->create($postDto, auth('sanctum')->user());

        return response()->json(['status' => true, 'post' => new PostResource($post)])
            ->setStatusCode(Response::HTTP_CREATED);
    }
}
