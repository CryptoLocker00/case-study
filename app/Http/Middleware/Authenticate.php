<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            //Backend Redirection
            $isBackend = ($request->segment(1) === 'backend') ? true : false;
            if ($isBackend) {
                return route('backend.login');
            } else {
                return route('website.login');
            }
        }
    }
}
