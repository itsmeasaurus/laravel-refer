<?php

namespace App\Providers;

use App\Models\User;
use App\Services\MailChimpNewsletter;
use App\Services\Newsletter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // The specific NewletterController don't want to consider which API service so it just calls the Newsletter
        // So, we set our wanted API with the Newsletter service name.
        
        app()->bind(Newsletter::class, function() { 

            $client = (new ApiClient)->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us12'
            ]);

            return new MailChimpNewsletter($client);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();

        Gate::define('admin', function(User $user) {
            return $user->username === 'admin';
        });

        // Defining a Custom Blade Directive
        Blade::if('admin', function() {
            return request()->user()?->can('admin');
        });
    }
}
