<?php

namespace App\Middleware;

use App\Core\Auth;
use App\Middleware\Middleware;

class Guest implements Middleware
{
    public static function handle()
    {
        if (Auth::isAuth()) {
            redirect('');
            // header('HTTP/1.0 403 Forbidden', true, 403);
            // view('404');
            // die();
        }
    }
}