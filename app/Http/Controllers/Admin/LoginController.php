<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;
use Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::guard('admin')->attempt($credentials)) {
            if ($request->has('redirect')) {
                return redirect($request->redirect);
            }
            return redirect()->intended(route('admin.dashboard.index'));
        }else {
            Alert::make('danger','Pastikan username dan password benar.');
            return back();
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin.auth.login'));
    }

    
}
