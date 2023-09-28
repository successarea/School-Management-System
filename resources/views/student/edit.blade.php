@extends('layout/student-layout')

@section('styles')
<style>
    /* Custom Profile Update Styles */
    .profile-update-title {
        font-size: 14px;
        color: #fff;
        font-weight: bold;
        
    }

    .cardHead {
        background-color: #17a2b8;
    }


    /* Custom Profile Photo Styles */
    .profile-photo {
        width: 100px;
        height: 100px;
        border: 5px solid #007bff;
        border-radius: 50%;
        margin-left: 100px;
        
    }

    /* Custom Profile Input Styles */
    .profile-input {
        width: 250px;
        padding: 5px;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    /* Custom Update Profile Button Styles */
    .btn-update-profile {
        background-color: #17a2b8;
        color: #fff;
        border-radius: 10px;
        width: 200px;
        margin-left: 31px;
    }

    .btn-update-profile:hover {
        background-color: #FFA500;
        color: #fff;
    }

    .label {
        display: block;
    }

    .cancel:hover {
        background-color: skyblue;
    }

    .responsibility-title {
        background-color: #17a2b8;
        color: #fff;
    }
</style>
@endsection

@section('student-master')

<div class="container">
    <div class="row justify-content-center">
        <!-- Admin Profile  -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header cardHead">
                    <div style="display: inline-block;">
                        <span class="profile-update-title">Admin Profile Update</span>
                        
                    </div>
                    <a href="/student/profile" style=" padding: 5px; border-radius: 5px;" class="cancel btn btn-sm float-right"><i class="fa-sharp fa-solid fa-xmark fa-2xl" style="color: #f1f0f4;"></i></a>
                </div>
                <div class="card-body">
                    <form action="/student/updateProfile" method="POST" enctype="multipart/form-data">
                        @csrf
                        <img src="{{ Auth::user()->image }}" alt="Current Profile Photo" class="profile-photo">
                        <br>
                        <label class="mt-3 label" for="img">If you want to update your profile picture:</label>
                        <input type="file" id="img" name="img" class="profile-input">
                        <br>
                        <label class="label" for="name">Name</label>
                        <input type="text" value="{{ Auth::user()->name }}" id="name" name="name" class="profile-input">
                        <label class="label" for="email">Email</label>
                        <input type="email" value="{{ Auth::user()->email }}" id="email" name="email" class="profile-input">
                        <label class="label" for="phNum">Phone No</label>
                        <input type="text" value="{{ Auth::user()->ph_number }}" id="phNum" name="phNum" class="profile-input">
                        <br>
                        <button class="btn btn-update-profile">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- User Role Edit -->
        <div class="col-md-8">
        <div class="responsibility-card card">
            <h5 class="responsibility-title card-header">Responsibilities</h5>
            <div class="responsibility-text card-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae diam a est tincidunt porta.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae diam a est tincidunt porta.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae diam a est tincidunt porta.</p>
            </div>
        </div>
        <iframe style="margin-top: 30px; border: 5px;" width="600" height="320" src="https://www.youtube.com/embed/gHhQl4FFGbc" title="7 Effective Teaching Strategies For The Classroom" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </div>
</div>

@endsection
