@extends('layouts.home')

@section('content')
@include('User.navbar')

<div class="max-w-[50rem] mx-auto mt-24">
<div  >
  <a href="/create-tasks" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Create the task</a>
  </div>

  @if($errors->any())
  <div class="alert alert-danger text-center m-4">
    <ul>
      @foreach($errors->all() as $error)
      <li class="text-red-300">{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <form action="{{ route('tasks.filter') }}" id="filterForm" method="GET">

  <select id="status" name="status"   onchange="this.form.submit()" class="max-w-80 w-full mb-3 ml-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-300 dark:focus:border-blue-300">
    <option value="">Select Status</option>
    <option value="all">All</option>
    <option value="0">InComplete</option>
    <option value="1">Completed</option>
  </select>
  </form>
  @if ($tasks->isEmpty())
  <p>No tasks found.</p>
@else
  <table class="table-auto border-collapse border border-slate-300 rounded-lg mb-4">
    <thead>
      <tr class="">
        <th class="border border-slate-300 bg-slate-100">Index</th>
        <th class="border border-slate-300 bg-slate-100">Name</th>
        <th class="border border-slate-300 bg-slate-100">Description</th>
        <th class="border border-slate-300 bg-slate-100">Status</th>
        <th class="border border-slate-300 bg-slate-100">Action</th>
      </tr>
    </thead>
    <tbody>
      @php $i =1 ; @endphp
      @foreach ($tasks as $item)
      <tr>
      <td class="border-bottom border-slate-300">{{$i}}</td>
        <td class="border-bottom border-slate-300">{{$item->name}}</td>
        <td class="border-bottom border-slate-300">{{$item->description}}</td>
        <td class="border-bottom border-slate-300">
          @if($item->status == 1)
          <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Completed</span>
          @else
          <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Pending</span>
          @endif
        </td>
        <td class="border-bottom border-slate-300" style="display: flex; align-items: center; gap: 5px;" class="">
          @if($item->status == 0)
          <a href="/edit/{{$item->id}}" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Edit</a>
          <a onclick="deletetask({{$item->id}})" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 float-right">Delete</a>
          <select onchange="change_status({{$item->id}})" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-300 dark:focus:border-blue-300">
            <option selected>In Complete</option>
            <option value="1">Completed</option>
          </select>
          @else
          <p>No Action Found</p>
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
<script>
 
  function change_status(id) {
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: 'POST',
      url: '/update-status',
      data: {
        id: id,
      },
      success: function(data) {
        alert(data.msg);
        window.location.reload();
      },
      error: function(xhr, status, error) {
        alert(xhr.responseText);
      }
    });
  }
  function deletetask(id) {
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: 'POST',
      url: '/delete-task',
      data: {
        id: id,
      },
      success: function(data) {
        alert(data.msg);
        window.location.reload();
      },
      error: function(xhr, status, error) {
        alert(xhr.responseText);
      }
    });
  }
</script>

@endsection