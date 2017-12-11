<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

/**
 * @author Elliott Allmann <elliott.allmann@gmail.com>
 * Class User
 * @package App
 */
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
     * @return  boolean
     * @author Elliott Allmann <elliott.allmann@gmail.com>
     *
     */
    public static function updateUser($user)
    {
        $id         = $user['id'];
        $name       = $user['name'];
        $email      = $user['email'];
        $address    = $user['address'];
        $aptNumber  = $user['aptNumber'];
        $city       = $user['city'];
        $state      = $user['state'];
        $zip        = $user['zipCode'];

        $validEmail;

        //TODO: remove the not once we change self::validateEmail()
        if($email != Auth::user()->email)
        {
            $validEmail = !self::validateEmail($email);
        }
        else $validEmail = true;

        if ($validEmail)
        {
            DB::table('users')->where('id', $id)->update([
                'name' => $name,
                'email' => $email,
                'address' => $address,
                'aptNumber' => $aptNumber,
                'city'      => $city,
                'state'     => $state,
                'zipCode'   => $zip,
            ]); 
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Determine if the email that is attempting to be registered or updated to
     * is already in use. If it is not in use, return true.
     * @TODO: switch true and false so that a valid email returns true.
     * @TODO: make sure the changes are represented in register and update.
     * @param $email
     * @return bool
     */
    public static function validateEmail($email)
    {
        return (DB::table('users')->where('email', $email)->exists()) ? true : false;
    }
}
