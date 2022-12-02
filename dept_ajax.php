<?php
  include("config.php");
  $query = "SELECT * FROM `department` where course='$_REQUEST[course]'";
  $result = mysqli_query($conn,$query);
  
  while($data = mysqli_fetch_array($result))
  {
    echo "<option value=$data[id]>".$data['department']."</option>";
  }
?>