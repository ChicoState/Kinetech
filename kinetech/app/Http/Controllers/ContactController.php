<?php
/*
 * @author Jordan Laney <jlaney4@mail.csuchico.edu>
 *
 * Controller for handling email post requests.
 */

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
  	public function index()
  	{
    	return view('contact.contact');
  	}

  	public function sendEmail(Request $request)
  	{
		$request->validate([
        	'senderEmail' => 'required',
        	'senderName' => 'required',
			'senderSubject' => 'required',
			'senderContent' => 'required|min:15'
    	]);
    	\Mail::to('foomasri@gmail.com')->send(new Contact($request));
      	return view('contact.received');
  	}
}
