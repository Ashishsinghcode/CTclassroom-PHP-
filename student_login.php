<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Service login form Responsive Widget Template : W3Layouts</title>

    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Google fonts -->
    <link href="//fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- CSS Stylesheet -->
    <link rel="stylesheet" href="css/stylelogin.css" type="text/css" media="all" />

</head>

<body>
    <div class="signinform">
        <h1> Student Login</h1>
        <!-- container -->
        <div class="container">
            <!-- main content -->
            <div class="w3l-form-info">
                <div class="w3_info">
                    <h2>Login</h2>
                    <form method="post" autocomplete="off">
                        <div class="input-group">
                            <span><i class="fas fa-user" aria-hidden="true"></i></span>
                            <input type="email" name="email" placeholder="Email" required="">
                        </div>
                        <div class="input-group">
                            <span><i class="fas fa-key" aria-hidden="true"></i></span>
                            <input type="Password" name="password" placeholder="Password" required="">
                        </div>
                        <!-- <div class="form-row bottom">
                            <div class="form-check">
                                <input type="checkbox" id="remenber" name="remenber" value="remenber">
                                <label for="remenber"> Remember me?</label>
                            </div>
                                <a href="#url" class="forgot">Forgot password?</a>
                        </div> -->
                        <button class="btn btn-primary btn-block" name="submit" type="submit">Login</button>
                    </form>
                    <!-- <p class="continue"><span>or Login with</span></p>
                    <div class="social-login">
                        <a href="#facebook">
                            <div class="facebook">
                                <span class="fab fa-facebook-f" aria-hidden="true"></span>

                            </div>
                        </a>
                        <a href="#twitter">
                            <div class="twitter">
                                <span class="fab fa-twitter" aria-hidden="true"></span>
                            </div>
                        </a>
                        <a href="#google">
                            <div class="google">
                                <span class="fab fa-google" aria-hidden="true"></span>
                            </div>
                        </a>
                    </div> -->
                    <!-- <p class="account">Don't have an account? <a href="#signup">Sign up</a></p> -->
                </div>
            </div>
            <!-- //main content -->
        </div>
        <!-- //container -->
        <!-- footer -->
      
        <!-- footer -->
    </div>

    <!-- fontawesome v5-->
    <script src="js/fontawesome.js"></script>
<?php
 if(isset($_REQUEST['submit']))
 {
    $student_email=$_REQUEST['email'];
    $password=MD5($_REQUEST['password']);
   // if($email=="varsha@gmail.com" && $password=="123456")
   //connection
   include("config.php");
   $query="select * from `student` where email='$student_email' and password='$password'";
   $result=mysqli_query($conn,$query);
   if($data=mysqli_fetch_array($result))
    {    
        //session create
        $_SESSION["student_email"]=$student_email;
        echo '<script> alert("Login successful")</script>';
        echo '<script>window.location.assign("view_notes.php")</script>';
    }
    else{
        echo '<script>alert("Invalid credential")</script>';
    }
 }
?>

</body>

</html>