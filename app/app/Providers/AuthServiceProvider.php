<?php

namespace App\Providers;

use App\User;

use App\Post;


use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // チームユーザー
        Gate::define('admin', function (User $user) {
            return ($user->role === 1);
        });

        // 一般ユーザー
        Gate::define('general', function (User $user) {
            return ($user->role === 0);
        });

        // ポスト編集権限
        Gate::define('post', function (User $user, Post $post) {
            return ($user->id === $post->user_id);
        });
    }
}
