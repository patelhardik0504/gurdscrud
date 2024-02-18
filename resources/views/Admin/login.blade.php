@extends('layouts.home')

@section('content')
<h1 class="text-center text-2xl bold mt-6">Login</h1>
@if($errors->any())
    <div class="alert alert-danger text-center m-4">
        <ul>
            @foreach($errors->all() as $error)
                <li class="text-red-500">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form class="max-w-sm mx-auto mt-5" id="loginForm" method="post" action="{{ route('post.admin.login') }}">
    @csrf
   <div class="mb-5">
   <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Your Role </label>
  <select id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option value="">Choose your role</option>
    <option value="1">Admin</option>
    <option value="2">Developer</option>
  </select>
   </div>
  <div class="mb-5">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
    <input type="email"  id="email" name="email" value="{{old('email')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter the Please email" />
  </div>
  <div class="mb-5">
    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
    <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Please Enter the Password"/>
  </div>
  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>
<script>
     $("#loginForm").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                role: {
                    required: true
                },
                password:
                {
                required: true,
                minlength: 8,
                },
            },
            messages: {
                email:{
                    required: "Please Enter a Email.",
                    email: "Please Enter a Valid."
                },
                role: {
                    required: "Please Select a Role.",
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 8 characters long"
                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });

</script>
@endsection
 