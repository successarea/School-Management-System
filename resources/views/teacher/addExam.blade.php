@extends('layout/teacher-layout')

@section('styles')
<style>

body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    
}

.container {
    display: flex;
    justify-content: space-between;
    max-width: 1200px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.left-side {
    flex: 1;
    padding: 20px;
}

.left-side h1 {
    font-size: 24px;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    font-weight: bold;
}

.form-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.form-group select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
button {
    background-color: #17a2b8;
    color: #fff;
    padding: 10px 15px;
    border: 1px;
    border-radius: 7px;
    cursor: pointer;
    font-size: 17px;
    /* width: 110px; */
}

button:hover {
    background-color: blue;
}
.right-side {
    flex: 1;
    padding: 20px;
    background-color: #f7f7f7;
}

.right-side h2 {
    font-size: 24px;
    margin-bottom: 20px;
}

.right-side p {
    font-size: 16px;
}

.right-side ul {
    list-style: disc;
    padding-left: 20px;
}

.right-side li {
    margin-bottom: 10px;
}

</style>
@endsection

@section('teacher-master')

<div class="container">
        <div class="left-side">
            <h1 style="color: #17a2b8;">Add Examination</h1>
            
            <form action="submit_exam" method="POST" enctype="multipart/form-data"> 
                @csrf
                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <select name="subject" id="subject" required>
                        <option value="">Select Subject</option>
                        <option value="Myanamr" {{ old('subject') === 'Myanmar' ? 'selected' : '' }}>Myanmar</option>
                        <option value="English" {{ old('subject') === 'English' ? 'selected' : '' }}>English</option>
                        <option value="Maths" {{ old('subject') === 'Maths' ? 'selected' : '' }}>Maths</option>
                        <option value="Chemistry" {{ old('subject') === 'Chemistry' ? 'selected' : '' }}>Chemistry</option>
                        <option value="Physics" {{ old('subject') === 'Physics' ? 'selected' : '' }}>Physics</option>
                        <option value="Biology" {{ old('subject') === 'Biology' ? 'selected' : '' }}>Biology</option>
                        <option value="Eco" {{ old('subject') === 'Eco' ? 'selected' : '' }}>Eco</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="date">Date:</label>
                    <input class="mb-2" type="date" id="date" name="date" value="{{ old('date') }}" min="@php echo date('Y-m-d'); @endphp" required>
                    @error('date')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="time">Time:</label>
                    <input type="time" id="time" name="time" name="date" value="{{ old('date') }}" required>
                </div>
                <div class="form-group">
                    <label for="grade">Grade:</label>
                    <select name="grade" id="grade" required>
                        <option value="">Select Grade</option>
                        <option value="Grade 10" {{ old('grade') === 'Grade 10' ? 'selected' : '' }}>Grade 10</option>
                        <option value="Grade 11" {{ old('grade') === 'Grade 11' ? 'selected' : '' }}>Grade 11</option>
                        <option value="Grade 12" {{ old('grade') === 'Grade 12' ? 'selected' : '' }}>Grade 12</option>
                    </select>
                </div>
                <button class="mt-3" type="submit">Submit</button>
            </form>
        </div>
        <div class="right-side">
            <h2 style="color: #17a2b8;">Exam Information & Rules</h2>
            <p style="color: #000;">
                Here you can add exams with the relevant details on the left side.
                On the right side, you can provide information about the exams and any rules or guidelines.
            </p>
            <ul>
                <li style="color: #000;">Exams must be added at least one week in advance.</li>
                <li style="color: #000;">Make sure to double-check all the details before submitting.</li>
                <li style="color: #000;">Contact the administrator for any issues or concerns.</li>
            </ul>
        </div>
    </div>
@if(session('success'))
<div class="alert alert-success" id="alert">
    {{ session('success') }}
</div>
@endif
@endsection

@section('Js')
<script>
    // Function to automatically close the success alert after a few seconds
    function closeSuccessAlert() {
        var successAlert = document.getElementById('alert');
        if (successAlert) {
            setTimeout(function() {
                successAlert.style.display = 'none';
            }, 5000); // Adjust the time (in milliseconds) as needed (e.g., 5000 milliseconds = 5 seconds)
        }
    }

    // Call the closeSuccessAlert function when the page loads
    window.addEventListener('load', closeSuccessAlert);
</script>
@endsection