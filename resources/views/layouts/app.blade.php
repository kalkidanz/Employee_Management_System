<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Employee Management System')</title>
   
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
  
    <nav class="side-bar">
        <ul> 
          <li class="logo">
            <img src="{{asset('images/logo.png')}}"/></i>
          <li>
          <a href = "/dashboard">Admin Dashboard</a>
          </li>
        <li>
          <a href = "/employees">Manage Employee</a>
        </li>
        <li>
        <a href="/departments">Manage Department</a>
      </li>
      <li>
        <a href="/payrolls">Manage Payrolls </a>
      </li>
      <li>
        <a href="/reports">View Reports </a>
      </li>
       <li>
        <form class="logout" action="{{ route('logout') }}" method="POST" >
            @csrf
            <button type="submit" style="border: none; cursor: pointer;">Logout</button>
        </form>
        
    </li></ul>

      </nav>
      <div class = "wrapper">
        <div class = "section">
            <main>
          <div class = "box-area">
            @yield('content')
          </div>
        </main> 
        </div>
      </div> 
    
</body>
</html>
