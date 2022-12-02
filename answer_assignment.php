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
                <h1 class="mb-2 bread">View Answers</h1>
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
                    <table class="table table-striped">
                        <tr>
                            <th>#</th>
                            <th>Assignment</th>
                            <th>Student</th>
                            <th>Answer</th>
                            <th>Check</th>
                        </tr>
                        <?php
                        $sno=1;
                        include("config.php");
                        $query = "SELECT `answer_assignment`.*,`assignment`.`title` FROM `answer_assignment` inner join `assignment` on `assignment`.`assignment_id`=`answer_assignment`.`assignment_id`";
                        $result = mysqli_query($conn,$query);
                        while($data = mysqli_fetch_array($result))
                        {
                    ?>
                        <tr>
                            <td><?php echo $sno; ?></td>
                            <td><?php echo $data['title']; ?></td>
                            <td><?php echo $data['student_email']; ?></td>
                            <td>
                                <a href="upload_answers/<?php echo $data['answer_sheet']; ?>" target="_blank">
                                    <i class="fa fa-eye text-dark fa-2x"></i>
                                </a>
                            </td>
                            <td>
                                <?php
                                    if($data['is_checked'] == 'No')
                                    {
                                ?>
                                  <a href="check_assignment.php?id=<?php echo $data['answer_assignment_id']; ?>"><i class="fa fa-check text-success"></i></a>
                                <?php
                                    }
                                    else{
                                        echo "Already Checked";
                                    }
                                ?>
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