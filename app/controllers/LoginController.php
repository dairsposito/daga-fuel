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
        return view('login');
    }

    /**
     * Do login.
     */
    public function login()
    {
        // dd($_POST);
        $user = User::findOrFailByEmail($_POST['email']);

        $remember = isset($_POST['remember']) && $_POST['remember'] == 'on';

        if ($user && password_verify($_POST['password'], $user->password) && Auth::auth($user, $remember)) {
            return redirect('');
        }

        return view('login', ['email' => $_POST['email'], 'remember' => $remember]);
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