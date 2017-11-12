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
            	'name'  => Auth::user()->username,
            	'email' => Auth::user()->email,
        		]; 
        	return view('dashboards.admin.adminDash',['user' => $user]);
        }
    }
}