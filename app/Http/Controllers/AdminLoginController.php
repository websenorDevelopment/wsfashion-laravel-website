<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator as Validator;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view("admin.login");
    }
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->passes()) {
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

                $admin = Auth::guard('admin')->user();
                if ($admin->role == 2) {
                    return redirect()->route('admin.dashboard');
                } else {
                    Auth::guard('admin')->logout();
                    // return redirect()->route('user.dashboard'); // Temporary Logic (#Deletable)
                    return redirect()->route('admin.login')->with('error', 'You are not an Authorized User');
                }
            } else {
                return redirect()->route('admin.login')->with('error', 'Either E-Mail Or Password Is Incorrect.');
            }
        } else {
            return redirect()->route('admin.login')
                ->withErrors($validator)
                ->withInput($request->only('email'));
        }
    }

    
}
