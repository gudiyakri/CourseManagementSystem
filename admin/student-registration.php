<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:admin.php');
}
else{

if(isset($_POST['submit']))
{
$studentname=$_POST['studentname'];
$studentregno=$_POST['studentregno'];
$password=md5($_POST['password']);
$pincode = rand(100000,999999);
$query=mysqli_query($con,"insert into students(studentName,StudentRegno,password,pincode) values('$studentname','$studentregno','$password','$pincode')");
if($query)
{
$_SESSION['msg']="Student Registered Successfully !!";
}
else
{
  $_SESSION['msg']="Error : Student  not Register";
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin | Student Registration</title>
    <link href="assets/css/registration.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
</head>
<body>
<input type="checkbox" id="check">
    <!--header part start-->
    <header>
      <label for="check">
	  <i class="fas fa-bars" id="sidemenu_btn"></i>
      </label>
      <div class="leftside">
	  <i class="fas fa-users-cog" class="i"></i>
        <h3>Admin <span>Dashboard</span></h3>
      </div>
      <div class="rightside">
        <a href="logout.php" class="logout">Logout</a>
      </div>
    </header>
    <!--header part end-->
	 <!--no effect on window size-->
	<div class="nav">
      <div class="nav_bar">
        <i class="fa fa-bars nav_btn"></i>
      </div>
	  <div class="nav_element">
       <a href="session.php"><span>SESSION</span></a>
        <a href="semester.php"><span>SEMESTER</span></a>
        <a href="department.php"><span>DEPARTMENT</span></a>
        <a href="course.php"><span>COURSE</span></a>
		<a href="level.php"><span>LEVEL</span></a>
        <a href="student-registration.php"><span>REGISTRATION</span></a>
        <a href="manage-students.php"><span>MANAGE STUDENTS</span></a>
		<a href="enroll-history.php"><span>ENROLL HISTORY</span></a>
		<a href="user-log.php"><span>STUDENT LOGS</span></a>
      </div>
    </div>
    <!--sidemenu start-->
    <div class="sidemenu">
      <a href="session.php"><span>SESSION</span></a>
        <a href="semester.php"><span>SEMESTER</span></a>
        <a href="department.php"><span>DEPARTMENT</span></a>
        <a href="course.php"><span>COURSE</span></a>
		<a href="level.php"><span>LEVEL</span></a>
        <a href="student-registration.php"><span>REGISTRATION</span></a>
        <a href="manage-students.php"><span>MANAGE STUDENTS</span></a>
		<a href="enroll-history.php"><span>ENROLL HISTORY</span></a>
		<a href="user-log.php"><span>STUDENT LOGS</span></a>
    </div>
    <!--sidemenu end-->
    <div class="content">
                    <div class="student_registration">
                        <h1 class="page-head-line">Student Registration</h1>
                    </div>
					<fieldset>
                  <div class="textdisplay"></div>
                        <div class="panel-heading">
                          Student Registration
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>


                        <div class="form-body">
                       <form name="dept" method="post">
   <div class="form-group">
   <br><br>
    <label for="studentname">Student Name  </label><br><br>
    <input type="text" class="form-control" id="studentname" name="studentname" placeholder="Student Name" required />
  </div>
 <div class="form-group">
 <br><br>
    <label for="studentregno">Student Reg No</label><br><br>
    <input type="text" class="form-control" id="studentregno" name="studentregno"  placeholder="Student Reg no" required />
  </div>
<div class="form-group">
<br><br>
    <label for="password">Password  </label>
	<br><br>
    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required />
  </div>   
  <br>
 <button type="submit" name="submit" id="submit" class="btn">Submit</button>
</form>
                            </div>
							</fieldset>
                            </div>
 <script type="text/javascript">
    $(document).ready(function(){
      $('.nav_btn').click(function(){
        $('.nav_element').toggleClass('active');
      });
    });
	</script>
</body>
</html>
<?php } ?>
