<?php

namespace Modules\Pay\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
  protected $listen = [];

  /**
   * 应用程序的模型观察者。
   *
   * @var array
   */
  protected $observers = [];
}
