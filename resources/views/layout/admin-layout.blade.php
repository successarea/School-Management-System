<!doctype html>
<html lang="en">
  <head>
  	<title>OnlineExamSystem</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Include CSRF token as a meta tag -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  

  
  @yield('styles')

  </head>
  <body>
		
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>
	  	<h1><a href="/admin/dashboard" class="logo bg-info">Admin Dashboard</a></h1>
      <ul class="list-unstyled components mb-5">
        <li class="{{ Request::is('admin/grade10') || Request::is('admin/toG10Student') ? 'active' : '' }}">
            <a href="/admin/grade10"><span class="fa fa-user mr-3"></span>Grade 10</a>
        </li>
        <li class="{{ Request::is('admin/grade11') || Request::is('admin/toG11Student') ? 'active' : '' }}">
            <a href="/admin/grade11"><span class="fa fa-user mr-3"></span>Grade 11</a>
        </li>
        <li class="{{ Request::is('admin/grade12') || Request::is('admin/toG12Student') ? 'active' : '' }}">
            <a href="/admin/grade12"><span class="fa fa-user mr-3"></span>Grade 12</a>
        </li>
        <li class="{{ Request::is('showTimetable') ? 'active' : '' }}">
            <a href="/showTimetable"><span class="fa-solid fa-clipboard-list mr-3"></span>Timetable</a>
        </li>
        <li class="{{ Request::is('exam/dashboard') ? 'active' : '' }}">
            <a href="/exam/dashboard"><span class="fa-solid fa-file-invoice mr-3"></span>Exam</a>
        </li>
        <li class="{{ Request::is('showingFeedback') ? 'active' : '' }}">
            <a href="/showingFeedback"><span class="fa-regular fa-comment mr-3"></span>Feedback</a>
        </li>
        <li class="{{ Request::is('logout') ? 'active' : '' }}">
            <a href="/logout"><span class="fa-solid fa-right-from-bracket mr-3"></span>Logout</a>
        </li>
      </ul>

      
    	</nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            @yield('admin-master')
        </div>
	</div>

    <!-- <script src="{{ asset('js/jquery.min.js') }}"></script> -->
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    <script>
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    </script>
    @yield('admin-js')
  
  </body>
</html>

