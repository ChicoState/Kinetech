<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

/**
 * @author  Elliott Allmann <elliott.allmann@gmail.com>
 * The Controller to register a new user.
 */
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
    {
        $username = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $confirmPassword = $request->input('password_confirmation');

        $validEmail = User::validateEmail($email);

        if($validEmail)
        {
            return Redirect::back()
                ->withInput($request->only('name'))
                ->withErrors([
                    'registerEmail' => 'Email is already in use!'
                ]);
        }
        /**
         * Check to see if the passwords patch
         * If they do not, return the email and username that they
         * tried to register
         */
        if($password !== $confirmPassword)
        {
            return Redirect::back()
                ->withInput()
                ->withErrors([
                    'registerPassword' => 'Passwords do not match!'
                ]);
        }
        else if($password === 'Password' || $password === 'password')
        {
            return Redirect::back()
                ->withInput()
                ->withErrors([
                    'registerPassword' => "Password cannot be '$password'",
                    ]);
        }
        else
        {
            User::create([
                'name' => $username,
                'email' => $email,
                'password' => bcrypt($password),
                'is_admin' => 0,
            ]);
            return view('home');
        }

    }
}
