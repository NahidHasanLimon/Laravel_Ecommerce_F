<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

// use Illuminate\Foundation\Validation\ValidatesRequests;

use App\Notifications\VerifyRegistration;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

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

    public function login(Request $request)
    {

        $this->validate($request,[
          'email'=>'required|email',
          'password'=>'required',


        ]);

        //Find User By This email
        $user=User::where('email',$request->email)->first();

        if ($user->status == 1) {


          if (Auth::guard('web')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember))
          {
            // Login Now...
            return redirect()->intended(route('index'));
          }else {
            session()->flash('error','Invalid Login');
            return redirect()->route('login');
          }
        }else {
            // Send Token Again
            if (!is_null($user)) {


            $user->notify(new VerifyRegistration($user));
            session()->flash('success','A New Confirmation Mail Has been Sent to your Email');
            return redirect()->intended(route('index'));
            }   else {

            session()->flash('errors','Please Create Your Account First');
            return redirect()->route('login');
          }
        }

}

}
