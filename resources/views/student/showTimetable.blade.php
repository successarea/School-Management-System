<!-- Second Code -->

@extends('/layout/student-layout')
@section('styles')
<style>
    /* Style the form inside the modal */
#editClassForm {
  padding: 20px;
}

/* Style the input fields */
.form-group {
  margin-bottom: 15px;
}

.form-control {
  width: 100%;
}

/* Center the modal title */
.modal-title {
  text-align: center;
}

/* Center the modal buttons */
.modal-footer {
  justify-content: center;
}

</style>
@endsection
@section('student-master')

    <div>
        <h2 style="display: inline;">Timetable</h2>
    </div>

    <div class="table-responsive" >
        <table class="table table1 table-bordered">
            <thead>
                <tr>
                    <th>Time</th>
                    @foreach ($days as $day)
                        <th>{{ $day }}</th>
                    @endforeach
                    
                </tr>
            </thead>
            <tbody>
                @for ($hour = 6; $hour <= 17; $hour++)
                    <tr>
                        <td>{{ $hour }}:00 - {{ ($hour + 1) }}:00</td>
                        @foreach ($days as $day)
                            <td>
                                @foreach ($timetables as $class)
                                    @if ($class['day'] == $day && $class['start_time'] == $hour . ':00:00')
                                        {{ $class['class_name'] }}   
                                    @endif
                                @endforeach
                            </td>
                        @endforeach
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>

@endsection

