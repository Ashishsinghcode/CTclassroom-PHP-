<?php
	include_once("header2.php");
?>
<div class="row">
    <div class="col-md-3 mx-auto my-3">
        <div class="card" style="width: 18rem;">
            <a href="login.php">
				<img class="card-img-top" src="./images/admin.png" alt="Card image cap" height="200px">
			</a>
            <div class="card-body">
				<a href="login.php">
					<h5 class="card-title">Admin Login</h5>
				</a>
            </div>
        </div>
    </div>
    <div class="col-md-3 mx-auto my-3">
        <div class="card" style="width: 18rem;">
            <a href="teacher_login.php">
				<img class="card-img-top" src="./images/faculty.png" alt="Card image cap">
			</a>
            <div class="card-body">
				<a href="teacher_login.php">
					<h5 class="card-title">Faculty Login</h5>
				</a>
            </div>
        </div>
    </div>
    <div class="col-md-3 mx-auto my-3">
        <div class="card" style="width: 18rem;">
			<a href="student_login.php">
            	<img class="card-img-top" src="./images/student.png" alt="Card image cap" height="200px">
			</a>
            <div class="card-body">
				<a href="student_login.php">
					<h5 class="card-title">Student Login</h5>
				</a>
            </div>
        </div>
    </div>
</div>
<?php
	include_once("footer.php");
?>