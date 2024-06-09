<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Informasi;
use App\Policies\InformasisPolicy;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
        Informasi::class => InformasisPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        $this->registerPolicies();
    }
}
