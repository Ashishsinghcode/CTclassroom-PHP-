
<?php
include("header.php");
?>
<?php
if(isset($_SESSION['email']))
{
     //store session
     $email=$_SESSION['email'];
}
else{
    //url direction

    echo"<script>alert('please login first')</script>";
    echo"<script>window.location.assign('login.php?msg=please login first to proceed')</script>";

}
?>

<h1>Hello</h1>
<a class="btn btn-danger" href="logout.php">Logout</a>
   
<?php
include("footer.php");
?>

Ashish