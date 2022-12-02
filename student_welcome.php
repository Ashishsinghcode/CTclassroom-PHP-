<?php
include("header.php");
?>
<?php
if(isset($_SESSION['student_email']))
{
     //store session
     $student_email=$_SESSION['student_email'];
}
else{
    //url direction

    echo"<script>alert('please login first')</script>";
    echo"<script>window.location.assign('student_login.php?msg=please login first to proceed')</script>";

}
?>

<h1>Hello</h1>
<a class="btn btn-danger" href="student_logout.php">Logout</a>
   
<?php
include("footer.php");
?>

