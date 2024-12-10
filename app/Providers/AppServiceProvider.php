<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
//        VerifyEmail::toMailUsing(function ($notifiable) {
//            return (new VerifyEmail()) ->subject('Verify Email Address')
//                ->view('emails.verify-email', ['url' => $notifiable->verifyEmailUrl()]);
//        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
