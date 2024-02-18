<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $user = Auth::guard('user')->user();
        
        $tasks = Task::select('id', 'name', 'description', 'status')
        ->where(function($query) use ($user) {
            $query->where('status', 0)
                  ->orWhere('status', 1);
        })
        ->where('user_id', $user->id)
        ->orderBy('status', 'asc')
        ->paginate(5);
       
        return view('User.tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('User.tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $sValidationRules = [
            'name' => 'required|max:100', 
            'description' => 'required',
        ];
    
        $validator = Validator::make($request->all(), $sValidationRules);
    
        if ($validator->fails())
        {           
            $errors = $validator->errors();
            return redirect('/create-tasks')->withErrors($errors)->withInput();
        }

        $user = Auth::guard('user')->user();

        $task =   Task::create([
            'name' => $request['name'],
            'description' =>  $request['description'],
            'user_id' =>  $user['id']
        ]);

        return redirect()->route('task.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task,$id)
    {
        //
        $user = Auth::guard('user')->user();

        $tasks = Task::where('user_id','=',$user->id)->where('id','=',$id)->first();

        if($tasks)
        {
            return view('User.tasks.show', compact('tasks'));
        }

        return redirect('/tasks')->withErrors('Task are not found');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
        $sValidationRules = [
            'name' => 'required|max:100', 
            'description' => 'required',
        ];
    
        $validator = Validator::make($request->all(), $sValidationRules);
    
        if ($validator->fails())
        {           
            $errors = $validator->errors();
            return redirect('/create-tasks')->withErrors($errors)->withInput();
        }

        $user = Auth::guard('user')->user();

        $taskData = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'user_id' => $user['id'],
            'status' => $request['status']
        ];
        $taskId  = $request['id'];
    
        $task = Task::updateOrCreate(['id' => $taskId], $taskData);        

        return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task,Request $request)
    {
        //
        $id = $request['id'];
      
        $task = Task::find($id);

        if ($task) {

            $task->delete(); 
            return response()->json(['msg' => 'Task status delete successfully']);
        }

        return response()->json(['msg' => 'Task not found'], 404);

    }

    public function UpdateStatus(Request $request)
    {
       $id = $request['id'];
      
        $task = Task::find($id);

        if ($task) {

            $task->update(['status' => 1]); 
            return response()->json(['msg' => 'Task status updated successfully']);
        }

        return response()->json(['msg' => 'Task not found'], 404);
    }

    public function filter(Request $request)
    {        
        $status = $request->input('status');
        $user = Auth::guard('user')->user();
        if ($status === '1') {
            $tasks = Task::where('status', 1)->where('user_id','=',$user->id)->paginate(5);
        } elseif ($status === '0') {
            $tasks = Task::where('status', 0)->where('user_id','=',$user->id)->paginate(5);
        } else {
            $tasks = Task::select('id', 'name', 'description', 'status')
            ->where(function($query) use ($user) {
                $query->where('status', 0)
                      ->orWhere('status', 1);
            })
            ->where('user_id', $user->id)
            ->orderBy('status', 'asc')
            ->paginate(5);
        }
        
        return view('User.tasks.index', compact('tasks'));
    }

    
}
