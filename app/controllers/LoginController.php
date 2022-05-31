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
        return isset(Session::getInstance()->id) ? redirect('user') : view('login');
    }

    /**
     * Do login.
     */
    public function login()
    {
        // $user = User::
        //     select(['array', 'com', 'os', 'campos', 'a', 'serem', 'buscados'])
        //     ->where(['fieldName', 'logicalOperator', 'fieldValue'])
        //     ->where(['email', '=', "{$_POST['email']}"]);
        // $session = Session::getInstance();

        // if ($session->startSession()) {
        //     $session->email = $_POST['email'];
        // }

        return redirect('');
    }

    public function logout()
    {
        Session::getInstance()->destroy();
        return redirect('');
    }

}