<?php

namespace App\Providers;


use App\Models\Channel;
use App\Models\Message;
use App\Models\User;
use App\Repositories\Channel\EloquentChannelRepository;
use App\Repositories\Message\EloquentMessageRepository;
use App\Repositories\User\EloquentUserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;

        // User
        $app->bind('App\Repositories\User\UserRepositoryInterface', function ($app) {
            return new EloquentUserRepository(
                new User
            );
        });

        // Channel
        $app->bind('App\Repositories\Channel\ChannelRepositoryInterface', function ($app) {
            return new EloquentChannelRepository(
                new Channel
            );
        });

        // Message
        $app->bind('App\Repositories\Message\MessageRepositoryInterface', function ($app) {
            return new EloquentMessageRepository(
                new Message
            );
        });

    }
}
