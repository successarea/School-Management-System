<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AUNG MYAY Private School</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
  <!-- Include Custom CSS -->
  <style>
    body {
      background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(https://media.istockphoto.com/id/472573404/photo/clock-and-book-before-blackboard.jpg?s=612x612&w=0&k=20&c=dIgoZ8YTArlMJ1pQ0djm_JJwd9GWzonoy08F9CCxLFg=);
      background-position: center;
      background-size: cover;
    }
    .login-container {
      max-width: 400px;
      margin: 0 auto;
      padding: 30px;
      background-color: #00000080;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .login-heading {
      text-align: center;
      margin-bottom: 20px;
    }
    .login-form {
      margin-bottom: 20px;
    }
    .login-form input[type="email"],
    .login-form input[type="password"] {
      border: none;
      color: #333333;
      border-bottom: 1px solid #ddd;
      border-radius: 5px; /* Added border-radius for rounded corners */
      padding-left: 10px; /* Add left padding to move content away from the left border */
      padding-right: 10px;
      outline: none;
      width: 100%;
    }
    
    .login-btn {
      background-color: cyan;
      color: black;
      border: none;
      border-radius: 5px; /* Added border-radius for rounded corners */
      padding: 10px 20px;
      cursor: pointer;
      
    }
    .login-btn:hover {
      background-color: grey;
    }
    
    /* Additional Styles for School Information */
    .school-info {
      padding: 30px;
      background-color: #00000080;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    /* Customize styles for your school's information */
  </style>
</head>
<body>
  <div class="container">
    <div class="row mt-5">
      <!-- Login Form (Col-md-6) -->
      <div class="col-md-6 col-sm-12 mx-auto"> <!-- Added col-sm-12 for small screens -->
        <div class="login-container">
          <h2 class="login-heading text-warning">Login</h2>
          <!-- Your login form code here -->
          <form action="/loginForm" method="POST" class="login-form">
            @csrf
            <div class="mb-3">
              <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <div class="mb-3">
              <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" >
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <div> <a href="/forgetPasswordGet" class="text-primary" style="text-decoration: none;">Forget Password?</a></div>
            <button type="submit" class="login-btn btn btn-sm btn-block mt-3">Login</button>
          </form>
          @if(session('error'))
          <div class="alert alert-success">
            {{ session('error') }}
          </div>
          @endif

          <span class="text-warning">If you don't have account, register <a href="/register" style="font-weight:bold;">here.</a></span>
        </div>
      </div>
      
      <!-- School Information (Col-md-6) -->
      <div class="col-md-6 col-sm-12">
        <div class="school-info">
          <!-- Add your school's information and design here -->
          <h2 class="text-warning">AUNG MYAY Private School</h2>
          
          <p class="text-white">Welcome to AUNG MYAY School, where we are committed to providing quality education and fostering a nurturing environment for our students.</p>
          <p class="text-white">Founded in 1990, AUNG MYAY School has a rich history of academic excellence and extracurricular achievements. Our dedicated faculty and staff are passionate about helping students succeed both academically and personally.</p>
          <p class="text-white">Our school offers a wide range of programs, including:</p>
          <ul>
              <li class="text-white">Grade-10 Education</li>
              <li class="text-white">Grade-11 Education</li>
              <li class="text-white">Extracurricular Activities</li>
              <li class="text-white">Social Activities</li>
          </ul>
          <p class="text-white">Explore our website to learn more about our school's mission, values, and the opportunities we provide to our students.</p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
