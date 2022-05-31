<?php

namespace App\Controllers;

use App\Core\Auth;
use App\Models\User;

class UsersController
{
    /**
     * Show user info.
     */
    public function index()
    {
        if (Auth::isAuth()) {
            return view('users/index');
        }

        return view('users/new-user');
    }

    /**
     * Store a new user in the database.
     */
    public function store()
    {
        if (Auth::isAuth()) {
            return redirect('');
        }

        if ($_POST['password'] != $_POST['confirmPassword']) {
            return view('users/new-user');
        }

        $user = new User();
        $user->firstName = ucfirst(strtolower($_POST['firstName']));
        $user->lastName = ucfirst(strtolower($_POST['lastName']));
        $user->email = $_POST['email'];
        $user->password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $user->save();

        Auth::auth($user, false);

        return redirect('');
    }
}
