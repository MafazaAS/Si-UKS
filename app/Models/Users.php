<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_users';
    public $timestamps = false;

    protected $fillable = [
        'username','email','password','role'
    ];
}

class User extends Authenticatable
{
    use HasApiTokens;

    protected $primaryKey = 'id_users';

    protected $fillable = [
        'username','email','password','role'
    ];

    protected $hidden = ['password'];
}
