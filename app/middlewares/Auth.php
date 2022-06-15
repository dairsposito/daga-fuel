<?php

namespace App\Middleware;

use App\Core\Auth as Authentication;
use App\Middleware\Middleware;

class Auth implements Middleware
{
    public static function handle()
    {
        if ( ! Authentication::isAuth()) {
            redirect('login');
            // header('HTTP/1.0 404 Not Found', true, 404);
            // view('404');
            // die();
        }
    }
}