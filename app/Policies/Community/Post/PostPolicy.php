<?php

namespace App\Policies\Community\Post;

use App\Exceptions\Api\Auth\UnauthorizedActionException;
use App\Models\Community\Community;
use App\Models\User\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @throws UnauthorizedActionException
     */
    public function create(User $user, Community $community): bool
    {
        if (!$user->isCommunityOwner($community)) {
            throw new UnauthorizedActionException('This action is unauthorized', 403);
        }

        return true;
    }

    /**
     * @throws UnauthorizedActionException
     */
    public function update(User $user, Community $community): bool
    {
        if (!$user->isCommunityOwner($community)) {
            throw new UnauthorizedActionException('This action is unauthorized', 403);
        }

        return true;
    }

    /**
     * @throws UnauthorizedActionException
     */
    public function delete(User $user, Community $community): bool
    {
        if (!$user->isCommunityOwner($community)) {
            throw new UnauthorizedActionException('This action is unauthorized', 403);
        }

        return true;
    }
}
