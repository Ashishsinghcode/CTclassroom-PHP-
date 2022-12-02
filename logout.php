<?php
session_start();
unset($_SESSION['email']);
// echo"<script>window.location.assign('login.php?msg=logout successfully')</script>";
echo"<script>window.location.assign('index.php?msg=logout successfully')</script>";
?>