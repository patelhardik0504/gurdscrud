@extends('layouts.home')

@section('content')
@include('User.navbar');


@if($errors->any())
    <div class="alert alert-danger text-center m-4">
        <ul>
            @foreach($errors->all() as $error)
                <li class="text-red-500">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="mt-8">
<div class="max-w-sm mx-auto mt-5">
    <div class="flow-root mb-8">
        <p class="float-left text-green-600">
        <a href="/tasks" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Back</a>
        </p> 
        <p class="float-right text-green-800 bold"> 
        <b>Edit Task</b>
        </p>
    </div>
<form  id="tesk_update" method="post"  action="{{ route('task.update') }}">
    @csrf
<div class="mb-5">
    <input type="hidden" id="id" name="id" value="{{$tasks->id}}">
    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task Name</label>
    <input type="name" id="name" name="name"  value="{{$tasks->name}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter the Please First Name" />
  </div>
  <div class="mb-5">
    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
    <textarea id="description" name="description" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here...">{{$tasks->description}}</textarea>
  </div>
  <div class="mb-5">
    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
    <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected value="0">In Complete</option>
            <option value="1">Completed</option>
        </select>
  </div>
  <button type="submit" class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>
</div>
</div>
<script>
     $("#tesk_update").validate({

            rules: {
                name: {
                    required: true,
                    maxlength: 100
                },                
                description: {
                    required: true,
                },
            },
            messages: {
                name:{
                    required: "Name is Required.",
                    maxlength: "Text must be less than 100 characters."
                },
                description: {
                    required: "Description is Required.",
                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
</script>

@endsection