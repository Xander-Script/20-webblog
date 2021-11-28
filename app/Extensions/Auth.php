<?php

namespace App\Extensions;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;

class Auth extends \Illuminate\Support\Facades\Auth
{
    /**
     * @return User|Authenticatable
     */
    public static function userOrGuest(): User|Authenticatable
    {
        return self::user() ?? new User();
    }

    public static function userIsPremium()
    {
        return self::userOrGuest()->premium;
    }
}
