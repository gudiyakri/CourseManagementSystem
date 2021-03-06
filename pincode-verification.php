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
$sql=mysqli_query($con,"SELECT * FROM  students where pincode='".trim($_POST['pincode'])."' && StudentRegno='".$_SESSION['login']."'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
$_SESSION['pcode']=$_POST['pincode'];
header("location:enroll.php");
}
else
{
$_SESSION['msg']="Error :Wrong Pincode. Please Enter a Valid Pincode !!";
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
    <title>Pincode Verification</title>
   <link href="assets/css/pincode.css" rel="stylesheet" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
</head>
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
                    <div class="pincode-verification">
                        <h1 class="page-head-line">Student Pincode Verification</h1>
                    </div>
					<fieldset>
                  <div class="textdisplay"></div>
                        <div class="panel-heading">
                          Pincode Verification
                        </div>
<font color="red" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>
                        <div class="form-body">
                       <form name="pincodeverify" method="post">
   <div class="form-group">
   <br><br>
    <label for="pincode">Enter Pincode</label><br><br>
    <input type="password" class="form-control" id="pincode" name="pincode" placeholder="Pincode" required />
  </div>
 <br>
  <button type="submit" name="submit" class="btn btn-default">Verify</button>
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
