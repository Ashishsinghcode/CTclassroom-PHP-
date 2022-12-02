<?php
include("config.php");
$query = "Update `answer_assignment` set `is_checked`='Yes' where `answer_assignment_id`='$_REQUEST[id]'";
$res = mysqli_query($conn,$query);
if($res>0)
{
    echo "<script>window.location.assign('answer_assignment.php?msg=Assignment Checked')</script>";
}
else{
    echo "<script>window.location.assign('answer_assignment.php?msg=Try Again')</script>";
}
?>