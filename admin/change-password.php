<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:admin.php');
}
else{
$currentTime = date( 'd-m-Y h:i:s', time () );
if(isset($_POST['submit']))
{
$sql=mysqli_query($con,"SELECT password FROM  admin where password='".md5($_POST['cpass'])."' && username='".$_SESSION['alogin']."'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $con=mysqli_query($con,"update admin set password='".md5($_POST['newpass'])."', updationDate='$currentTime' where username='".$_SESSION['alogin']."'");
$_SESSION['msg']="Password Changed Successfully !!";
}
else
{
$_SESSION['msg']="Old Password not match !!";
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
    <title>Admin | Change Password</title>
    <link href="assets/css/adminchangepwd.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
</head>
<script type="text/javascript">
function valid()
{
if(document.chngpwd.cpass.value=="")
{
alert("Current Password Filed is Empty !!");
document.chngpwd.cpass.focus();
return false;
}
else if(document.chngpwd.newpass.value=="")
{
alert("New Password Filed is Empty !!");
document.chngpwd.newpass.focus();
return false;
}
else if(document.chngpwd.cnfpass.value=="")
{
alert("Confirm Password Filed is Empty !!");
document.chngpwd.cnfpass.focus();
return false;
}
else if(document.chngpwd.newpass.value!= document.chngpwd.cnfpass.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.chngpwd.cnfpass.focus();
return false;
}
return true;
}
</script>
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
                    <div class="changepassword">
                        <h1 class="page-head-line">Admin Change Password </h1>
					</div>
				 <fieldset>
                  <div class="textdisplay"></div>
                        <div class="panel-heading">
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  Change Password
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>

                        <div class="form-body">
                       <form name="chngpwd" method="post" onSubmit="return valid();">
					  
   <div class="form-group"><br><br>
    <label for="exampleInputPassword1">Current Password</label><br><br>
    <input type="password" class="formcontrol" id="exampleInputPassword1" name="cpass" placeholder="Password" />
  </div>                                                     
   <div class="form-group"><br><br>
    <label for="exampleInputPassword1">New Password</label><br><br>
    <input type="password" class="formcontrol" id="exampleInputPassword2" name="newpass" placeholder="Password" />
  </div>
  <div class="form-group">
  <br><br>
    <label for="exampleInputPassword1">Confirm Password</label>
	<br><br>
    <input type="password" class="formcontrol" id="exampleInputPassword3" name="cnfpass" placeholder="Password" />
  </div>
 <br>
  <button type="submit" name="submit" class="btn btn-default">Submit</button>
                           <hr />
					
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
