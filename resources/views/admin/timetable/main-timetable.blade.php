@extends('/layout/admin-layout')

@section('styles')

@endsection


@section('admin-master')
<a href="/loadManageTimetable">Manage Timetable</a>
<a href="">Grade 10 Timetable</a>
<a href="">Grade 11 Timetable</a>
<a href="">Grade 12 Timetable</a>
@endsection




@extends('layouts.app')

@section('content')
    <h2>Timetable</h2>
    
    <!-- Add a dropdown to select the grade -->
    <label for="grade-select">Select Grade:</label>
    <select name="grade-select" id="grade-select">
        <option value="all">All</option>
        <option value="10">Grade 10</option>
        <option value="11">Grade 11</option>
        <option value="12">Grade 12</option>
    </select>
    
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Time</th>
                    @foreach ($days as $day)
                        <th>{{ $day }}</th>
                    @endforeach
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @for ($hour = 6; $hour <= 18; $hour++)
                    <tr>
                        <td>{{ $hour }}:00 - {{ ($hour + 1) }}:00</td>
                        @foreach ($days as $day)
                            <td class="timetable-cell" data-grade="{{ $selectedGrade }}">
                                @foreach ($timetable as $class)
                                    @if ($class->day == $day && $class->start_time == $hour . ':00:00' && $class->grade == $selectedGrade)
                                        {{ $class->class_name }}
                                    @endif
                                @endforeach
                            </td>
                        @endforeach
                        <td>
                            <a href="{{ route('timetable.edit', ['hour' => $hour]) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('timetable.destroy', ['hour' => $hour]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
    <a href="{{ route('timetable.create') }}" class="btn btn-success">Add Class</a>

    <!-- JavaScript to filter timetable by grade -->
    <script>
        document.getElementById('grade-select').addEventListener('change', function() {
            var selectedGrade = this.value;
            var cells = document.querySelectorAll('.timetable-cell');
            cells.forEach(function(cell) {
                if (cell.dataset.grade === selectedGrade || selectedGrade === 'all') {
                    cell.style.display = 'table-cell';
                } else {
                    cell.style.display = 'none';
                }
            });
        });
    </script>
@endsection
