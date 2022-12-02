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

include("config.php");
$query = "SELECT * FROM `course` where `id`='$_REQUEST[id]'";
$result = mysqli_query($conn,$query);
if($data = mysqli_fetch_array($result))
{
  $c_name = $data['course_name'];
  $c_sem = $data['semester'];
}
?>
  <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Edit course</h1>
            <!-- <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Add Course </span></p> -->
          </div>
        </div>
      </div>
    </section>
    <section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex contact-info">
          <div class="col-md-12 d-flex">
          	<div class="bg-light align-self-stretch box p-4 text-center">
              <?php
              if(isset($_REQUEST["msg"]))
              {
                echo "<div class='alert alert-info'>".$_REQUEST["msg"]."</div>";
              }
              ?>
            <form method="post" autocomplete="off">
              <input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>" >
              <div class="row">
                <div class="col-md-6">
                  <label for="inputcourse_name" class="form-label">Course Name</label>
                  <input type="text" class="form-control" name="course_name" id="inputcourse_name" placeholder="Course Name" value="<?php echo $c_name; ?>" required>
                </div>
                  
                <div class="col-md-6">
                  <label for="inputsemester" class="form-label">Semester</label>
                  <input type="number" class="form-control" name="semester" id="inputsemester" placeholder="Semester" value="<?php echo $c_sem; ?>" required>
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
  $id=$_REQUEST['id'];
	$course_name=$_REQUEST["course_name"];
	$semester=$_REQUEST["semester"];
	
	// $confirm_password=$_REQUEST["password"];
	//connect with database
    include("config.php");
	//insert query
    $query = "update `course` set `course_name`='$course_name', `semester`='$semester' where `id`='$id'";

    //Execute 
    $result = mysqli_query($conn,$query);

    if($result>0)
    {
      echo "<script>window.location.assign('manage_course.php?msg=Record Updated')</script>";
    }
    else{
      echo mysqli_error($conn);
      echo "<script>window.location.assign('manage_course.php?msg=Try again')</script>";
    }
}

?>
