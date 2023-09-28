@extends('layout/admin-layout')

@section('styles')
<style>
    /* Improved CSS styles for the feedback table */
    .feedback-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        font-size: 16px;
        background-color: #fff; /* White background */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
    }

    .feedback-table th,
    .feedback-table td {
        border: 1px solid #e0e0e0; /* Light gray border */
        padding: 12px;
        text-align: left;
    }

    .feedback-table th {
        background-color: #f2f2f2;
        font-weight: bold;
        color: #333; /* Dark gray text color */
    }

    .feedback-table tr:nth-child(even) {
        background-color: #f5f5f5; /* Light gray background for even rows */
    }

    .feedback-table tr:hover {
        background-color: #e0e0e0; /* Gray background on hover */
    }
</style>
@endsection

@section('admin-master')
<div class="container">
    <div>
    <h2 style="display: inline;">Feedback Table</h2>
    <a href="/delete-old-feedbacks" class="btn btn-secondary btn-sm float-right mt-3">Delete Old Feedbacks</a>
    </div>
    
    <table class="feedback-table">
        <thead>
            <tr>
                <th>Feedback</th>
                <th>Name</th>
                <th>Grade</th>
                <th>Role</th>
                <th>Time Sent</th>
            </tr>
        </thead>
        <tbody>
            <!-- Sample data, replace with your actual data from the database -->
            @foreach($feedbacks as $feedback)
                <tr>
                    <td>{{ $feedback->feedback }}</td>
                    <td>{{ $feedback->sender_name }}</td>
                    <td>{{ $feedback->sender_grade }}</td>
                    <td>{{ $feedback->sender_role }}</td>
                    <td>{{ $feedback->created_at }}</td>
                </tr>
            @endforeach
           
        </tbody>
    </table>
    @if(session('status'))
        <div class="alert alert-success mt-3">
            {{ session('status') }}
        </div>
    @endif
    {{ $feedbacks->links() }}
</div>
@endsection
