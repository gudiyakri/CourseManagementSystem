<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:admin.php');
}
else{
if(isset($_GET['del']))
      {
              mysqli_query($con,"delete from students where StudentRegno = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Student record deleted !!";
      }

     if(isset($_GET['pass']))
      {
        $password="Gudiya@123";
        $newpass=md5($password);
              mysqli_query($con,"update students set password='$newpass' where StudentRegno = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Password Reset. New Password is Gudiya@123";
      } 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin | Course</title>
    <link href="assets/css/manage-student.css" rel="stylesheet" />
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
                        <h1 class="page-head-line">Course  </h1>
                </div>
                <font  align="center" class="font"><?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?></font>
				<fieldset class="fieldset">
                        <div class="panel-heading">
                            Manage Course
                        </div>
                            <div class="table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Reg No </th>
                                            <th>Student Name </th>
                                            <th> Pincode</th>
                                             <th>Reg Date</th>
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$sql=mysqli_query($con,"select * from students");
$count=1;
while($row=mysqli_fetch_array($sql))
{
?>


                                        <tr>
                                            <td><?php echo $count;?></td>
                                            <td><?php echo htmlentities($row['StudentRegno']);?></td>
                                            <td><?php echo htmlentities($row['studentName']);?></td>
                                            <td><?php echo htmlentities($row['pincode']);?></td>
                                            <td><?php echo htmlentities($row['creationdate']);?></td>
                                            <td>
                                            <a href="edit-student-profile.php?id=<?php echo $row['StudentRegno']?>">
<button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button> </a>                                        
<a href="manage-students.php?id=<?php echo $row['StudentRegno']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
                                            <button class="btn">Delete</button>
</a>
<a href="manage-students.php?id=<?php echo $row['StudentRegno']?>&pass=update" onClick="return confirm('Are you sure you want to reset password?')">
<button type="submit" name="submit" id="submit" class="btn">Reset Password</button>
</a>
                                            </td>
                                        </tr>
<?php 
$count++;
} ?>

                                        
                                    </tbody>
                                </table>
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
