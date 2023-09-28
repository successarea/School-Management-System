@extends('layout/admin-layout')

@section('styles')
<style>
    body {
        background-color: #fff;
    }
    /* Custom Styles */
    .container {
        padding: 10px;
        
    }

    

    

    .btn-warning {
        background-color: #17a2b8;
        color: #333;
        border: none;
        border-radius: 10px;
        padding: 5px 15px;
        text-decoration: none;
    }

    .btn-danger {
        background-color: #dc3545;
        color: #fff;
        border: none;
        border-radius: 10px;
        padding: 5px 15px;
        text-decoration: none;
    }

    .btn-danger:hover {
        background-color: #FFA500;
    }
    .profile-photo {
        width: 100px;
        height: 100px;
        border: 5px solid #007bff; /* Profile photo border color */
        border-radius: 50%;
    }


    .table {
        border: none;
    }
    thead {
        background-color: #17a2b8;
        color: #fff;
    }

    .table th,
    .table td {
        font-size: 16px;
    }

</style>
@endsection

@section('admin-master')
<div class="container">
    <div class="row">
        <div class="col-md-12">
  
                <h3>Teacher Table <a href="/admin/toG12Student" class="btn btn-warning btn-sm float-right text-white">To Student Table</a></h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $counter = 1; // Initialize a counter
                        @endphp
                        @foreach($teachers as $teacher)
                        <tr>
                            <td>{{ $counter++ }}</td>
                            <td><img class="profile-photo rounded-circle" src="{{ $teacher['image'] }}" alt="Profile Picture" style="width:100px; height:100px;"></td>
                            <td>{{ $teacher['name'] }}</td>
                            <td>{{ $teacher['email'] }}</td>
                            <td>{{ $teacher['ph_number'] }}</td>
                            <td><a href="/admin/deleteUser/{{ $teacher['id'] }}" class="btn btn-danger btn-sm">Delete</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $teachers->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
</html>
