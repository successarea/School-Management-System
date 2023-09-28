<!-- Second Code -->

@extends('/layout/admin-layout')
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
@section('admin-master')

    <div>
    
    <h2 style="display: inline;">Timetable</h2>
    <a href="/loadManageTimetable" class="btn btn-success float-right">Add Class</a>
    </div>
    

    <div class="form-group">
        <!-- <label for="grade-select">Select Grade:</label> -->
        <select id="grade-select" class="form-control bg-secondary" style="background-color: ; color: #fff;">
            <option value="">Select Grade</option>
            @foreach ($grades as $grade)
                <option value="{{ $grade }}">Grade-{{ $grade }}</option>
            @endforeach
        </select>
    </div>


    <div class="table-responsive" id="grade-10" style="display: none;">
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
                                @foreach ($timetable_10 as $class)
                                    @if ($class['day'] == $day && $class['start_time'] == $hour . ':00:00')
                                        {{ $class['class_name'] }}   

                                            <a data-toggle="modal" data-target="#updateTimetable" href="" class="editTimetable btn btn-success float-right btn-sm"
                                            data-id="{{ $class['id'] }}" 
                                            data-name="{{ $class['class_name'] }}" >
                                            <span><i class="fa-solid fa-pen-to-square"></i></span>
                                            </a>
                                        
                                        
                                    @endif
                                @endforeach
                            </td>
                        @endforeach
                        
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
    
    <div class="table-responsive" id="grade-11" style="display: none;">
    <table class="table table2 table-bordered">
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
                                @foreach ($timetable_11 as $class)
                                    @if ($class['day'] == $day && $class['start_time'] == $hour . ':00:00')
                                        {{ $class['class_name'] }} 
                                        
                                        <a data-toggle="modal" data-target="#updateTimetable11" href="" class="editTimetable11 btn btn-success float-right btn-sm"
                                            data-id="{{ $class['id'] }}" 
                                            data-name="{{ $class['class_name'] }}" >
                                            <span><i class="fa-solid fa-pen-to-square"></i></span>
                                        </a>
                                    @endif
                                @endforeach
                            </td>
                        @endforeach
                        
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>

    <div class="table-responsive" id="grade-12" style="display: none;">
    <table class="table table3 table-bordered">
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
                                @foreach ($timetable_12 as $class)
                                    @if ($class['day'] == $day && $class['start_time'] == $hour . ':00:00')
                                        {{ $class->class_name }}
                                        
                                        <a data-toggle="modal" data-target="#updateTimetable12" href="" class="editTimetable12 btn btn-success float-right btn-sm"
                                            data-id="{{ $class['id'] }}" 
                                            data-name="{{ $class['class_name'] }}" >
                                            <span><i class="fa-solid fa-pen-to-square"></i></span>
                                        </a>
                                    @endif
                                @endforeach
                            </td>
                        @endforeach
                        
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
    <div id="loading-message" class="alert alert-secondary">
        <!-- Message to show before grade selection -->
        Please select a grade to view the timetable.
    </div>
    


<!-- Update Modal for Grade 10-->
<div class="modal fade" id="updateTimetable" tabindex="-1" role="dialog" aria-labelledby="updateTimetableLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateTimetableLabel">Edit Class</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editClassForm" method="POST">
            @csrf
          <div class="form-group">
            <label for="className">Class Name : </label>
            <input type="text" class="" id="className" style="width: 400px;" placeholder="">
          </div>
          <input type="hidden" id="classId" name="classId" value="">
          </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary updateSubmit" id="saveChangesBtn">Save changes</button>
            </div>
        </form>
    </div>
  </div>
</div>

    



<!-- Update Modal for Grade 11-->
<div class="modal fade" id="updateTimetable11" tabindex="-1" role="dialog" aria-labelledby="updateTimetable11Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateTimetable11Label">Edit Class</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editClassForm11" method="POST">
            @csrf
          <div class="form-group">
            <label for="className">Class Name : </label>
            <input type="text" class="" id="className11" style="width: 400px;" placeholder="">
          </div>
          <input type="hidden" id="classId11" name="classId" >
          </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary updateSubmit11" id="saveChangesBtn">Save changes</button>
            </div>
        </form>
    </div>
  </div>
