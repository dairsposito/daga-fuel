<?php

namespace App\Core;

use App\Models\User;

class Session
{

    const SESSION_STARTED = true;
    const SESSION_NOT_STARTED = false;

    private bool $sessionState = self::SESSION_NOT_STARTED;

    private static $instance;


    private function __construct()
    {
    }

    /**
     * Returns THE instance of 'Session'.
     * The session is automatically initialized if it wasn't.
     *
     * @return self
     */
    public static function getInstance(): self
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }

        self::$instance->startSession();

        return self::$instance;
    }

    /**
     * (Re)starts the session.
     *
     * @return bool TRUE if the session has been initialized, else FALSE
     */
    public function startSession(): bool
    {
        if ($this->sessionState == self::SESSION_NOT_STARTED) {
            $this->sessionState = session_start();
        }

        return $this->sessionState;
    }

    /**
     * Store data in the session
     *
     * @param string $name
     * @param mixed $value
     * @return void
     */
    public function __set($name, $value): void
    {
        $_SESSION[$name] = $value;
    }

    /**
     * Get session data
     *
     * @param string $name
     * @return mixed
     */
    public function __get($name): mixed
    {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        }
    }

    /**
     * Valid if session data is settle
     *
     * @param string $name
     * @return boolean
     */
    public function __isset($name): bool
    {
        return isset($_SESSION[$name]);
    }

    /**
     * Unset session data
     *
     * @param string $name
     * @return void
     */
    public function __unset($name): void
    {
        unset($_SESSION[$name]);
    }

    /**
     * Destroy session
     *
     * @return bool
     */
    public function destroy(): bool
    {
        if ($this->sessionState == self::SESSION_STARTED) {
            $this->sessionState = !session_destroy();
            unset($_SESSION);

            return !$this->sessionState;
        }

        return false;
    }
}
