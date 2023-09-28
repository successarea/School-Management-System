@extends('/layout/student-layout')

@section('student-master')


<div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- School Introduction Content -->
                <div class="card" style="background-color: ; border:;">
                    <div class="card-header"  style="background-color:#17a2b8; border:;">
                        <h3 class="text-white" style="display: inline-block;">School Introduction</h3>
                        <div>
                        <i class="fa-solid fa-envelope fa-beat-fade"></i><a href="" class="text-white" style="margin-left:10px; margin-right:20px;">aungmyay23@.com</a>
                        <i class="fa-solid fa-phone fa-beat-fade"></i><a href=""  class="text-white" style="margin-left:10px;">+95 923745356</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <p style="color: #000;">Welcome to AUNG MYAY School, where we are committed to providing quality education and fostering a nurturing environment for our students.</p>
                        <p style="color: #000;">Founded in 1990, AUNG MYAY School has a rich history of academic excellence and extracurricular achievements. Our dedicated faculty and staff are passionate about helping students succeed both academically and personally.</p>
                        <p style="color: #000;">Our school offers a wide range of programs, including:</p>
                        <ul>
                            <li style="color: #000;">Grade-10 Education</li>
                            <li style="color: #000;">Grade-11 Education</li>
                            <li style="color: #000;">Grade-12 Education</li>
                            <li style="color: #000;">Extracurricular Activities</li>
                            <li style="color: #000;">Social Activities</li>
                        </ul>
                        <p style="color: #000;">Explore our website to learn more about our school's mission, values, and the opportunities we provide to our students.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- School Photo -->
                <div>
                    <img style="margin-bottom:20px; height: 280px;  box-shadow: -4px 4px 5px 0 #000;" src="https://media.istockphoto.com/id/1409722748/photo/students-raising-hands-while-teacher-asking-them-questions-in-classroom.jpg?s=612x612&w=0&k=20&c=NbVChOV9wIbQOhUD6BqpouZHHBbyQ2rkSjaVfIhpMv8=" class="card-img-top" alt="School Photo">
                    
                        <!-- Add more details as needed -->
                    <iframe width="440" height="280" src="https://www.youtube.com/embed/g6NmegdUK-I" title="Whole Brain Teaching 5 Step Lesson: Middle School Science" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection