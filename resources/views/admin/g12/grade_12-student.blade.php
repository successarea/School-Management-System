
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

    
    .toTr {
        background-color: #17a2b8;
        color: #fff;
        border: none;
        border-radius: 10px;
        padding: 5px 15px;
        text-decoration: none;
    }
    
    .toTr:hover {
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
  
                <h3>Student Table <a href="/admin/grade12" class="btn btn-warning btn-sm float-right toTr">To Teacher Table</a></h3>
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
                        @foreach($students as $student)
                        <tr>
                            <td>{{ $counter++ }}</td>
                            <td><img class="profile-photo rounded-circle" src="{{ $student['image'] }}" alt="Profile Picture" style="width:100px; height:100px;"></td>
                            <td>{{ $student['name'] }}</td>
                            <td>{{ $student['email'] }}</td>
                            <td>{{ $student['ph_number'] }}</td>
                            <td>
                            <a href="/admin/deleteUser/{{ $student['id'] }}" class="btn btn-success btn-sm" style=" width:120px; display: block;">Exam Result</a>
                            <a href="/admin/deleteUser/{{ $student['id'] }}" class="btn btn-warning btn-sm mt-2" style=" width:120px; display: block;">Tuition Fee</a>
                            <a href="/admin/deleteUser/{{ $student['id'] }}" class="btn btn-info btn-sm mt-2"  style=" width:120px; display: block;">Show Details</a>
                            <a href="/admin/deleteUser/{{ $student['id'] }}" class="btn btn-danger btn-sm mt-2" style=" width:120px; display: block;">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $students->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
</html>



