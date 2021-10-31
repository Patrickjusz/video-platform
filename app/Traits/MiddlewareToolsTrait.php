<?php

namespace App\Traits;

trait MiddlewareToolsTrait
{
    /**
     * Print middleware property and die()
     */
    public function showMiddleware()
    {
        dd($this->middleware ?? 'No middleware');
    }
}
