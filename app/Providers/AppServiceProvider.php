<?php

namespace App\Providers;

use App\Services\User\UserService;
use Illuminate\Support\ServiceProvider;
use App\Repositories\User\UserRepository;
use App\Services\User\UserServiceImplement;
use App\Repositories\User\UserRepositoryImplement;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Services Binding
        $this->app->bind(UserService::class, UserServiceImplement::class);

        // Repositories Binding
        $this->app->bind(UserRepository::class, UserRepositoryImplement::class);
    }

    /**
     * Bootstrap any application services.
     */
    // public function boot(): void
    // {
    //     //
    // }

    /**
 * Bootstrap any application services.
 *
 * @return void
 */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
