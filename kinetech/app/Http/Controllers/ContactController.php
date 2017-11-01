<?php

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
      \Mail::to('foomasri@gmail.com')
          ->send(new Contact($request->input('senderName'),
                             $request->input('senderEmail'),
                             $request->input('senderSubject'),
                             $request->input('senderContent'))
          );

      return view('contact.contact');
  }
}
