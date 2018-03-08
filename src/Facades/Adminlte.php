<?php

namespace Mvishal\Adminlte\Facades;

use Illuminate\Support\Facades\Facade;

class Adminlte extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Adminlte';
    }
}