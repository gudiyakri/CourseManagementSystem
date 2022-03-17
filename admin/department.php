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
  $department=$_POST['department'];
$query=mysqli_query($con,"insert into department(department) values('$department')");
if($query)
{
$_SESSION['msg']="Department Created Successfully !!";
}
else
{
  $_SESSION['msg']="Error : Department not created";
}
}
if(isset($_GET['del']))
      {
              mysqli_query($con,"delete from department where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Department deleted !!";
      }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin | department</title>
    <link href="assets/css/department.css" rel="stylesheet" />
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
                    <div class="department">
                        <h1 class="page-head-line">Department  </h1>
                    </div>
                </div>
				<fieldset>
                  <div class="textdisplay"></div>
                        <div class="panel-heading">
                           Department 
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>
                        <div class="form-body">
                       <form name="dept" method="post">
   <div class="form-group">
    <label for="department">Add Department  </label>
    <input type="text" class="form-control" id="department" name="department" placeholder="department" required />
  </div>
 <button type="submit" name="submit" class="btn">Submit</button>
</form>
                            </div>
							</fieldset>
							<br>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<font color="red" align="center"><?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?></font>
				<fieldset class="fieldset">
                        <div class="panel-heading">
                            Manage Session
                        </div>
                            <div class="table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>department</th>
                                            <th>Creation Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$sql=mysqli_query($con,"select * from department");
$count=1;
while($row=mysqli_fetch_array($sql))
{
?>


                                        <tr>
                                            <td><?php echo $count;?></td>
                                            <td><?php echo htmlentities($row['department']);?></td>
                                            <td><?php echo htmlentities($row['creationDate']);?></td>
                                            <td>
  <a href="department.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
                                            <button class="btn">Delete</button>
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
