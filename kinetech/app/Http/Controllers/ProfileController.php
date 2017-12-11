<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Illuminate\Http\Request;
use App\Cart;
use App\Products;
use App\Storage\logs\laravel;
use App\User;
use Illuminate\Support\Facades\Redirect;

/**
 * @author Max Schimm <mjschimm@gmail.com>
 * Profile Controller
 */

class ProfileController extends Controller
{
	/*
     * Return profile view from 'views/profile/profile.blade.php'
     * @return view('profile.profile');
 	 */


    /**
     * Stores all of the currently logged-in user's information
     * from User model and passes it to the view.
     * @return Profile/profile  The view that loads user's information
     */
    public function index()
    {
            $user = [
                'id'       => Auth::user()->id,
                'name'     => Auth::user()->name,
                'email'    => Auth::user()->email,
                'address'  => Auth::user()->address,
                'aptNumber' => Auth::user()->aptNumber,
                'city'      => Auth::user()->city,
                'state'     => Auth::user()->state,
                'zipCode'   => Auth::user()->zipCode,
                'is_admin' => Auth::user()->is_admin,
            ];
            return view('profile.profile', ['user' => $user]);
    }

    /**
     * Updates user profile information
     * @param HttpRequest $request
     */
    public function updateProfile(Request $request)
    {
        $id        = $request->input('id');
        $name      = $request->input('username');
        $email     = $request->input('email');
        $address   = $request->input('address');
        $aptNumber = $request->input('aptNumber');
        $city      = $request->input('city');
        $state     = $request->input('state');
        $zip       = $request->input('zip');


        User::updateUser([
            'id'        => $id,
            'name'      => $name,
            'email'     => $email,
            'address'   => $address,
            'aptNumber' => $aptNumber,
            'city'      => $city,
            'state'     => $state,
            'zipCode'   => $zip,
        ]);

        //If email is set to update, make sure it 
        //has not been previously used.
        if(!$updateSuccess)
        {
            return Redirect::back()
                ->withInput()
                ->withErrors([
                    'profileEmail' => 'Email is already in use!'
                ]);
        }
    }
}
