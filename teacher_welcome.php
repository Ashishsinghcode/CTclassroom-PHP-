<?php
include("header.php");
?>
<?php
if(isset($_SESSION['teacher_email']))
{
     //store session
     $teacher_email=$_SESSION['teacher_email'];
}
else{
    //url direction

    echo"<script>alert('please login first')</script>";
    echo"<script>window.location.assign('teacher_login.php?msg=please login first to proceed')</script>";

}
?>

<h1>Hello</h1>
<a class="btn btn-danger" href="teacher_logout.php">Logout</a>
   
<?php
include("footer.php");
?>

