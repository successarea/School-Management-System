<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        /* Custom Landing Page Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #0a63a0; /* Fancy background color */
            color: #fff; /* Text color */
            margin: 0;
            padding: 0;
        }

        .landing-container {
            background-color: rgba(0, 0, 0, 0.7); /* Background overlay */
            padding: 100px 0;
            text-align: center;
        }

        .landing-text {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .landing-description {
            font-size: 18px;
            margin-bottom: 40px;
        }

        .btn-login,
        .btn-register {
            background-color: #ff8c00; /* Button background color */
            color: #fff; /* Button text color */
            padding: 15px 30px;
            font-size: 18px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-login:hover,
        .btn-register:hover {
            background-color: #ff6d00; /* Button hover background color */
        }

        /* Navigation Bar Styles */
        .navbar {
            background-color: #333; /* Navbar background color */
        }
        
        .navbar-nav .nav-item {
            margin-right: 15px;
        }

        .navbar-nav .nav-link {
            color: #fff; /* Navbar text color */
            font-size: 16px; /* Font size for navbar links */
            padding: 10px 20px; /* Adjust padding for a larger clickable area */
            border-radius: 30px; /* Make the buttons round */
            transition: background-color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            background-color: #ff8c00; /* Navbar button hover background color */
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand text-info" href="#">AUNG MYAY Education Center</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link btn-fancy" href="#">Achievement</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-fancy" href="#">Activity</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-fancy" href="#">School Fee</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid landing-container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1 class="landing-text">Welcome to Our School</h1>
                <p class="landing-description">Discover amazing features and join our community.</p>
                <a href="/login" class="btn btn-login mr-3">Login</a>
                <a href="/register" class="btn btn-register">Register</a>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
