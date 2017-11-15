<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function getName()
    {
       // $name = User::fillable('name')->get();
       // $name  = (new User)->get($fillable['name']);
        return $fillable['name'];
    }


    public static function updateUser($user)
    {
        $id = $user['id'];
        $name = $user['name'];
        $email = $user['email'];
        DB::table('users')->where('id', $id)->update([
            'name' => $name,
        ]);        
    }
}
