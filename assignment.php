<?php
include("header2.php");
if(isset($_SESSION['teacher_email']))
{
     //store session
     $teacher_email=$_SESSION['teacher_email'];
}
else{
    //url direction
    echo"<script>window.location.assign('teacher_login.php?msg=please login first to proceed')</script>";
}
?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-2 bread">Assignment</h1>
                <!-- <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Add Course </span></p> -->
            </div>
        </div>
    </div>
</section>
<section class="ftco-section contact-section">
    <div class="container">
        <div class="row d-flex contact-info">
            <div class="col-md-12">
                <a href="manage_assignment.php" class="btn btn-primary float-right">Manage Assignment</a>
            </div>
            <div class="col-md-12 d-flex">
                <div class="bg-light align-self-stretch box p-4 text-center">
                    <?php
              if(isset($_REQUEST["msg"]))
              {
                echo "<div class='alert alert-info'>".$_REQUEST["msg"]."</div>";
              }
              ?>

                    <form action="#" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6">
                                <label for="inputtitle" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="inputtitle" placeholder="" required> 

                            </div>

                            <div class="col-md-3">
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6">
                                <label for="inputdescription" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="inputdescription" placeholder=""
                                    rows="10" required></textarea>

                            </div>

                            <div class="col-md-3">
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6">
                                <label for="inputassignment" class="form-label">Assignment</label>
                                <input type="file" class="form-control" name="assignment" id="inputassignment"
                                    placeholder="" required>

                            </div>

                            <div class="col-md-3">
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
   
    $title = $_REQUEST["title"];
    $description = $_REQUEST["description"];
    $file_name = $_FILES["assignment"]["name"];
    $file_tmp_path = $_FILES["assignment"]["tmp_name"];
    $file_type = $_FILES["assignment"]["type"];
    $file_sizes = $_FILES["assignment"]["size"];

    $new_name = rand().$file_name;
	
	// $confirm_password=$_REQUEST["password"];
	//connect with database
    include("config.php");
	//insert query
	$query="INSERT INTO `assignment`(`title`, `description`, `assignment`,`status`) VALUES ('$title','$description','$new_name','Active')";
	//Execute
	$result=mysqli_query($conn,$query);
    if($result>0)
    {
        move_uploaded_file($file_tmp_path,'assignment/'.$new_name);
        echo "<script>window.location.assign('assignment.php?msg=Record Inserted')</script>";
    }
    else{
        echo mysqli_error($conn);
        // echo "<script>window.location.assign('notes.php?msg=Try again')</script>";
    }
}

?>