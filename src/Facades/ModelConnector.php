<?php

namespace Yanntyb\ModelConnector\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Yanntyb\ModelConnector\ModelConnector
 */
class ModelConnector extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Yanntyb\ModelConnector\ModelConnector::class;
    }
}
