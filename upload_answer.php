<?php
include("header2.php");
if(isset($_SESSION['student_email']))
{
     //store session
     $student_email=$_SESSION['student_email'];
}
else{
    //url direction
    echo"<script>window.location.assign('student_login.php?msg=please login first to proceed')</script>";
}
?>
  <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Upload Answer</h1>
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
            <form method="post" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $_REQUEST['id']; ?>" name="assignment">
              <div class="row">
                <div class="col-md-12">
                  <label for="inputcourse_name" class="form-label">Upload Answer</label>
                  <input type="file" class="form-control" name="answer_sheet" id="inputcourse_name" required>
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
    $assignment = $_REQUEST["assignment"];
    $file_name = $_FILES["answer_sheet"]["name"];
    $file_size = $_FILES["answer_sheet"]["size"];
    $file_type = $_FILES["answer_sheet"]["type"];
    $file_tmp_name = $_FILES["answer_sheet"]["tmp_name"];

    $new_name = rand().$file_name;

    //connect with database
    include("config.php");
	//insert query
	$query="INSERT INTO `answer_assignment`(`assignment`, `student_email`, `answer_sheet`, `is_checked`,`is_uploaded`, `status`) VALUES ('$assignment','$_SESSION[student_email]','$new_name','No','Yes','Active')";
	//Execute
	$result=mysqli_query($conn,$query);
	if($result>0)
	{
    move_uploaded_file($file_tmp_name,'upload_answers/'.$new_name);
   	echo"<script>window.location.assign('view_assignment.php?msg=Answer Uploaded')</script>";
	}
	else{
   	echo"<script>window.location.assign('view_assignment.php?msg=Try again')</script>";
	}
}
?>


