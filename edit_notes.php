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
$id = $_REQUEST["id"];
include("config.php");
$q = "select * from `notes` where `id`='$id'";
$res = mysqli_query($conn,$q);
if($d = mysqli_fetch_array($res)){
    $notes_title = $d['title'];
    $notes_material = $d['notes'];
    $notes_description = $d['description'];
}
?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-2 bread">NOTES</h1>
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

                    <form action="#" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $id; ?>" >
                        <div class="row">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6">
                                <label for="inputtitle" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="inputtitle" placeholder=""
                                    value="<?php echo $notes_title; ?>" required>

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
                                    rows="10" required><?php echo $notes_description; ?></textarea>

                            </div>

                            <div class="col-md-3">
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6">
                                <label for="inputnotes" class="form-label">Notes</label>
                                <input type="file" class="form-control" name="notes" id="inputnotes" placeholder="" required>
                                <!-- only for file uploading start -->
                                <input type="hidden" name="hidden_image" value="<?php echo $notes_material; ?>" required>
                                <!-- only for file uploading End -->
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
    $id=$_REQUEST['id'];
    $title = $_REQUEST["title"];
    $description = $_REQUEST["description"];
    
    if($_FILES["notes"]["name"]){
        $file_name = $_FILES["notes"]["name"];
        $file_tmp_path = $_FILES["notes"]["tmp_name"];
        $file_type = $_FILES["notes"]["type"];
        $file_sizes = $_FILES["notes"]["size"];
    
       echo $new_notes = rand().$file_name;
        move_uploaded_file($file_tmp_path,'notes/'.$new_notes);
    }
    else{
        $new_notes = $_REQUEST["hidden_image"];
    }
	
	// $confirm_password=$_REQUEST["password"];
	//connect with database
  
   include("config.php");
	//insert query
   $query="Update`notes` set `title`='$title',`description`='$description',`notes`='$new_notes' where`id`='$id'";
  
	//Execute
	$result=mysqli_query($conn,$query);
    if($result>0)
    {
        
        echo "<script>window.location.assign('manage_notes.php?msg=Record updated')</script>";
    }
    else{
        echo mysqli_error($conn);
         echo "<script>window.location.assign('manage_notes.php?msg=Try again')</script>";
    }
}

?>