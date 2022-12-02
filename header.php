<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>CT Classroom</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
	  <div class="bg-top navbar-light">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-center align-items-stretch">
    			<div class="col-md-4 d-flex align-items-center py-4">
    				<a class="navbar-brand" href="index.php">CT <span>University</span></a>
    			</div>
	    		<div class="col-lg-8 d-block">
		    		<div class="row d-flex">
					    <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
					    	<div class="icon d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
					    	<div class="text">
					    		<span>Email</span>
						    	<span>youremail@email.com</span>
						    </div>
					    </div>
					    <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
					    	<div class="icon d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <div class="text">
						    	<span>Call</span>
						    	<span>Call Us: + 1235 2355 98</span>
						    </div>
					    </div>
					  </div>
			    </div>
		    </div>
		  </div>
    </div>
	  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container d-flex align-items-center px-4">
			
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav mr-auto">
            <?php
              if(isset($_SESSION["email"]))
              {
            ?>
              <li class="nav-item"><a href="add_course.php" class="nav-link">Course</a></li>
              <li class="nav-item"><a href="department.php" class="nav-link">Department</a></li>
              <li class="nav-item"><a href="teacher.php" class="nav-link">Teacher</a></li>
              <li class="nav-item"><a href="student.php" class="nav-link">Student</a></li>
              <li class="nav-item"><a href="announcement.php" class="nav-link">Announcement</a></li>
              <li class="nav-item"><a href="subject.php" class="nav-link">Subject</a></li>
              <li class="nav-item"><a href="assign_teacher.php" class="nav-link">Assign Teacher</a></li>
              <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
            <?php
              }
              else if(isset($_SESSION["teacher_email"]))
              {
            ?>
              <li class="nav-item"><a href="notes.php" class="nav-link">Notes</a></li>
              <li class="nav-item"><a href="assignment.php" class="nav-link">Assignment</a></li>
              <li class="nav-item"><a href="answer_assignment.php" class="nav-link">Assignment Answers</a></li>
              <li class="nav-item"><a href="view_teacher_announcement.php" class="nav-link">View Announcement</a></li>
              <li class="nav-item"><a href="teacher_logout.php" class="nav-link">Logout</a></li>
            <?php
              }
              else if(isset($_SESSION["student_email"]))
              {
            ?>
              <li class="nav-item"><a href="view_notes.php" class="nav-link">View Notes</a></li>
              <li class="nav-item"><a href="view_assignment.php" class="nav-link">View Assignment</a></li>
              <li class="nav-item"><a href="student_logout.php" class="nav-link">Logout</a></li>
            <?php
              }
              else{
            ?>
              <li class="nav-item"><a href="login.php" class="nav-link">Admin Login</a></li>
              <li class="nav-item"><a href="teacher_login.php" class="nav-link">Teacher Login</a></li>
              <li class="nav-item"><a href="student_login.php" class="nav-link">Student Login</a></li>
            <?php  
              }
            ?>	          
	        </ul>
          
            <?php
              if(isset($_SESSION["email"]))
              {
                echo "<button type='button' class='btn btn-warning'>".$_SESSION["email"]."</button>";
              }
              else if(isset($_SESSION["teacher_email"]))
              {
                echo "<button type='button' class='btn btn-warning'>".$_SESSION["teacher_email"]."</button>";
              }
              else if(isset($_SESSION["student_email"]))
              {
                echo "<button type='button' class='btn btn-warning'>".$_SESSION["student_email"]."</button>";
              }
              else{
                
              }
            ?>
          
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image:url(images/bg_1.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-6 ftco-animate">
            <h1 class="mb-4">Education Needs Complete Solution</h1>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            <p><a href="#" class="btn btn-primary px-4 py-3 mt-3">Contact Us</a></p>
          </div>
        </div>
        </div>
      </div>

      <div class="slider-item" style="background-image:url(images/bg_2.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-6 ftco-animate">
            <h1 class="mb-4">University, College School Education</h1>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            <p><a href="#" class="btn btn-primary px-4 py-3 mt-3">Contact Us</a></p>
          </div>
        </div>
        </div>
      </div>
    </section>
