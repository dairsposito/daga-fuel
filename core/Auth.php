<?php

namespace App\Core;

use App\Models\User;

class Auth
{

    public static int $sessionTime = 10;

    public static function auth(User $user, bool $remember): bool
    {
        $session = Session::getInstance();

        if ($session->startSession()) {
            $session->id = $user->id;
            $session->email = $user->email;
            $session->name = $user->lastName . ', ' . substr($user->firstName, 0, 1) . '.';
            $session->remember = $remember;
            $session->lastLogin = new \DateTime();
        }
        return true;
    }

    public static function isAuth(User $user = null): bool
    {
        $session = Session::getInstance();

        if (is_null($user)) {
            return self::isValidSession() ? true : !Auth::unauth();
        }

        return $session->id == $user->id && self::isValidSession() ? true : !Auth::unauth();
    }

    public static function unauth(): bool
    {
        return Session::getInstance()->destroy();
    }

    private static function isValidSession(): bool
    {
        $session = Session::getInstance();
        return isset($session->id) && ($session->remember || $session->lastLogin >= (new \DateTime())->modify('- ' . self::$sessionTime . ' secs'));
    }
}
