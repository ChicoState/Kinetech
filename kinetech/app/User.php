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
        'name', 'email', 'password','address','aptNumber','city','state','zipCode'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Update the name, email, and address of a user
     * @param  Array $user An array of the user attributes we are updating.
     * @return void
     * @author Elliott Allmann <elliott.allmann@gmail.com>
     */
    public static function updateUser($user)
    {
        //check if admin
        $id         = $user['id'];
        $name       = $user['name'];
        $email      = $user['email'];
        $address    = $user['address'];
        $aptNumber  = $user['aptNumber'];
        $city       = $user['city'];
        $state      = $user['state'];
        $zip        = $user['zipCode'];

        DB::table('users')->where('id', $id)->update([
            'name' => $name,
            'email' => $email,
            'address' => $address,
            'aptNumber' => $aptNumber,
            'city'      => $city,
            'state'     => $state,
            'zipCode'   => $zip,
        ]);        
    }
}
