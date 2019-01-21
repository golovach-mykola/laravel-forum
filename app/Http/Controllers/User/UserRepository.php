<?php
/**
 * Created by PhpStorm.
 * User: Golovach
 * Date: 21.01.2019
 * Time: 11:32
 */

namespace App\Http\Controllers\User;


use App\Models\User;

class UserRepository
{
    public function getAllUser(){
        return User::where('role', User::ROLE_USER)->get();
    }
}