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
        return view('users/index');
    }

    public function create()
    {
        return view('users/create');
    }

    /**
     * Store a new user in the database.
     */
    public function store()
    {
        if ($_POST['password'] != $_POST['confirm-password']) {
            return view('users/create');
        }

        $user = new User();
        $user->firstName = ucfirst(strtolower($_POST['first-name']));
        $user->lastName = ucfirst(strtolower($_POST['last-name']));
        $user->email = $_POST['email'];
        $user->password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $user->save();

        Auth::auth($user, false);

        return redirect('');
    }
}
