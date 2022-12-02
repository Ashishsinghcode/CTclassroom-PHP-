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
$queryselect = "SELECT * FROM `subject` where id='$_REQUEST[id]'";
$resultselect = mysqli_query($conn,$queryselect);
if($dataselect = mysqli_fetch_array($resultselect))
{
  $cou = $dataselect['course'];
  $dept = $dataselect['department'];
  $s_sem = $dataselect['semester'];
  $s_subject = $dataselect['subject_name'];
  $s_sub_code = $dataselect['subject_code'];
}
?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-2 bread">TEACHER</h1>
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
                            <div class="col-md-4">
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
                            <div class="col-md-4">
                                <label for="inputteachername" class="form-label">Department</label>

                                <select name="department" class="form-control" required>
                                    <option value="" selected disabled>Select Department</option>

                                    <?php
                                    include("config.php");
                                    $query1 = "SELECT * FROM `department`";
                                    $result1 = mysqli_query($conn,$query1);
                                    while($data1 = mysqli_fetch_array($result1))
                                    {
                                      if($data1['id']==$dept)
                                      {
                                        echo "<option value='$data1[id]' selected>".$data1['department']."</option>";
                                      }
                                      else{
                                        echo "<option value='$data1[id]'>".$data1['department']."</option>";
                                      }
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="inputsemester" class="form-label">Semester</label>
                                <input type="number" class="form-control" name="semester" id="inputsemester" placeholder="" value="<?php echo $s_sem; ?>" required>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputsubjectname" class="form-label">Subject Name</label>
                                <input type="text" class="form-control" name="subject_name" id="inputsubjectname" placeholder="" value="<?php echo $s_subject; ?>" required>
                            </div>

                            <div class="col-md-6">
                                <label for="inputsubjectcode" class="form-label">Subject code</label>
                                <input type="text" class="form-control" name="subject_code" id="inputsubjectcode" placeholder="" value="<?php echo $s_sub_code; ?>" required>
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
	$semester=$_REQUEST["semester"];
  $department=$_REQUEST["department"];
  $subject_name=$_REQUEST["subject_name"];
  $subject_code=$_REQUEST["subject_code"];
	
	// $confirm_password=$_REQUEST["password"];
	//connect with database
    include("config.php");
	//insert query
    $query="Update`subject` set `course`='$course',`subject_name`='$subject_name' ,`subject_code`='$subject_code',`department`='$department' ,`semester`='$semester' where`id`='$id'";
	//Execute
	$result=mysqli_query($conn,$query);
	if($result>0)
	{
   	echo"<script>window.location.assign('manage_subject.php?msg=Record updated')</script>";
	}
	else{
   	echo"<script>window.location.assign('manage_subject.php?msg=Try again')</script>";
	}
}
?>