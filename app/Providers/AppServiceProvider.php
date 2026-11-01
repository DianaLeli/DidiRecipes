<?php

namespace App\Providers;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('view-admin', function (User $user) {
            return $user->role == 'admin';
        });

        Gate::define('update-recipe', function (User $user, Recipe $recipe) {
            return $user->isAdmin() || $user->id === $recipe->user_id;
        });

        Gate::define('delete-recipe', function (User $user, Recipe $recipe) {
            return $user->isAdmin() || $user->id === $recipe->user_id;
        });
    }
}
