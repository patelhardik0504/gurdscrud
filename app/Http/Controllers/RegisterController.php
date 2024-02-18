<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    //

    public function store(Request $request)
    {       
        $sValidationRules = [
            'email' => 'required|email', 
            'password' => 'required|min:8',
          ];
    
          $validator = Validator::make($request->all(), $sValidationRules);
    
        if ($validator->fails())
        {           
            $errors = $validator->errors();
            return redirect('/admin-register')->withErrors($errors)->withInput();
        }

        $user = User::create([
            'role' => $request['role'],
            'first_name' =>  $request['first_name'],
            'last_name' =>  $request['last_name'],
            'email' =>  $request['email'],
            'password' => Hash::make($request['password'])
        ]);

        return redirect()->route('login');
      
    }
}
