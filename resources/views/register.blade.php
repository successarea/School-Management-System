<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Include Custom CSS -->
  
  <style>
    body {
      background-image: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)), url('https://media.istockphoto.com/id/1265582169/photo/elementary-school-science-teacher-uses-interactive-digital-whiteboard-to-show-classroom-full.jpg?s=612x612&w=0&k=20&c=pER6vSKJisVmUjUQuA3WSRMG2ppFiUb5Yebbg7EwElg='); /* Replace 'your-image-url.jpg' with the URL of your background image */
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }
    .registration-form {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      background-color: #00000080;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="registration-form">
          <h2 class="text-center text-warning mb-4" style="font-weight:bold;">Register</h2>
          <form action="/regForm" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
              <div class="form-group col-md-6">
                <label class="text-warning" for="username" style="font-weight: bold;">Username</label>
                <input value="{{ old('name') }}" type="text" name="name" id="username" class="form-control @error('name') is-invalid @enderror" placeholder="Username" required>
                @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label class="text-warning" for="email" style="font-weight: bold;">Email</label>
                <input value="{{ old('email') }}" type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required>
                @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label class="text-warning" for="password" style="font-weight: bold;">Password</label>
                <input value="{{ old('password') }}" type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
                @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label class="text-warning" for="confirm-password" style="font-weight: bold;">Confirm Password</label>
                <input value="{{ old('password_confirmation') }}" type="password" name="password_confirmation" id="confirm-password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password" required>
                @error('password_confirmation')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label class="text-warning" for="ph" style="font-weight: bold;">Phone Number</label>
                <input value="{{ old('phNum') }}" type="text" name="phNum" id="ph" class="form-control @error('phNum') is-invalid @enderror" placeholder="Phone Number" required>
                @error('phNum')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label class="text-warning" for="grade" style="font-weight: bold;">Grade</label>
                <select name="grade" id="grade" class="form-control @error('grade') is-invalid @enderror" required>
                  <option value="">Select Grade</option>
                  <option value="Grade 10" {{ old('grade') === 'Grade 10' ? 'selected' : '' }}>Grade 10</option>
                  <option value="Grade 11" {{ old('grade') === 'Grade 11' ? 'selected' : '' }}>Grade 11</option>
                  <option value="Grade 12" {{ old('grade') === 'Grade 12' ? 'selected' : '' }}>Grade 12</option>
                </select>

                <input type="hidden" name="grade_id" id="grade_id" value="">

                @error('grade')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <button type="submit" class="btn btn-info btn-block">Register</button>
          </form>
          <p class="text-warning">If you have already an account, login <a href="/login"  style="font-weight: bold;">here.</a></p>
        </div>
      </div>
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  // Listen for changes in the grade select dropdown
  $('#grade').on('change', function() {
    // Get the selected grade value
    var selectedGrade = $(this).val();
    
    // Define an object to map grade names to their corresponding grade_id values
    var gradeIdMapping = {
      'Grade 10': 10,
      'Grade 11': 11,
      'Grade 12': 12
    };
    
    // Set the value of the hidden grade_id input based on the selected grade
    $('#grade_id').val(gradeIdMapping[selectedGrade]);
  });
});
</script>

</body>
</html>
