<?php
session_start();
unset($_SESSION['teacher_email']);
// echo"<script>window.location.assign('teacher_login.php?msg=logout successfully')</script>";
echo"<script>window.location.assign('index.php?msg=logout successfully')</script>";
?>