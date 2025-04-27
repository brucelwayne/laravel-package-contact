<?php

namespace Brucelwayne\Contact;

use Brucelwayne\Contact\Events\NewContactEvent;
use Brucelwayne\Contact\Listeners\SendNewContactEmailListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        NewContactEvent::class => [
            SendNewContactEmailListener::class,
        ],
    ];

    public function boot()
    {
        // 确保事件监听器注册
        parent::boot();
    }

    public function shouldDiscoverEvents()
    {
        // 启用事件自动发现（可选）
        return true;
    }
}
