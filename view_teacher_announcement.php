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
            <h1 class="mb-2 bread">View Announcement</h1>
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
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date Time</th>
                    </tr>
                    <?php
                        $sno=1;
                        include("config.php");
                        $query = "SELECT * FROM `announcement`";
                        $result = mysqli_query($conn,$query);
                        while($data = mysqli_fetch_array($result))
                        {
                    ?>
                        <tr>
                            <td><?php echo $sno; ?></td>
                            <td><?php echo $data['title']; ?></td>
                            <td><?php echo $data['description']; ?></td>
                            <td>
                              <?php 
                                $d = (explode(" ",$data['created_at']));
                                echo $d[0]."&nbsp;"; 
                                // echo $d[1];
                                $d1 = explode(".",$d[1]);
                                echo ($d1[0]) ."&nbsp";

                                $time = (explode(":",$d1[0]));
                                if($time[0]>12){
                                  echo "pm";
                                }
                                else{
                                  echo "am";
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