<?php

namespace App\Http\Controllers\Api\v1\Community\Post;

use App\DTOs\Community\CommunityPostDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Community\Post\CommunityPostRequest;
use App\Services\Community\PostService;
use WendellAdriel\ValidatedDTO\Exceptions\CastTargetException;
use WendellAdriel\ValidatedDTO\Exceptions\MissingCastTypeException;

class PostController extends Controller
{
    public function __construct(private PostService $postService)
    {
    }

    public function index()
    {

    }

    /**
     * @throws CastTargetException
     * @throws MissingCastTypeException
     */
    public function store(CommunityPostRequest $request)
    {
        $postDto = CommunityPostDTO::fromArray($request->validated());

        $post = $this->postService->create($postDto, auth('sanctum')->user());

    }
}
