<?php

namespace App\Providers;
use Illuminate\Contracts\Auth\Access\Gate as GateContract; 
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
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->define('is_admin', function($user)
        {
            return $user->role =='admin';
        });

        $gate->define('is_teacher', function($user)
        {
            return $user->role =='teacher';
        });
        $gate->define('is_student', function($user)
        {
            return $user->role =='student';
        });

        
    }
}
