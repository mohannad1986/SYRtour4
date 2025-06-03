<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;

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
    //  علقناه
    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *

     */

    //  علقناه
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){


        // return $request ;

        if($request->type == 'tourist'){
            $guardName= 'tourist';
        }
        elseif ($request->type == 'owner'){
            $guardName= 'owner';
        } else{
            $guardName= 'web';
        }

        if (Auth::guard($guardName)->attempt(['email' => $request->email, 'password' => $request->password])) {
        //    return $this->redirect($request);
        // +++++++++++++++
        if($request->type == 'tourist'){
            return redirect()->intended(RouteServiceProvider::tourist);
        }
        elseif ($request->type == 'owner'){
            return redirect()->intended(RouteServiceProvider::OWNER);
        } else{
            return redirect()->intended(RouteServiceProvider::HOME);
        }


        // +++++++++++++++++++=
        }
        else{
            return redirect()->back()->with('message', 'يوجد خطا في كلمة المرور او اسم المستخدم');
        }

    }






    public function logout(Request $request,$type)
    {
        Auth::guard($type)->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('loginshow');
    }
}
