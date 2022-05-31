<?php

namespace App\Controllers;

use App\Core\App;
use App\Core\Session;
use App\Models\User;

class UsersController
{
    /**
     * Show user info.
     */
    public function index()
    {
        $session = Session::getInstance();

        if (isset($session->id)) {
            return view('users/index', ['userId' => $session->id]);
        }

        return view('users/new-user');
    }

    /**
     * Store a new user in the database.
     */
    public function store()
    {
        Session::getInstance()->destroy();

        $session = Session::getInstance();

        if (isset($session->id)) {
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

        if ($session->startSession()) {
            $session->id = $user->id;
            $session->email = $user->email;
            $session->name = $user->lastName . ', ' . substr($user->firstName, 0, 1) . '.';
        }

        return redirect('');
    }
}
