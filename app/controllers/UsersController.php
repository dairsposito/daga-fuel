<?php

namespace App\Controllers;

use App\Core\Auth;
use App\Core\Session;
use App\Models\User;

class UsersController
{
    /**
     * Show user info.
     */
    public function index()
    {
        $user = User::find(Session::getInstance()->id);
        return view('users/index', $user->toArray());
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
        $user->fill($_POST)->save();

        Auth::auth($user, false);

        return redirect('');
    }

    public function update()
    {
        $user = User::find(Session::getInstance()->id);
        if ( ! password_verify($_POST['password'], $user->password)) {
            return view('users/index', ['error' => 'Incorrect password'] + $user->toArray());
        }

        if ($_POST['new-password'] != '' && $_POST['new-password'] == $_POST['confirm-new-password']) {
            $_POST['password'] = $_POST['new-password'];
        }

        $user->fill($_POST)->save();

        return view('users/index', $user->toArray());
    }
}
