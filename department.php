<?php
include("header2.php");
if(isset($_SESSION['email']))
{
     //store session
     $email=$_SESSION['email'];
}
else{
    //url direction
    echo"<script>window.location.assign('login.php?msg=please login first to proceed')</script>";
}
?>
  <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Add Department</h1>
            <!-- <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Add Course </span></p> -->
          </div>
        </div>
      </div>
    </section>
    <section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex contact-info">
          <div class="col-md-12">
            <a href="manage_department.php" class="btn btn-primary float-right">Manage Department</a>
          </div>
          <div class="col-md-12 d-flex">
          	<div class="bg-light align-self-stretch box p-4 text-center">
              <?php
              if(isset($_REQUEST["msg"]))
              {
                echo "<div class='alert alert-info'>".$_REQUEST["msg"]."</div>";
              }
              ?>
            <form method="post" autocomplete="off">
              <div class="row">
                <div class="col-md-6">
                <label for="">Choose Course</label>
                    <select name="course" class="form-control" required>
                        <option value="" selected disabled>Select Course</option>
                        
                          <?php
                          include("config.php");
                          $query = "SELECT * FROM `course`";
                          $result = mysqli_query($conn,$query);
                          while($data = mysqli_fetch_array($result))
                          {
                            echo "<option value=$data[id]>".$data['course_name']."</option>";
                          }
                          ?>
                        
                    </select>
                </div>
                  
                <div class="col-md-6">
                  <label for="inputsemester" class="form-label">Department name</label>
                  <input type="text" class="form-control" name="department_name" id="inputsemester" placeholder="department name" required>

                </div>

              </div>
              <div class="col-12">
                <button type="submit" name="submit" class="btn btn-primary my-2">submit</button>
              </div>
            </form>
	          </div>
          </div>
        </div>
      </div>
    </section>
		
<?php
include("footer.php");
?>

<?php
if(isset($_REQUEST["submit"]))
{
	$course_name=$_REQUEST["course"];
	$department=$_REQUEST["department_name"];
	
	// $confirm_password=$_REQUEST["password"];
	//connect with database
    include("config.php");
	//insert query
	$query="INSERT INTO `department`(`course`, `department`, `status`) VALUES ('$course_name','$department','Active')";
	//Execute
	$result=mysqli_query($conn,$query);
	if($result>0)
	{
   	echo"<script>window.location.assign('department.php?msg=Record Inserted')</script>";
	}
	else{
   	echo"<script>window.location.assign('department.php?msg=Try again')</script>";
	}
}
?>
