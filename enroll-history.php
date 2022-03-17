<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
    {   
header('location:student.php');
}
else{



?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Enroll History</title>
    <link href="assets/css/enroll-history.css" rel="stylesheet" />
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
        <div class="enroll-history">
                        <h1 class="page-head-line">Enroll History  </h1>
                    </div>
					<fieldset>
                        <div class="panel-heading">
                           Enroll History
                        </div>
                            <div class="table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Course Name </th>
                                            <th>Session </th>
                                            <th> Department</th>
                                             <th>Level</th>
                                                <th>Semester</th>
                                             <th>Enrollment Date</th>
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$sql=mysqli_query($con,"select courseenrolls.course as cid, course.courseName as courname,session.session as session,department.department as dept,level.level as level,courseenrolls.enrollDate as edate ,semester.semester as sem from courseenrolls join course on course.id=courseenrolls.course join session on session.id=courseenrolls.session join department on department.id=courseenrolls.department join level on level.id=courseenrolls.level  join semester on semester.id=courseenrolls.semester  where courseenrolls.studentRegno='".$_SESSION['login']."'");
$count=1;
while($row=mysqli_fetch_array($sql))
{
?>


                                        <tr>
                                            <td><?php echo $count;?></td>
                                            <td><?php echo htmlentities($row['courname']);?></td>
                                            <td><?php echo htmlentities($row['session']);?></td>
                                            <td><?php echo htmlentities($row['dept']);?></td>
                                            <td><?php echo htmlentities($row['level']);?></td>
                                            <td><?php echo htmlentities($row['sem']);?></td>
                                             <td><?php echo htmlentities($row['edate']);?></td>
                                            <td>
                                            <a href="print.php?id=<?php echo $row['cid']?>" target="_blank">
<button class="btn"><i class="fa fa-print "></i> Print</button> </a>                                        


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
