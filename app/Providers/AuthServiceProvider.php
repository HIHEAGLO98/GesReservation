<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // les portails
        Gate::define("admin",function(User $user)
        {
            return $user->hasRole("admin");
        });

        Gate::define("organisateur",function(User $user)
        {
            return $user->hasRole("organisateur");
        });

        Gate::define("participant",function(User $user)
        {
            return $user->hasRole("participant");
        });

        
        // Gate::after(function(User $user)
        // {
        //     return $user->hasRole("superadmin");
        // });

    }
}
