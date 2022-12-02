<?php
if(isset($_REQUEST['id']))
{ 
    $id=$_REQUEST['id'];
    include("config.php");
    $query="DELETE FROM `department` where `id`='$id' ";
    $result=mysqli_query($conn,$query);
    if($result>0)
    {
        echo"<script>window.location.assign('manage_department.php?msg=Record Deleted')</script>";

    }
    else{
        echo"<script>window.location.assign('manage_department.php?msg=Try Again')</script>";
    }
}
else{
    echo"<script>window.location.assign('manage_department.php')</script>";

}
?>