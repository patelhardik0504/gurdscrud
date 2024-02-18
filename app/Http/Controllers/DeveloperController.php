<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;    

class DeveloperController extends Controller
{
    //

    public function index()
    {
        return view('User.index');
    }

    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect()->route('login');
    }

    public function dashboard()
    {
        $user = Auth::guard('user')->user();

        $com_task = Task::Where('status',1)->where('user_id','=',$user->id)->count();
        $incom_task = Task::Where('status',0)->where('user_id','=',$user->id)->count();
       
        return view('User.dashboard',compact('com_task','incom_task'));
    }
    
}
