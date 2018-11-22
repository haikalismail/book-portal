<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\user_reader;
use Illuminate\Foundation\Auth\User;
use Auth;
use Illuminate\Http\Request;
use Session;

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
<<<<<<< HEAD
    protected $redirectTo = '/dashboard';
=======
    protected function redirectTo()
        {
            $user = Auth::user();
            Session::put('userid', $user->user_id);
            return url()->previous();
        }
>>>>>>> dea682b2a99869f56424d43c273842e45105acf4

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
    return 'username';
    }

<<<<<<< HEAD
=======
    public function logout(Request $request) {
        Auth::logout();
        Session::forget('userid');
        return redirect()->back();
      }

      
    
>>>>>>> dea682b2a99869f56424d43c273842e45105acf4
}
