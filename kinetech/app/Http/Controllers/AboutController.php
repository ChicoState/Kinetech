<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
	/*
     * Return about view from 'views/about/about.blade.php'
     *
     * @return view('about.about');
 	 */
    public function index()
	{
		return view('about.about');
	}
}
