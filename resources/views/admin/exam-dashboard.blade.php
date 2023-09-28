@extends('layout/admin-layout')

@section('styles')
<style>
    body, h1, h2, p, ul, ol, li, table, th, td {
    margin: 0;
    padding: 0;
}

body {
    /* font-family: Arial, sans-serif; */
    background-color: #f5f5f5;
    color: #333;
}

header {
    background-color: #007acc;
    color: white;
    /* text-align: center; */
    padding: 20px;
}

h1 {
    font-size: 24px;
}

main {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.grade {
    margin-bottom: 40px;
}

h2 {
    font-size: 20px;
    color: #007acc;
    margin-bottom: 10px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    /* background-color: #007acc; */
    color: white;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #ddd;
}

/* Add more styles as needed for a fancy design */
</style>
@endsection

@section('admin-master')
@if(session('status'))
    <div class="alert alert-success" id="alert">
        {{ session('status') }}
    </div>
@endif
<header class="bg-info">
        <h1 style="display: inline;">Exam Schedule</h1>
        <a href="/delete-old-exams" class="btn btn-secondary btn-sm float-right">Clear Expired Exams</a>
        
</header> 
    <main>
        <section class="grade">
            <h2>Grade 10 Exam Schedule</h2>
            <table>
                <tr class="bg-info">
                    <th>Subject</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Teacher Name</th>
                </tr>
                @foreach($G10_exams as $G10_exam)
                <tr>
                    <td>{{ $G10_exam['subject'] }}</td>
                    <td>{{ $G10_exam['date'] }}</td>
                    <td>{{ $G10_exam['time'] }}</td>
                    <td>{{ $G10_exam['tr_name'] }}</td>
                </tr>
                @endforeach
                <!-- Add more rows for Grade 10 schedule -->
            </table>
        </section>

        <section class="grade">
            <h2>Grade 11 Exam Schedule</h2>
            <table>
                <tr  class="bg-info">
                    <th>Subject</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Teacher Name</th>
                </tr>
                @foreach($G11_exams as $G11_exam)
                <tr>
                    <td>{{ $G11_exam['subject'] }}</td>
                    <td>{{ $G11_exam['date'] }}</td>
                    <td>{{ $G11_exam['time'] }}</td>
                    <td>{{ $G11_exam['tr_name'] }}</td>
                </tr>
                @endforeach
                <!-- Add more rows for Grade 11 schedule -->
            </table>
        </section>

        <section class="grade">
            <h2>Grade 12 Exam Schedule</h2>
            <table>
                <tr  class="bg-info">
                    <th>Subject</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Teacher Name</th>
                </tr>
                @foreach($G12_exams as $G12_exam)
                <tr>
                    <td>{{ $G12_exam['subject'] }}</td>
                    <td>{{ $G12_exam['date'] }}</td>
                    <td>{{ $G12_exam['time'] }}</td>
                    <td>{{ $G12_exam['tr_name'] }}</td>
                </tr>
                @endforeach
                <!-- Add more rows for Grade 12 schedule -->
            </table>
        </section>
    </main>
@endsection

@section('admin-js')
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