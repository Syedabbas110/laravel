<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use App\Models\User;

use MailchimpMarketing\ApiClient;
use App\Services\Newsletter;
use App\Services\MailchimpNewsletter;

// /**
//  * Bootstrap any application services.
//  *
//  * @return void
//  */
// public function boot()
// {
    
// }

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        app()->bind(Newsletter::class, function() {
            $client = (new ApiClient)->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us17'
            ]);
            return new MailchimpNewsletter($client);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Schema::defaultStringLength(191);

        Model::unguard();

        Gate::define('admin', function (User $user) {
            return $user->username === 'syed.abbas1@gmail.com';
        });

        Blade::if('admin', function() {
            return request()->user()?->can('admin');
        });
    }
}
