@extends('layout/student-layout')

@section('styles')
<style>
    /* Custom Admin Panel Styles */
    body {
        background-color: white;
    }

    .container {
        padding-top: 1px;
    }

    /* Card Styles */
    .card {
        border: none;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #17a2b8; /* Header background color */
        color: #fff; /* Header text color */
        font-weight: bold;
    }

    .card-body {
        background-color: #fff; /* Body background color */
    }

    .profile-photo {
        width: 100px;
        height: 100px;
        border: 5px solid #007bff; /* Profile photo border color */
        border-radius: 50%;
    }

    .profile-name {
        font-size: 24px;
        margin-top: 10px;
    }

    .profile-email {
        font-size: 16px;
    }

    .profile-phone {
        font-size: 16px;
        color: #777; /* Phone text color */
    }

    .profile-role {
        font-size: 16px;
        font-weight: bold;
        color: #007bff; /* Role text color */
    }

    .btn-dark {
        background-color: #17a2b8;
        color: #fff;
        border: none !important;
        border-radius: 10px !important;
        width: 200px !important;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .roleEditBtn {
        background-color: #17a2b8;
        color: white;
        border: none !important;
        border-radius: 10px !important;
        width: 94px !important;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin: 1px;
    }

    .roleEditBtn:hover {
        background-color: #FFA500;
        color: white;
    }

    .btn-dark:hover {
        background-color: #FFA500; /* Button hover background color */
    }

    /* Responsibilities Card Styles */
    .responsibility-card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        padding: 10px;
        margin-top: 5px;
    }

    .responsibility-title {
        font-size: 20px;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
    }

    .responsibility-text {
        font-size: 16px;
    }
</style>
@endsection

@section('student-master')

<div class="container">
<div class="row">
    <!-- Admin Profile -->
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">{{ __('User Profile') }}</div>
            <div class="card-body">
                <div class="text-center">
                    <img style="width:100px; height:100px;" src="{{ Auth::user()->image }}" alt="Profile Photo"
                        class="profile-photo rounded-circle">
                    <h2 class="profile-name mt-3">{{ Auth::user()->name }}</h2>
                    <p class="profile-email">{{ Auth::user()->email }}</p>
                    <p class="profile-phone">Phone: {{ Auth::user()->ph_number }}</p>
                    <p class="profile-role">Role: {{ Auth::user()->role }}</p>
                    <a href="/student/editProfile"
                        style="border-top-left-radius: 10px; border-bottom-right-radius: 10px; width:200px;"
                        class="btn btn-dark">Edit Profile</a>
                </div>
            </div>
        </div>
        <!-- Feedback Form -->
    <div class="card mt-4">
        <div class="card-header bg-dark">School Feedback</div>
        <div class="card-body">
            <form action="/feedback" method="POST">
                @csrf
                <div class="">
                    <label for="feedback">Your Feedback:</label>
                    <textarea class="width-100" id="feedback" name="feedback" rows="2" style="width: 300px; border-radius: 5px;" ></textarea>
                </div>
                <button type="submit" class="btn btn-primary bg-dark">Submit Feedback</button>
            </form>
        </div>
    </div>
    </div>

    <!-- Responsibilities Card -->
    <div class="col-md-8">
        
    <div class="card" style="background-color: ; border:;">
    <div class="card-header" style="background-color: ; border:;">
        <h3 class="text-white" style="display: inline-block;">Responsibilities and Tasks for a Student</h3>
        <div>
            <i class="fa-solid fa-envelope fa-beat-fade"></i><a href="" class="text-white" style="margin-left:10px; margin-right:20px;">aungmyay@34.com</a>
            <i class="fa-solid fa-phone fa-beat-fade"></i><a href="" class="text-white" style="margin-left:10px;">+1 234-567-8901</a>
        </div>
    </div>
    <div class="card-body">
        <p style="color: #000;"> 1. <strong>Homework Completion:</strong> Completing assigned homework and assignments on time.</p>

        <p style="color: #000;"> 2. <strong>Class Participation:</strong> Actively participating in classroom discussions and activities.</p>

        <p style="color: #000;"> 3. <strong>Study Habits:</strong> Developing effective study habits and time management skills.</p>

        <p style="color: #000;"> 4. <strong>Preparation:</strong> Preparing for quizzes, tests, and exams in advance.</p>

        <p style="color: #000;"> 5. <strong>Responsibility:</strong> Taking responsibility for personal belongings and maintaining a clean workspace.</p>

        <p style="color: #000;"> 6. <strong>Respect:</strong> Showing respect to teachers, classmates, and school staff.</p>

        <p style="color: #000;"> 7. <strong>Goal Setting:</strong> Setting academic and personal goals for self-improvement.</p>

        <p style="color: #000;"> 8. <strong>Attendance:</strong> Attending classes regularly and punctually.</p>

        <p style="color: #000;"> 9. <strong>Self-Advocacy:</strong> Advocating for one's educational needs and seeking help when necessary.</p>

        <p style="color: #000;"> 10. <strong>Extracurricular Involvement:</strong> Engaging in extracurricular activities and school initiatives.</p>
    </div>
</div>


    </div>
</div>

</div>
@if(session('success'))
<script>
    alert('Feedback has been sent successfully!')
</script>
@endif
@endsection
