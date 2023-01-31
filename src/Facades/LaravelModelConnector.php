<?php

namespace Yanntyb\LaravelModelConnector\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Yanntyb\LaravelModelConnector\LaravelModelConnector
 */
class LaravelModelConnector extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Yanntyb\LaravelModelConnector\LaravelModelConnector::class;
    }
}
