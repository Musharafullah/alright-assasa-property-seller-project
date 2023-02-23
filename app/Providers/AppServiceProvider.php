<?php

namespace App\Providers;

use App\Models\Property;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
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
        if ($this->app->environment("local")) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole() == false) {
            $roles = User::USER_TYPES;
            foreach ($roles as $role) {
                Gate::define($role, function (User $user) use ($role) {
                    return $user->type == $role;
                });
            }
            Gate::define("manage_user", function (User $user) {
                return $user->type == User::USER_TYPE_ADMIN || $user->type == User::USER_TYPE_DEALER;
            });
            Gate::define("manage_inventory", function (User $user, Property $property) {
                if ($user->type == User::USER_TYPE_ADMIN) {
                    return true;
                } else if ($user->type == User::USER_TYPE_DEALER) {
                    $has_property = Property::where("id", $property)->whereHas("user", function ($query) use ($user) {
                        $query->where("id", $user->id)->orWhere("parent_id", $user->id);
                    })->count();
                    return $has_property > 0;
                }
                return $property->user_id == $user->id;
            });
        }
    }
}