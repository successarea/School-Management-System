@extends('layout/admin-layout')
@section('styles')

<style>
    .table {
        border: none;
    }

    thead {
        background-color: #17a2b8;
        color: #fff;
    }

    .card-header {
        background-color: #17a2b8;
    }

    .btn-success {
        padding: 5px 5px; 
        border-radius: 3px; 
        text-decoration: none; 
        color: white; 
        background-color: #17a2b8;
        border-radius: 6px;
    }

    .btn-success:hover {
        background-color: #FFA500;
    }
</style>
@endsection
@section('admin-master')

<div class="container">
    <div class="row justify-content-center">
        <!-- Admin Profile  -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-white">{{ __('User Profile') }}</div>

                <div class="card-body">
                    <div class="text-center">
                        <img style="width:100px; height:100px;" src="{{ Auth::user()->image }}" alt="Profile Photo" class="profile-photo rounded-circle">
                        <h2 class="profile-name mt-3">{{ Auth::user()->name }}</h2>
                        <p class="profile-email">{{ Auth::user()->email }}</p>
                        <p class="profile-phone">Phone: {{ Auth::user()->ph_number }}</p>
                        <p class="profile-role">Role: {{ Auth::user()->role }}</p>
                        <!-- <a href="" style="border-top-left-radius: 10px; border-bottom-right-radius: 10px; width:200px;" class="btn btn-dark" data-toggle="modal" data-target="#adminPfModal">Edit Profile</a> -->
                    </div>
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
                    <th>Update Role</th>
                    
                </thead>
                <tbody>
                    
                    <tr>
                        <td>{{ $user[0]['id'] }}</td>
                        <td>
                            <img style="width:100px; height:100px;" src="{{ $user[0]['image'] }}" alt="Profile Photo" class="profile-photo rounded-circle">
                        </td>
                        <td>{{ $user[0]['name'] }}</td>
                        <td>{{ $user[0]['email'] }}</td>
                        <td>{{ $user[0]['grade'] }}</td>
                        <td>{{ $user[0]['ph_number'] }}</td>
                        <td>{{ $user[0]['role'] }} </td>
                        <form action="/user/editRole/{{ $user[0]['id'] }}" method="POST">
                        @csrf
                        <td><button class="btn btn-success">Update</button><a href="/admin/dashboard" class="btn btn-danger btn-sm" style="text-decoration:none; margin-left:10px;"><i class="fa-solid fa-xmark"></i></a>
                        
                        <br><br>
                            <select name="role" id="" style="padding: 3px; border: 1px solid #ccc; border-radius: 5px; width: 110px;">
                                <option value="">Select Role</option>
                                <option value="admin" {{ $user[0]['role'] == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="teacher" {{ $user[0]['role'] == 'teacher' ? 'selected' : '' }}>Teacher</option>
                                <option value="student" {{ $user[0]['role'] == 'student' ? 'selected' : '' }}>Student</option>
                            </select>
                    </td>
                    </form>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>
</div>




@endsection


