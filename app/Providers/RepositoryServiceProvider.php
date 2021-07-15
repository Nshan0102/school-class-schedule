<?php

namespace App\Providers;

use App\Repositories\Contracts\ScheduleRepositoryInterface;
use App\Repositories\Contracts\SchoolClassRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\ScheduleRepository;
use App\Repositories\SchoolClassRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(SchoolClassRepositoryInterface::class, SchoolClassRepository::class);
        $this->app->bind(ScheduleRepositoryInterface::class, ScheduleRepository::class);
    }
}