</div>

    



<!-- Update Modal for Grade 12-->
<div class="modal fade" id="updateTimetable12" tabindex="-1" role="dialog" aria-labelledby="updateTimetable12Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateTimetable12Label">Edit Class</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editClassForm12" method="POST">
            @csrf
          <div class="form-group">
            <label for="className">Class Name : </label>
            <input type="text" class="" id="className12" style="width: 400px;" placeholder="">
          </div>
          <input type="hidden" id="classId12" name="classId" value="">
          </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary updateSubmit12" id="saveChangesBtn">Save changes</button>
            </div>
        </form>
    </div>
  </div>
</div>

    


@endsection

@section('admin-js')
<script>
$(document).ready(function () {
    
// Showing data in the update form for Grade 10
        $(document).on('click', '.editTimetable', function() {
            
            let id = $(this).data('id');
            let class_name = $(this).data('name');
            
            $('#classId').val(id);
            $('#className').val(class_name);

        });

// Updating the timetable for Grade 10
        $(document).on('click', '.updateSubmit', function(e) {
            e.preventDefault();
            let class_name = $('#className').val();
            let id = $('#classId').val();

            $.ajax({
                url:"{{ url('update_timetable') }}",
                method:'post',
                data:{className:class_name, classId:id},
                success:function(res){
                    
                    if(res.status=='success'){
                        $('#updateTimetable').modal('hide');
                        $('#editClassForm')[0].reset();
                        $('.table1').load(location.href+' .table1');   
                      
                    } else {

                    }
                }
            })
        });

// Showing data in the update form for Grade 11
        $(document).on('click', '.editTimetable11', function() {
                    
                    let id = $(this).data('id');
                    let class_name = $(this).data('name');
                    // console.log(class_name)
                    $('#classId11').val(id);
                    $('#className11').val(class_name);

                });

// Updating the timetable for Grade 11
                $(document).on('click', '.updateSubmit11', function(e) {
                    e.preventDefault();
                    let class_name = $('#className11').val();
                    let id = $('#classId11').val();

                    $.ajax({
                        url:"{{ url('update_timetable') }}",
                        method:'post',
                        data:{className:class_name, classId:id},
                        success:function(res){
                            
                            if(res.status=='success'){
                                $('#updateTimetable11').modal('hide');
                                $('#editClassForm11')[0].reset();
                                $('.table2').load(location.href+' .table2');   
                            
                            } else {

                            }
                        }
                    })
                });


// Showing data in the update form for Grade 12
                $(document).on('click', '.editTimetable12', function() {
                            
                            let id = $(this).data('id');
                            let class_name = $(this).data('name');
                            // console.log(class_name)
                            $('#classId12').val(id);
                            $('#className12').val(class_name);

                        });

// Updating the timetable for Grade 12
                $(document).on('click', '.updateSubmit12', function(e) {
                    e.preventDefault();
                    let class_name = $('#className12').val();
                    let id = $('#classId12').val();

                    $.ajax({
                        url:"{{ url('update_timetable') }}",
                        method:'post',
                        data:{className:class_name, classId:id},
                        success:function(res){
                            
                            if(res.status=='success'){
                                $('#updateTimetable12').modal('hide');
                                $('#editClassForm12')[0].reset();
                                $('.table3').load(location.href+' .table3');   
                            
                            } else {

                            }
                        }
                    })
                });
// Some Js design code 
    $('#grade-select').change(function () {
        var selectedGrade = $(this).val();

        // Hide the loading message with a fade-out animation when a grade is selected
        $('#loading-message').fadeOut(1000); // 1000 milliseconds (1 second) duration

        filterTimetable(selectedGrade);
    });

    function filterTimetable(grade) {
        // Hide all grade tables
        $('.table-responsive').hide();

        if (grade) {
            // Show the selected grade table if a grade is selected
            $('#grade-' + grade).show();
        }
    }

    // Show the loading message initially if no grade is selected on page load
    if (!$('#grade-select').val()) {
        $('#loading-message').fadeIn(1000); // 1000 milliseconds (1 second) duration
    }
});


</script>

@endsection
