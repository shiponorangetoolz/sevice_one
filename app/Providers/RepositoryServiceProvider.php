<?php

namespace App\Providers;

use App\Repositories\BillingRepository;
use App\Repositories\Interfaces\BillingRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class,UserRepository::class);
        $this->app->bind(BillingRepositoryInterface::class,BillingRepository::class);
    }
}
