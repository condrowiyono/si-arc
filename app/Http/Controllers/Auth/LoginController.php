<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

use Illuminate\Http\Request;

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
    

    //name and email login
    protected function credentials(Request $request)
    {
        $field = filter_var($request->get($this->username()), FILTER_VALIDATE_EMAIL)
            ? $this->username() : 'name';

        return [
            $field => $request->get($this->username()),
            'password' => $request->password,
        ];
    }

    // protected function authenticated(Request $request, $user)
    // {
    //     if($user->hasRole('admin')) {
    //         return redirect('/admin');
    //     } else
    //     {
    //         return redirect('/');
    //     }
    // }
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

}
