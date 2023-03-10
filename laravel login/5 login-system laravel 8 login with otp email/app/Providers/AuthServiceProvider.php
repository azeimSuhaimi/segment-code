<?php
use App\Models\User;

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

        Gate::define('admin', function () {

            return auth()->user()->role == 1;

        });

        Gate::define('view_dashboard', function () {
            // Retrieve the user's permissions from the database
            $userPermissions = auth()->user()->access;
            $permissions = explode(',', $userPermissions);

            // Check if the user has the required permission
            $requiredPermission = 'view_dashboard';
            return in_array($requiredPermission, $permissions) || in_array('*', $permissions);
        });

        //
    }
}
