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
$queryselect = "SELECT * FROM `teacher` where `id`='$_REQUEST[id]'";
$resultselect = mysqli_query($conn,$queryselect);
if($dataselect = mysqli_fetch_array($resultselect))
{
  $cou = $dataselect['course'];
  $dept = $dataselect['department'];
  $t_name = $dataselect['teacher_name'];
  $t_email = $dataselect['email'];
  $t_contact = $dataselect['contact'];
  $t_qualification = $dataselect['qualification'];
}
?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-2 bread">Edit Teacher</h1>
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
                        <input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputteachername" class="form-label">Course</label>
                                <select name="course" class="form-control" required>
                                    <option value="" selected disabled>Select Course</option>
                                    <?php
                            include("config.php");
                            $query = "SELECT * FROM `course`";
                            $result = mysqli_query($conn,$query);
                            while($data = mysqli_fetch_array($result))
                            {
                              if($data['id']==$cou)
                              {
                                echo "<option value='$data[id]' selected>".$data['course_name']."</option>";
                              }
                              else{
                                echo "<option value='$data[id]'>".$data['course_name']."</option>";
                              }
                            }
                            ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="inputteachername" class="form-label">Department</label>
                                <select name="department" class="form-control" required>
                                    <option value="" selected disabled>Select Department</option>
                                    <?php
                            include("config.php");
                            $query1 = "SELECT * FROM `department` ";
                            $result1 = mysqli_query($conn,$query1);
                            while($data1 = mysqli_fetch_array($result1))
                            {
                              if($data1['id']==$dept)
                              {
                                echo "<option value='$data1[id]' selected>".$data1['department']."</option>";
                              }
                              else
                              {
                                echo "<option value='$data1[id]'>".$data1['department']."</option>";
                              }
                            }
                            ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputteachername" class="form-label">Teacher name</label>
                                <input type="text" class="form-control" name="teacher_name" id="inputteachername"
                                    placeholder="" value="<?php echo $t_name; ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputqualification" class="form-label">qualification</label>
                                <input type="text" class="form-control" name="qualification" id="inputqualification"
                                    placeholder="" value="<?php echo $t_qualification; ?>" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputemail" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="inputemail" placeholder=""
                                    value="<?php echo $t_email; ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputcontact" class="form-label">Contact</label>
                                <input type="number" class="form-control" name="contact" id="inputcontact"
                                    placeholder="" value="<?php echo $t_contact; ?>" required>
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-primary my-2">submit</button>
                        </div>
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
  $teacher_name=$_REQUEST["teacher_name"];
  $email=$_REQUEST["email"];
  $contact=$_REQUEST["contact"];
  $qualification=$_REQUEST["qualification"];
	
	// $confirm_password=$_REQUEST["password"];
	//connect with database
    include("config.php");
	//insert query
  $query="Update`teacher` set `course`='$course',`teacher_name`='$teacher_name' ,`department`='$department' ,`email`='$email',`contact`='$contact',`qualification`='$qualification' where`id`='$id'";
	//Execute
	$result=mysqli_query($conn,$query);
	if($result>0)
	{
   	echo"<script>window.location.assign('manage_teacher.php?msg=Record updated')</script>";
	}
	else{
   	echo"<script>window.location.assign('manage_teacher.php?msg=Try again')</script>";
	}
}
?>