<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
    {   
header('location:student.php');
}
else{

if(isset($_POST['submit']))
{
$studentname=$_POST['studentname'];
$photo=$_FILES["photo"]["name"];
$cgpa=$_POST['cgpa'];
move_uploaded_file($_FILES["photo"]["tmp_name"],"studentphoto/".$_FILES["photo"]["name"]);
$query=mysqli_query($con,"update students set studentName='$studentname',studentPhoto='$photo',cgpa='$cgpa'  where StudentRegno='".$_SESSION['login']."'");
if($query)
{
$_SESSION['msg']="Student Record updated Successfully !!";
}
else
{
  $_SESSION['msg']="Error : Student Record not update";
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
    <title>Student Profile</title>
    <link href="assets/css/profile.css" rel="stylesheet">
<link rel="stylesheet"        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"    charset="utf-8"></script>
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
        <a href="logout.php"><span>CHANGE PASSWORD</span></a>
      </div>
    </div>
    <!--sidemenu start-->
    <div class="sidemenu">
      <a href="pincode-verification.php"><span>ENROLL FOR COURSE</span></a>
        <a href="enroll-history.php"><span>ENROLL HISTORY</span></a>
        <a href="my-profile.php"><span>MY PROFILE</span></a>
        <a href="logout.php"><span>CHANGE PASSWORD</span></a>
    </div>
    <!--sidemenu end-->
    <div class="content">
        <div class="container">
                    <div class="student-profile">
                        <h1 class="page-head-line">Student Registration  </h1>
                    </div>
					<fieldset class="fieldset">
                  <div class="textdisplay"></div>
                        <div class="panel-heading">
                          Student Registration
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>
<?php $sql=mysqli_query($con,"select * from students where StudentRegno='".$_SESSION['login']."'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{ ?>

                        <div class="form-body">
                       <form name="dept" method="post" enctype="multipart/form-data">
   <div class="form-group"><br><br>
    <label for="studentname">Student Name  </label><br>
    <input type="text" class="form-control" id="studentname" name="studentname" value="<?php echo htmlentities($row['studentName']);?>"  />
  </div>

 <div class="form-group"><br><br>
    <label for="studentregno">Student Reg No   </label><br>
    <input type="text" class="form-control" id="studentregno" name="studentregno" value="<?php echo htmlentities($row['StudentRegno']);?>"  placeholder="Student Reg no" readonly />
    
  </div>
<div class="form-group"><br><br>
 <label for="Pincode">Pincode  </label><br>
 <input type="text" class="form-control" id="Pincode" name="Pincode" readonly value="<?php echo htmlentities($row['pincode']);?>" required />
  </div>   

<div class="form-group">
<br><br>
    <label for="CGPA">CGPA  </label><br>
    <input type="text" class="form-control" id="cgpa" name="cgpa"  value="<?php echo htmlentities($row['cgpa']);?>" required />
  </div>  

<div class="form-group">
<br>
  <label for="Pincode">Student Photo  </label><br>
   <?php if($row['studentPhoto']==""){ ?>
  <img src="studentphoto/noimage.png" width="200" height="200"><?php } else {?>
   <img src="studentphoto/<?php echo htmlentities($row['studentPhoto']);?>" width="200" height="200">
   <?php } ?>
  </div>
<div class="form-group">
<br>
    <label for="Pincode">Upload New Photo  </label>
	<br><br>
    <input type="file" class="form-control" id="photo" name="photo"  value="<?php echo htmlentities($row['studentPhoto']);?>" />
  </div>


  <?php } ?>
<br>
 <button type="submit" name="submit" id="submit" class="btn">Update</button>
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
