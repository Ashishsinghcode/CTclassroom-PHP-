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
                <h1 class="mb-2 bread">Manage Teacher</h1>
                <!-- <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Add Course </span></p> -->
            </div>
        </div>
    </div>
</section>
<section class="ftco-section contact-section">
    <div class="container">
        <div class="row d-flex contact-info">
            <div class="col-md-12">
                <a href="teacher.php" class="btn btn-primary float-right">Add Teacher</a>
            </div>
            <div class="col-md-12 d-flex table-responsive">
                <div class="bg-light align-self-stretch box p-4 text-center">
                    <?php
              if(isset($_REQUEST["msg"]))
              {
                echo "<div class='alert alert-info'>".$_REQUEST["msg"]."</div>";
              }
              ?>
                    <table class="table table-striped">
                        <tr>
                            <th>#</th>
                            <th>Course Name</th>
                            <th>Department</th>
                            <th>Teacher name</th>
                            <th>email</th>
                            <th>contact</th>
                            <th>Qualification</th>
                            <th>edit</th>
                            <th>Delete</th>
                        </tr>
                        <?php
                        $sno=1;
                        include("config.php");
                        $query = "SELECT `teacher`.*,`course`.`course_name`,`department`.`department` as department_name FROM `teacher` inner join `course` on `teacher`.`course` = `course`.`id` inner join `department` on `teacher`.`department` = `department`.`id`";
                        $result = mysqli_query($conn,$query);
                        while($data = mysqli_fetch_array($result))
                        {
                    ?>
                        <tr>
                            <td><?php echo $sno; ?></td>
                            <td><?php echo $data['course_name']; ?></td>
                            <td><?php echo $data['department_name']; ?></td>
                            <td><?php echo $data['teacher_name']; ?></td>
                            <td><?php echo $data['email']; ?></td>
                            <td><?php echo $data['contact']; ?></td>
                            <td><?php echo $data['qualification']; ?></td>
                            <td>
                                <a href="edit_teacher.php?id=<?php echo $data['id'];?>">
                                    <i class="fa fa-edit text-success fa-2x"></i>
                            </td>
                            <td>
                                <a href="delete_teacher.php?id=<?php echo $data['id'];?>">
                                    <i class="fa fa-trash text-danger fa-2x"></i>
                            </td>
                        </tr>
                        <?php
                    $sno++;
                        }
                    ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include("footer.php");
?>