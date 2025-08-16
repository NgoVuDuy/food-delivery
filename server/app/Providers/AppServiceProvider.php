<?php

namespace App\Providers;

use App\Repositories\Impl\UserRepository;
use App\Repositories\UserRepositoryInterface;
use App\Services\Impl\OptionServiceImpl;
use App\Services\OptionService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //

        $this->app->bind(OptionService::class, OptionServiceImpl::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
