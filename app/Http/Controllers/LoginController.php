<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {       
        return view('Admin.login');        
    }

    public function store(Request $request)
    {
        $sValidationRules = [
            'email' => 'required|email', 
            'password' => 'required|min:8',
            'role' => 'required', 
        ];
    
        $validator = Validator::make($request->all(), $sValidationRules);
    
        if ($validator->fails())
        {           
            $errors = $validator->errors();
            return redirect('/login')->withErrors($errors)->withInput();
        }
        
        $role_name = ($request['role'] == 1) ? 'admin' : 'user';

       if(Auth::guard($role_name)->attempt(['email' => $request->email, 'password' => $request->password,'role'=> $request->role])){
        $user = Auth::guard($role_name)->user();

        $url = $role_name .'.dashboard';

        return redirect()->route($url);
       }

       return redirect('/login')->withErrors('Please Check Your Email or Password!!')->withInput();
    }

}
