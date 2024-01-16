<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Community\Community;
use App\Models\Community\Posts\Post;
use App\Policies\Community\CommunityPolicy;
use App\Policies\Community\Post\PostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Post::class => PostPolicy::class,
        Community::class => CommunityPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
