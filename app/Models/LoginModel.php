<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'users'; // Adjust table name as needed

    public function authenticate($username, $password)
    {
        // Fetch user from database
        $user = $this->where('username', $username)
                     ->orWhere('email', $username)
                     ->first();

        // Check if user exists and password matches
        if ($user && password_verify($password, $user['password'])) {
            return $user; // Return user data
        }

        return null; 
    }
}
