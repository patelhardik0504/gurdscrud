

<h1 class="text-center text-2xl bold mt-6 mb-2">Admin Dashboard<p>Welcome, {{ auth()->user()->first_name }}</p></h1>
<div class="user-info" style="position: absolute; right: 31rem; align-items: center; display: flex;">
<a href="/admin-dashboard" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Dashboard</a> 
<a href="/admin-tasks" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Task List</a>
<a href="/admin-logout" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 float-right"> Logout</a></br>
</div>