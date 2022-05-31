<?php

namespace App\Controllers;

use App\Core\Auth;
use App\Models\User;

class LoginController
{

    /**
     * Show login page.
     */
    public function index()
    {
        return Auth::isAuth() ? redirect('user') : view('login');
    }

    /**
     * Do login.
     */
    public function login()
    {
        $user = User::findOrFailByEmail($_POST['email']);

        if ($user && password_verify($_POST['password'], $user->password) && Auth::auth($user, $_POST['remember'] == 'on')) {
            return redirect('');
        }

        return view('login', ['email' => $_POST['email']]);
    }

    /**
     * Logout the user
     *
     * @return void
     */
    public function logout()
    {
        Auth::unauth();
        return redirect('');
    }

}