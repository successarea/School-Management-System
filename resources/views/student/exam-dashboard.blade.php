@extends('layout/student-layout')

@section('styles')
<style>
    body, h1, h2, p, ul, ol, li, table, th, td {
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, sans-serif;
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

@section('student-master')


    <main>
        <section class="grade">
            <h2>Exam Schedule</h2>
            <table>
                <tr class="bg-info">
                    <th>Subject</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Teacher Name</th>
                </tr>
                @foreach($exams as $exam)
                <tr>
                <td>{{ $exam['subject'] }}</td>
                <td>{{ $exam['date'] }}</td>
                <td>{{ $exam['time'] }}</td>
                <td>{{ $exam['tr_name'] }}</td>
                </tr>
                @endforeach
                <!-- Add more rows for Grade 10 schedule -->
            </table>
        </section>

        
@endsection