<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:admin.php');
}
else{
$id=intval($_GET['id']);
$currentTime = date( 'd-m-Y h:i:s', time () );
if(isset($_POST['submit']))
{
$coursecode=$_POST['coursecode'];
$coursename=$_POST['coursename'];
$courseunit=$_POST['courseunit'];
$seatlimit=$_POST['seatlimit'];
$query=mysqli_query($con,"update course set courseCode='$coursecode',courseName='$coursename',courseUnit='$courseunit',noofSeats='$seatlimit',updationDate='$currentTime' where id='$id'");
if($query)
{
$_SESSION['msg']="Course Updated Successfully !!";
}
else
{
  $_SESSION['msg']="Error : Course not Updated";
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
    <title>Admin | Course</title>
    <link href="assets/css/edit-course.css" rel="stylesheet" />
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
                    <div class="edit-course">
                        <h1 class="page-head-line">EDIT COURSE  </h1>
                    </div>
					  <div class="textdisplay"></div>
                        <div class="panel-heading">
                           Course 
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>


                        <div class="form-body">
                       <form name="dept" method="post">
<?php
$sql=mysqli_query($con,"select * from course where id='$id'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>
<p><b>Last Updated at</b> :<?php echo htmlentities($row['updationDate']);?></p>
   <div class="form-group">
    <label for="coursecode">Course Code  </label>
    <input type="text" class="form-control" id="coursecode" name="coursecode" placeholder="Course Code" value="<?php echo htmlentities($row['courseCode']);?>" required />
  </div>

 <div class="form-group">
    <label for="coursename">Course Name  </label>
    <input type="text" class="form-control" id="coursename" name="coursename" placeholder="Course Name" value="<?php echo htmlentities($row['courseName']);?>" required />
  </div>

<div class="form-group">
    <label for="courseunit">Course unit  </label>
    <input type="text" class="form-control" id="courseunit" name="courseunit" placeholder="Course Unit" value="<?php echo htmlentities($row['courseUnit']);?>" required />
  </div>  

<div class="form-group">
    <label for="seatlimit">Seat limit  </label>
    <input type="text" class="form-control" id="seatlimit" name="seatlimit" placeholder="Seat limit" value="<?php echo htmlentities($row['noofSeats']);?>" required />
  </div>  


<?php } ?>
 <button type="submit" name="submit" class="btn"><i class=" fa fa-refresh "></i> Update</button>
</form>
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
