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
$query = "SELECT * FROM `department` where `id`='$_REQUEST[id]'";
$result = mysqli_query($conn,$query);
if($data = mysqli_fetch_array($result))
{
  $cou = $data['course'];
  $dept = $data['department'];
}
?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-2 bread">Edit Department</h1>
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
                      <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>" >
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Choose Course</label>
                                <select name="course" class="form-control">
                                    <option value="" selected disabled>Select Course</option>
                                    <?php
                                      include("config.php");
                                      $query1 = "SELECT * FROM `course`";
                                      $result1 = mysqli_query($conn,$query1);
                                      while($data1 = mysqli_fetch_array($result1))
                                      {
                                        if($data1['id']==$cou)
                                        {
                                          echo "<option value='$data1[id]' selected>".$data1['course_name']."</option>";
                                        }
                                        else{
                                          echo "<option value='$data1[id]'>".$data1['course_name']."</option>";
                                        }
                                      }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="inputsemester" class="form-label">Department name</label>
                                <input type="text" class="form-control" name="department" id="inputsemester" placeholder="department name" value="<?php echo $dept; ?>" required>

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
	$course=$_REQUEST["course"];
	$department=$_REQUEST["department"];
	
	// $confirm_password=$_REQUEST["password"];
	//connect with database
    include("config.php");
	//insert query
	$query="Update`department` set `course`='$course',`department`='$department' where`id`='$id'";
	//Execute
	$result=mysqli_query($conn,$query);
	if($result>0)
	{
   	echo"<script>window.location.assign('manage_department.php?msg=Record Inserted')</script>";
	}
	else{
   	echo"<script>window.location.assign('manage_department.php?msg=Try again')</script>";
	}
}
?>