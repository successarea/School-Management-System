@extends('layout/admin-layout')
@section('styles')
<style>
    /* Custom Admin Panel Styles */
    body {
        background-color: #fff;
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
    /* User Table Styles */
    .table {
        border: none;
    }

    thead {
        background-color: #17a2b8;
        color: #fff;
    }

    
    
</style>
@endsection
@section('admin-master')

<div class="container">
    <div class="row justify-content-center">
        <!-- Admin Profile  -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('User Profile') }}</div>

                <div class="card-body">
                    <div class="text-center">
                        <img style="width:100px; height:100px;" src="{{ Auth::user()->image }}" alt="Profile Photo" class="profile-photo rounded-circle">
                        <h2 class="profile-name mt-3">{{ Auth::user()->name }}</h2>
                        <p class="profile-email">{{ Auth::user()->email }}</p>
                        <p class="profile-phone">Phone: {{ Auth::user()->ph_number }}</p>
                        <p class="profile-role">Role: {{ Auth::user()->role }}</p>
                        <a href="/admin/editPfLoad/{{ Auth::user()->id }}" style="border-top-left-radius: 10px; border-bottom-right-radius: 10px; width:200px;" class="btn btn-dark">Edit Profile</a>
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
                    <th>Action</th>
                    
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
                        <td><a href="/user/loadEdit/{{ $user->id }}" class="btn btn-sm roleEditBtn">Edit Role</a></td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

            
            {{ $users->links() }}

        </div>
    </div> 
</div>




@endsection


