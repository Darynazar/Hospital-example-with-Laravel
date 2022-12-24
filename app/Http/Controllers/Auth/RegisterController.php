<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users',
            'phonenumber' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required'
         ]);
 
         $data = new User();
         $data->firstname = $request->firstname;
         $data->lastname = $request->lastname;
         $data->email = $request->email;
         $data->phonenumber = $request->phonenumber;
         $data->username = $request->username;
         $data->password = Hash::make($request->password);
 
         $data->save();

         if (!auth()->attempt($request->only('firstname', 'lastname', 'email', 'phonenumber', 'username', 'password'), $request->remember)){
            return back()->with('status', 'Invalid login details');
        
        }
 
         return redirect()->route('home.index');
    }
}
