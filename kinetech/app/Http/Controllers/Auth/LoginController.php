<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

/**
 * @author Elliott Allmann <elliott.allmann@gmail.com>
 * The login controller.
 */
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    /**
     * Log a user in
     * @param  Request $request 
     * @return Redirect to the home page or show the errors.
     */
    public function login(Request $request)
    {
        if(Auth::attempt([
            'email' => $request->input('email'), 
            'password' => $request->input('password'),]))
            {
                return redirect('/');
            }       
        else
        {
            return Redirect::back()
                ->withInput()
                ->withErrors([
                    'password' => 'Incorrect password!'
                ]);
        } 
    }

    /**
     * Log a user out
     * @param  Request $request 
     * @return Redirect to the home page.
     */
    public function logout(Request $request)
    {
        $request->session()->forget('cart');
        Auth::logout();
        return redirect('/');
    }
}
