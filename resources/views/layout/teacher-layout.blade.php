<!doctype html>
<html lang="en">
  <head>
  	<title>OnlineExamSystem</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
   
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
	  	<h1><a href="/teacher/dashboard" class="logo text-center text-white" style="background-color: #17a2b8;">Teacher Dashboard</a></h1>
      <ul class="list-unstyled components mb-5">
        <li class="{{ Request::is('teacher/profile') ? 'active' : '' }}">
            <a href="/teacher/profile"><span class="fa-sharp fa-solid fa-user mr-3"></span>Profile</a>
        </li>
        <li class="{{ Request::is('teacher/timetable') ? 'active' : '' }}">
            <a href="/teacher/timetable"><span class="fa-solid fa-clipboard-list mr-3"></span>Timetable</a>
        </li>
        <li class="{{ Request::is('examForm') ? 'active' : '' }}">
            <a href="/examForm"><span class="fa-solid fa-file-invoice mr-3"></span>Exam</a>
        </li>
        <li class="{{ Request::is('logout') ? 'active' : '' }}">
            <a href="/logout"><span class="fa-solid fa-right-from-bracket mr-3"></span>Logout</a>
        </li>
      </ul>


    	</nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5" style="background-color: ;">
            @yield('teacher-master')
        </div>
	</div>

    <!-- <script src="{{ asset('js/jquery.min.js') }}"></script> -->
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    
@yield('Js')
  </body>
</html>