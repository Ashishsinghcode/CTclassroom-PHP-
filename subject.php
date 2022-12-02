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
                <h1 class="mb-2 bread">Subject</h1>
                <!-- <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Add Course </span></p> -->
            </div>
        </div>
    </div>
</section>
<section class="ftco-section contact-section">
    <div class="container">
        <div class="row d-flex contact-info">
            <div class="col-md-12">
                <a href="manage_subject.php" class="btn btn-primary float-right">Manage Subject</a>
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
                        <div class="col-md-4">
                                <label for="inputteachername" class="form-label">Course</label>

                                <select name="course" class="form-control" onchange="hit(this.value)" required>
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
                            <div class="col-md-4">
                                <label for="inputteachername" class="form-label">Department</label>

                                <select name="department" class="form-control" id="department" required>
                                    <option value="" selected disabled>Select Department</option>

                                    <?php
                        //   include("config.php");
                        //   $query = "SELECT * FROM `department` ";
                        //   $result = mysqli_query($conn,$query);
                        //   while($data = mysqli_fetch_array($result))
                        //   {
                        //     echo "<option value=$data[id]>".$data['department']."</option>";
                        //   }
                          ?>

                                </select>

                            </div>
                            <div class="col-md-4">
                                <label for="inputsemester" class="form-label">Semester</label>
                                <input type="number" class="form-control" name="semester" id="inputsemester"
                                    placeholder="" required>

                            </div>
                           
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputsubjectname" class="form-label">Subject Name</label>
                                <input type="text" class="form-control" name="subject_name" id="inputsubjectname"
                                    placeholder="" required>

                            </div>

                            <div class="col-md-6">
                                <label for="inputsubjectcode" class="form-label">Subject code</label>
                                <input type="text" class="form-control" name="subject_code" id="inputsubjectcode"
                                    placeholder="" required>

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
	$semester=$_REQUEST["semester"];
  $department=$_REQUEST["department"];
  $subject_name=$_REQUEST["subject_name"];
  $subject_code=$_REQUEST["subject_code"];
	
	// $confirm_password=$_REQUEST["password"];
	//connect with database
    include("config.php");
	//insert query
	$query="INSERT INTO `subject`(`course`, `semester`,`department`,`subject_name`,`subject_code`, `status`) VALUES ('$course','$semester','$department','$subject_name','$subject_code','Active')";
	//Execute
	$result=mysqli_query($conn,$query);
	if($result>0)
	{
   	echo"<script>window.location.assign('subject.php?msg=Record Inserted')</script>";
	}
	else{
   	echo"<script>window.location.assign('subject.php?msg=Try again')</script>";
	}
}
?>