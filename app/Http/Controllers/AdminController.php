<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Task;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('Admin.index');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login');
    }

    public function dashboard()
    {
        $com_task = Task::Where('status',1)->count();
        $incom_task = Task::Where('status',0)->count();
        $total_user = User::where('role',2)->count();
       
        return view('Admin.dashboard',compact('com_task','incom_task','total_user'));
    }

    public function adminindex()
    {
        $tasks = Task::with('user')->paginate(5);

        return view('Admin.Tasks.index', compact('tasks'));       
    }    
   
}
