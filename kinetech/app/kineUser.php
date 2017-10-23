<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kineUser extends Model
{
	protected $table = 'Users';
    public static function login($email)
    {
    	error_log("POST IN KINEUSER LOGIN");
    	error_log($email);
    	$user = App\kineUser::where('email', $email)->get();
    	return $user;

    }
}
