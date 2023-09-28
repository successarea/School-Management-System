@extends('/layout/admin-layout')

@section('styles')
<style>
    /* Style the form container */
    .form-container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f5f5f5;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    /* Style form labels */
    label {
        font-weight: bold;
    }

    /* Style select inputs */
    select {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    /* Style text inputs */
    input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    /* Style the submit button */
    button[type="submit"] {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        margin-top: 10px;
    }

    /* Style success alert */
    .successAlert {
        margin-top: 20px;
        padding: 10px;
        background-color: #28a745;
        color: #fff;
        border-radius: 3px;
    }

    /* Horizontal form layout */
    .form-group {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
    }

    .form-group label {
        flex: 1;
        margin-right: 10px;
    }

    .form-group select,
    .form-group input[type="text"] {
        flex: 2;
    }
</style>
@endsection

@section('admin-master')
<div class="form-container">
    @if(session('success'))
        <div class="alert successAlert" id="alert">
            {{ session('success') }}
        </div>
    @endif
    
    @if(session('error'))
        <div class="alert alert-danger" id="alert">
            {{ session('error') }}
        </div>
    @endif
        <h2 style="display: inline;">Create Timetable</h2>
        <a href="/showTimetable" class="btn btn-secondary btn-sm float-right mt-2"><< Back</a>
    <form method="POST" action="/storeTimetable">
        @csrf
        <div class="form-group">
            <label for="day">Select Day:</label>
            <select name="day" id="day" required>
                <option value="">Select One</option>
                <option value="Monday" {{ old('day') === 'Monday' ? 'selected' : '' }}>Monday</option>
                <option value="Tuesday" {{ old('day') === 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                <option value="Wednesday" {{ old('day') === 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                <option value="Thursday" {{ old('day') === 'Thursday' ? 'selected' : '' }}>Thursday</option>
                <option value="Friday" {{ old('day') === 'Friday' ? 'selected' : '' }}>Friday</option>
            </select>
        </div>

        <div class="form-group">
            <label for="grade">Select Grade:</label>
            <select name="grade" id="grade" required>
                <option value="">Select One</option>
                <option value="10">Grade 10</option>
                <option value="11">Grade 11</option>
                <option value="12">Grade 12</option>
            </select>
        </div>

        @for ($hour = 6; $hour <= 17; $hour++)
            <div class="form-group">
                <label for="class_{{ $hour }}">Class at {{ $hour }}:00</label>
                <input type="text" name="class_{{ $hour }}" id="class_{{ $hour }}" value="{{ old('date') }}" placeholder="Enter class name" required>
            </div>
        @endfor

        <button type="submit">Save</button>
    </form>
    
</div>
@endsection
