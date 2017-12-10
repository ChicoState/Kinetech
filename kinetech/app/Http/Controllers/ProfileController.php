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

class ProfileController extends Controller
{
	/*
     * Return profile view from 'views/profile/profile.blade.php'
     *
     * @return view('profile.profile');
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
