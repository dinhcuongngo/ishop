<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    const ADMIN_USER    = 'admin';
    const REGULAR_USER  = 'regular';

    const VERIFIED_USER     = 'verified';
    const UNVERIFIED_USER   = 'unverified_user';

    const MANAGER_ROLE  = 'manager';
    const CASHIER_ROLE  = 'cashier';
    const STAFF_ROLE    = 'staff';

    protected $table = 'users';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 
        'email', 
        'password',
        'photo',
        'admin',
        'role',
        'verified',
        'verification_token',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return $this->User::ADMIN_USER;
    }

    public function isVerifiedUser()
    {
        return $this->User::VERIFIED_USER;
    }

    public static function generateVerificationCode()
    {
        return str_random(20);
    }
}
