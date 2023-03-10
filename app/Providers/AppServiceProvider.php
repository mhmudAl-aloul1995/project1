<?php

namespace App\Providers;

use App\User;
use App\Version;
use Illuminate\Support\ServiceProvider;
use Schema;
use View;

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
        if (Schema::hasTable('users')) {
            $role_2 = User::where('role_id', 2)->first() ;
            $role_3 = User::where('role_id', 3)->first();
            $role_4 = User::where('role_id', 4)->first();
            $role_5 = User::where('role_id', 5)->get();
            $lastVersion = Version::latest('id')->first();


            View::share(['lastVersion' => $lastVersion, 'role_2' => $role_2['name'], 'role_3' => $role_3['name'], 'role_4' => $role_4['name'], 'role_5' => $role_5]);
        }
        Schema::defaultStringLength(191);

    }
}
