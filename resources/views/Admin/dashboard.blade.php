@extends('layouts.home')

@section('content')
@include('Admin.navbar');
<div class="flex justify-between max-w-[45rem] mx-auto mt-24">
    <div>
        <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Competed Tasks</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">{{$com_task}}</p>
        </a>
    </div>
    <div class="ml-2">
        <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">In Competed Tasks</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">{{$incom_task}}</p>
        </a>
    </div>
    <div class="ml-2">
        <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total Developers</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">{{$total_user}}</p>
        </a>
    </div>    
</div>
@endsection