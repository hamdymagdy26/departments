<?php

namespace App\Providers;

use App\Repositories\Auth\AuthRepository;
use App\Repositories\Auth\AuthRepositoryInterface;
use App\Services\Auth\AuthServiceInterface;
use App\Services\Auth\AuthService;
use App\Repositories\Departments\DepartmentRepository;
use App\Repositories\Departments\DepartmentRepositoryInterface;
use App\Services\Departments\DepartmentServiceInterface;
use App\Services\Departments\DepartmentService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Auth Binding
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
        // Departments Binding
        $this->app->bind(DepartmentServiceInterface::class, DepartmentService::class);
        $this->app->bind(DepartmentRepositoryInterface::class, DepartmentRepository::class);
    }
}
