<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function register()
    {
        return view("front.account.register");
    }

    public function processRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',  // Added validation for name
            'mobile_no' => 'required|min:10|numeric|unique:users',
            'password' => 'required|min:5|confirmed',  // Fixed 'confirmed'
            'email' => 'required|email|unique:users',  // Fixed the email validation rule
        ]);

        if ($validator->passes()) {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;  // Fixed typo: 'emai' to 'email'
            $user->mobile_no = $request->mobile_no;
            $user->password = Hash::make($request->password);
            $user->save();

            session()->flash("success", "Hey <strong> {$request->name} </strong>, You've been registered successfully.");

            return response()->json([
                'status' => true,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),  // Use 'errors' instead of 'error'
            ]);
        }
    }

    public function login()
    {
        return view("front.account.login");
    }
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile_no' => 'required|min:10|numeric|unique:users',
            'password' => 'required|min:5|confirmed',  // Fixed 'confirmed'
        ]);

        if ($validator->passes()) {
            if (Auth::attempt(['mobile_no' => $request->mobile_no, 'password' => $request->password], $request->get('remember'))) {

            } else {
                // session()->flash("error", "Either Mobile Number or Password is incorrect.");
                return redirect()->route('account.login')
                    ->withInput($request->only('mobile_no'))
                    ->with("error", "Either Mobile Number or Password is incorrect.");

            }

            return response()->json([
                'status' => true,
            ]);
        } else {
            return redirect()->route('account.login')
                ->withErrors($validator)
                ->withInput($request->only('mobile_no'));
        }
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
