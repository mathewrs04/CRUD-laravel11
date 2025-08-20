<?php

namespace App\Providers;

use App\Models\Employee;
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
        Gate::define('update-post', function (User $user, Employee $employee) {
            return $user->id === $employee->user_id;
        });

        Gate::define('manage-employee', function (User $user) {
            return $user->is_admin;
        });

        Gate::define('create-employee', function (User $user) {
            return $user->is_admin;
        });

        Gate::define('edit-employee', function (User $user, Employee $employee) {
            return $user->is_admin || $user->id === $employee->user_id;
        });

        Gate::define('delete-employee', function (User $user) {
            return $user->is_admin;
        });
    }
}
