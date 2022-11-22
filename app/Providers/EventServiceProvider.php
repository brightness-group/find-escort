<?php

namespace App\Providers;

use App\Models\Blog;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Observers\BlogObserver;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        NewLike::class => [
            StoreLikesNotification::class,
        ],
        NewView::class => [
            StoreViewNotification::class,
        ],
        NewReview::class => [
            StoreReviewNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Blog::observe(BlogObserver::class);
    }
}
