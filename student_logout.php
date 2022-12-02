<?php
session_start();
unset($_SESSION['student_email']);
// echo"<script>window.location.assign('student_login.php?msg=logout successfully')</script>";
echo"<script>window.location.assign('index.php?msg=logout successfully')</script>";
?>