<?php

namespace App\Models;

use App\Models\Model;

class User extends Model
{
    protected static string $tableName = 'users';

    protected static array $fillable = [
        'id',
        'firstName',
        'lastName',
        'email',
        'password'
    ];

    public static function findOrFailByEmail(string $email): self | false
    {
        $user = parent::$db->query(
            "SELECT * FROM users WHERE email = :email;",
            compact('email'),
            __CLASS__
        );
        return empty($user) ? false : $user[0];
    }

    public function toArray(): array
    {
        return [
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'email' => $this->email,
        ];
    }

    public function fill(array $request): self
    {
        $this->firstName = ucfirst(strtolower($_POST['first-name']));
        $this->lastName = ucfirst(strtolower($_POST['last-name']));
        $this->email = $_POST['email'];
        $this->password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        return $this;
    }
}