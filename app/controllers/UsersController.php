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
        // dd(Auth::isLogged());

        // if (isset(Session::getInstance()->id)) {
        //     $users = App::get('database')->selectById('users', $_GET['id']);

        //     return view('users', compact('users'));
        // }

        return view('users/new-user');
    }

    /**
     * Store a new user in the database.
     */
    public function store()
    {
        Session::getInstance()->destroy();

        $session = Session::getInstance();

        if (!$session->startSession()) {
            redirect('login');
        }

        if ($_POST['password'] != $_POST['confirmPassword']) {
            return view('users/new-user');
        }

        $user = new User();
        $user->firstName = ucfirst($_POST['firstName']);
        $user->lastName = ucfirst($_POST['lastName']);
        $user->email = $_POST['email'];
        $user->password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        // $user->save();

        if ($session->startSession()) {
            $session->id = $user->id;
            $session->email = $user->email;
            $session->name = $user->lastName . ', ' . substr($user->firstName, 0, 1) . '.';
        }

        return redirect('');
    }
}
