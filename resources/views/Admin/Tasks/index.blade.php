@extends('layouts.home')

@section('content')
@include('Admin.navbar')
<div class="max-w-[50rem] mx-auto mt-24">
@if ($tasks->isEmpty())
    <p>No tasks found.</p>
@else
  <table class="table-auto border-collapse border border-slate-300 rounded-lg mb-4">
    <thead>
      <tr class="">
        <th class="border border-slate-300 bg-slate-100">Index</th>
        <th class="border border-slate-300 bg-slate-100">Task Name</th>
        <th class="border border-slate-300 bg-slate-100">Developer name</th>
        <th class="border border-slate-300 bg-slate-100">Status</th>       
      </tr>
    </thead>
    <tbody>
      @php $i =1 ; @endphp
      @foreach ($tasks as $item)
      <tr>
      <td class="border-bottom border-slate-300">{{$i}}</td>
        <td class="border-bottom border-slate-300">{{$item->name}}</td>
        <td class="border-bottom border-slate-300">{{$item['user']->first_name}} {{$item['user']->last_name}}</td>
        <td class="border-bottom border-slate-300">
        @if($item->status == 1)
          <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Completed</span>
          @else
          <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Pending</span>
          @endif
        </td>
      </tr>
      @php $i++; @endphp
      @endforeach
    </tbody>
  </table>
  {{ $tasks->links() }}
  @endif
</div>
@endsection