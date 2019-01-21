<?php

namespace App\Http;

use App\Models\User;

class Policy {
    
    /**
     * If the current user is admin or higher then allow
     *
     * @param  User  $user     
     * @return bool
     */
    public function ifAdmin(User $user) {
        return $user->role == User::ROLE_ADMIN;
    }
    
    /**
     * If the current user is a user then allow
     *
     * @param  User  $user
     * @return bool
     */
    public function ifUser(User $user) {
        return $user->role == User::ROLE_USER;
    }     

}
