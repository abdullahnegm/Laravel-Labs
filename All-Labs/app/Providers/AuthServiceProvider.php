<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;
use App\Policies\PostPolicy;

use App\Models\Post;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Post::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::define("view-post", function(User $user, Post $post){
        //     return ($user->id === $post->user_id) ? Response::allow("All-owed") : Response::deny("Den-ied");
        // });
        // Gate::define('view-post', function (User $user, Post $post) {
        //     return $user->id === $post->user_id;
        // });
    }
}
