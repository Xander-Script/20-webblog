<?php

namespace Xanderificnl\LaravelQuill\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Xanderificnl\LaravelQuill\LaravelQuill
 */
class LaravelQuill extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-quill';
    }
}
