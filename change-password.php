<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
    {   
header('location:student.php');
}
else{
$currentTime = date( 'd-m-Y h:i:s', time () );


if(isset($_POST['submit']))
{
$sql=mysqli_query($con,"SELECT password FROM  students where password='".md5($_POST['cpass'])."' && studentRegno='".$_SESSION['login']."'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $con=mysqli_query($con,"update students set password='".md5($_POST['newpass'])."', updationDate='$currentTime' where studentRegno='".$_SESSION['login']."'");
$_SESSION['msg']="Password Changed Successfully !!";
}
else
{
$_SESSION['msg']="Current Password not match !!";
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
    <title>Admin | Student Password</title>
    <link href="assets/css/change-password.css" rel="stylesheet" />
	<link href="assets/css/enroll-history.css" rel="stylesheet" />
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
<?php include('includes/header.php');?>
	<input type="checkbox" id="check">
    <header>
      <label for="check">
	  <i class="fas fa-bars" id="sidemenu_btn"></i>
      </label>
      <div class="leftside">
        <h3>Student <span>Dashboard</span></h3>
      </div>
      <div class="rightside">
        <a href="logout.php" class="logout">Logout</a>
      </div>
    </header>
	<div class="nav">
      <div class="nav_bar">
        <i class="fa fa-bars nav_btn"></i>
      </div>

	  <div class="nav_element">
      <a href="pincode-verification.php"><span>ENROLL FOR COURSE</span></a>
        <a href="enroll-history.php"><span>ENROLL HISTORY</span></a>
        <a href="my-profile.php"><span>MY PROFILE</span></a>
        <a href="change-password.php"><span>CHANGE PASSWORD</span></a>
      </div>
    </div>
    <!--sidemenu start-->
    <div class="sidemenu">
      <a href="pincode-verification.php"><span>ENROLL FOR COURSE</span></a>
        <a href="enroll-history.php"><span>ENROLL HISTORY</span></a>
        <a href="my-profile.php"><span>MY PROFILE</span></a>
        <a href="change-password.php"><span>CHANGE PASSWORD</span></a>
    </div>
    <!--sidemenu end-->

    <div class="content">
                    <div class="changepassword">
                        <h1 class="page-head-line">Student Change Password </h1>
                    </div>
                  <div class="textdisplay"></div>
				  <fieldset>
                        <div class="panel-heading">
                           Change Password
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>


                        <div class="form-body">
                       <form name="chngpwd" method="post" onSubmit="return valid();">
   <div class="form-group">
   <br><br>
    <label for="exampleInputPassword1">Current Password</label><br><br>
    <input type="password" class="form-control" id="exampleInputPassword1" name="cpass" placeholder="Password" />
  </div>
   <div class="form-group"><br><br>
    <label for="exampleInputPassword1">New Password</label><br><br>
    <input type="password" class="form-control" id="exampleInputPassword2" name="newpass" placeholder="Password" />
  </div>
  <div class="form-group"><br><br>
    <label for="exampleInputPassword1">Confirm Password</label><br><br>
    <input type="password" class="form-control" id="exampleInputPassword3" name="cnfpass" placeholder="Password" />
  </div>
 <br>
  <button type="submit" name="submit" class="btn">Submit</button>
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
