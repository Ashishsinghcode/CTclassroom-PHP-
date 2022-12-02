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
                <h1 class="mb-2 bread">Assign Teacher</h1>
                <!-- <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Add Course </span></p> -->
            </div>
        </div>
    </div>
</section>
<section class="ftco-section contact-section">
    <div class="container">
        <div class="row d-flex contact-info">
            <div class="col-md-12">
                <a href="manage_assign_teacher.php" class="btn btn-primary float-right">Manage Assign Teacher</a>
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
                                <label for="inputsubject" class="form-label">Subject</label>

                                <select name="subject" class="form-control" required>
                                    <option value="" selected disabled>Select subject</option>

                                    <?php
                            include("config.php");
                            $query1 = "SELECT * FROM `subject`";
                            $result1 = mysqli_query($conn,$query1);
                            while($data1 = mysqli_fetch_array($result1))
                            {
                                echo "<option value='$data1[id]'>".$data1['subject_name']."</option>";
                            }
                            ?>

                                </select>

                            </div>
                            <div class="col-md-6">
                                <label for="inputcourse" class="form-label">Course</label>

                                <select name="course" class="form-control" onchange="hit(this.value)" required>
                                    <option value="" selected disabled>Select Course</option>

                                    <?php
                            include("config.php");
                            $query2 = "SELECT * FROM `course`";
                            $result2 = mysqli_query($conn,$query2);
                            while($data2 = mysqli_fetch_array($result2))
                            {
                                echo "<option value='$data2[id]'>".$data2['course_name']."</option>";
                            }
                            ?>

                                </select>

                            </div>



                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <label for="inputteachername" class="form-label">Department</label>

                                <select name="department" class="form-control" id="department" required>
                                    <option value="" selected disabled>Select Department</option>

                                    <?php
                        //   include("config.php");
                        //   $query3 = "SELECT * FROM `department`";
                        //   $result3 = mysqli_query($conn,$query3);
                        //   while($data3 = mysqli_fetch_array($result3))
                        //   {
                        //     echo "<option value='$data3[id]'>".$data3['department']."</option>";
                        //   }
                          ?>

                                </select>

                            </div>

                            <div class="col-md-6">
                                <label for="inputteacher" class="form-label">Teacher</label>

                                <select name="teacher" class="form-control" required>
                                    <option value="" selected disabled>Select Teacher</option>

                                    <?php
                          include("config.php");
                          $query4 = "SELECT * FROM `teacher`";
                          $result4 = mysqli_query($conn,$query4);
                          while($data4 = mysqli_fetch_array($result4))
                          {
                            echo "<option value='$data4[id]'>".$data4['teacher_name']."</option>";
                          }
                          ?>

                                </select>

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



<script>
    function hit(value){
        // alert(value);
        
        var obj;
        var url="dept_ajax.php?course="+value;
        // alert(url);
        if(window.XMLHttpRequest)
        {
            obj=new XMLHttpRequest();
        }
        else
        {
            obj= new ActiveXObject("Microsoft.XMLHTTP");
        }
        obj.open("GET",url,true);
        obj.send();
        obj.onreadystatechange=function()
        {
            if(obj.readyState == 4 && obj.status==200)
            {
                var res=obj.responseText;
                // alert(res);
                document.getElementById("department").innerHTML=res;
            }
        }
    }
</script>

<?php
include("footer.php");
?>

<?php
if(isset($_REQUEST["submit"]))
{
	$course=$_REQUEST["course"];
	$subject=$_REQUEST["subject"];
  $department=$_REQUEST["department"];
  $teacher=$_REQUEST["teacher"];
 
	
	// $confirm_password=$_REQUEST["password"];
	//connect with database
    include("config.php");
	//insert query
	$query="INSERT INTO `assign_teacher`(`course`, `subject`,`department`,`teacher`, `status`) VALUES ('$course','$subject','$department','$teacher','Active')";
	//Execute
	$result=mysqli_query($conn,$query);
	if($result>0)
	{
   	echo"<script>window.location.assign('assign_teacher.php?msg=Record Inserted')</script>";
	}
	else{
   	echo"<script>window.location.assign('assign_teacher.php?msg=Try again')</script>";
	}
}
?>