<?php

namespace App\Http\Controllers;
use Auth;
use Session;
use Illuminate\Http\Request;
use App\Cart;
use App\Products;
use App\Storage\logs\laravel;
use App\User;

class AdminDashController extends Controller
{
    public function __construct()
    {

    }

    public function getAdminProfile()
    {
        if(Auth::check())
        {
            $user = [
            	'id'    => Auth::user()->id,
            	'name'  => Auth::user()->name,
            	'email' => Auth::user()->email,
            	'address' => Auth::user()->address,
            	'is_admin' => Auth::user()->is_admin,
        		]; 
        	return view('dashboards.admin.adminDash',['user' => $user]);
        }
    }

    public function updateAdminProfile(Request $request)
    {
    	$id = $request->input('id');
    	$name = $request->input('username');
    	$email = $request->input('email');
    	$address = $request->input('address');
		
		User::updateAdminUser([
			'id' => $id,
			'name' => $name,
			'email' => $email,
			'address' => $address,
		]);
		return redirect()->route('adminDash');
    }
}