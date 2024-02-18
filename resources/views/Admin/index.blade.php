@extends('layouts.home')

@section('content')
<h1 class="text-center text-2xl bold mt-6">Admin Register</h1>
@if($errors->any())
    <div class="alert alert-danger text-center m-4">
        <ul>
            @foreach($errors->all() as $error)
                <li class="text-red-500">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form class="max-w-sm mx-auto mt-5" id="adminForm" method="post" action="{{ route('admin.register') }}">
    @csrf
    <input type="hidden" value="1" name="role">
    @include('layouts.form');
</form>
@include('layouts.ajax_scripts');

@endsection
 