@extends('layout/admin-layout')

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

    .btn-cancel {
        background-color: #17a2b8;
        color: grey;
        border-radius: 15px;
        width: 90px;
        margin-left: 20px;
        vertical-align: middle;
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
    }
    .table {
        border: none;
    }

    thead {
        background-color: #17a2b8;
        color: #fff;
    }

    .cancel:hover {
        background-color: skyblue;
    }
</style>
@endsection

@section('admin-master')

<div class="container">
    <div class="row justify-content-center">
        <!-- Admin Profile  -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header cardHead">
                <div style="display: inline-block;">
                    <span class="profile-update-title">Admin Profile Update</span>
                </div>
                <a href="/admin/dashboard" style=" padding: 5px; border-radius: 5px;" class="cancel btn btn-sm float-right"><i class="fa-sharp fa-solid fa-xmark fa-2xl" style="color: #f1f0f4;"></i></a>
                </div>
                
                <div class="card-body">
                    <form action="/admin/updatePf/{{ $admin[0]['id'] }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <img src="{{ $admin[0]['image'] }}" alt="Current Profile Photo" class="profile-photo">
                        <br>
                        <label class="mt-3" for="img">If you want to update your profile picture:</label>
                        <input type="file" id="img" name="img" class="profile-input">
                        <br>
                        <label style="display: block;" for="name">Name</label>
                        <input type="text" value="{{ $admin[0]['name'] }}" id="name" name="name" class="profile-input">
                        <label style="display: block;" for="email">Email</label>
                        <input type="email" value="{{ $admin[0]['email'] }}" id="email" name="email" class="profile-input">
                        <label style="display: block;" for="phNum">Phone No</label>
                        <input type="text" value="{{ $admin[0]['ph_number'] }}" id="phNum" name="phNum" class="profile-input">
                        <br>
                        <button class="btn btn-update-profile">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- User Role Edit -->
        <div class="col-md-8">
            <table class="table table-hover">
                <thead>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Grade</th>
                    <th>Ph Number</th>
                    <th>Role</th>
                    
                    
                </thead>
                <tbody>
                    @foreach($users as $key => $user)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            <img style="width:100px; height:100px;" src="{{ $user->image }}" alt="Profile Photo" class="profile-photo rounded-circle">
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->grade }}</td>
                        <td>{{ $user->ph_number }}</td>
                        <td>{{ $user->role }} </td>
                        
                    </tr>
                    @endforeach
                </tbody>

            </table>

            
            {{ $users->links() }}

        </div>
    </div>
</div>


@endsection
