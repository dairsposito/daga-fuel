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

}







// <?php

// namespace App\Models;

// use App\Models\Model;

// class User extends Model
// {

//     protected static string $tableName = 'users';

//     protected int $id;

//     protected string $firstName;
//     protected string $lastName;
//     protected string $email;
//     protected string $password;

//     // public function __construct(string $firstName, string $lastName, string $email, string $password)
//     // {
//     //     $this->firstName = $firstName;
//     //     $this->lastName = $lastName;
//     //     $this->email = $email;
//     //     $this->password = $password;
//     // }

//     /**
//      * Get the value of firstName
//      */
//     public function getFirstName()
//     {
//         return $this->firstName;
//     }

//     /**
//      * Set the value of firstName
//      *
//      * @return  self
//      */
//     public function setFirstName($firstName)
//     {
//         $this->firstName = $firstName;

//         return $this;
//     }

//     /**
//      * Get the value of lastName
//      */
//     public function getLastName()
//     {
//         return $this->lastName;
//     }

//     /**
//      * Set the value of lastName
//      *
//      * @return  self
//      */
//     public function setLastName($lastName)
//     {
//         $this->lastName = $lastName;

//         return $this;
//     }

//     /**
//      * Get the value of email
//      */
//     public function getEmail()
//     {
//         return $this->email;
//     }

//     /**
//      * Set the value of email
//      *
//      * @return  self
//      */
//     public function setEmail($email)
//     {
//         $this->email = $email;

//         return $this;
//     }

//     /**
//      * Get the value of password
//      */
//     public function getPassword()
//     {
//         return $this->password;
//     }

//     /**
//      * Set the value of password
//      *
//      * @return  self
//      */
//     public function setPassword($password)
//     {
//         $passwordInfo = password_get_info($password);

//         if (is_null($passwordInfo['algo'])) {
//             $password = password_hash($password, \PASSWORD_DEFAULT);
//         }

//         $this->password = $password;

//         return $this;
//     }

// }