<?php namespace NZTim\Mailer;

use Illuminate\Support\ServiceProvider;

class MailerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([__DIR__.'/../views' => base_path('resources/views/emails')]);
    }

    public function register()
    {
        //
    }
}
