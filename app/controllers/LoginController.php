<?php

namespace App\Controllers;

use App\Core\Session;

class LoginController
{

    /**
     * Show login page.
     */
    public function index()
    {
        return Session::getInstance()->startSession() ? redirect('') : view('login');
    }

    /**
     * Do login.
     */
    public function login()
    {
        // do login
        session_start();
        session_name($_POST['email']);
        session_id($_POST['password']);
        return redirect('');
    }

}