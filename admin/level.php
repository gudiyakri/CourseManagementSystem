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
  $level=$_POST['level'];
$ret=mysqli_query($con,"insert into level(level) values('$level')");
if($ret)
{
$_SESSION['msg']="Level Created Successfully !!";
}
else
{
  $_SESSION['msg']="Error : Level not created";
}
}
if(isset($_GET['del']))
      {
              mysqli_query($con,"delete from level where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Level deleted !!";
      }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin | level</title>
    <link href="assets/css/level.css" rel="stylesheet" />
</head>

<body>
    <div class="content">
                    <div class="level">
                        <h1 class="page-head-line">Level  </h1>
                    </div>
                </div>
                <div class="leveldisplay">
                  <div class="textdisplay"></div>
                        <div class="panel-heading">
                           Level 
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>


                        <div class="form-body">
                       <form name="level" method="post">
   <div class="form-group">
    <label for="department">Add Level  </label>
    <input type="text" class="form-control" id="level" name="level" placeholder="level" required />
  </div>
 <button type="submit" name="submit" class="btn btn-default">Submit</button>
</form>
                            </div>
                            </div>
                    </div>
                  
                </div>
                <font color="red" align="center"><?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?></font>
                <div class="col-md-12">
                    <!--    Bordered Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage level
                        </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Level</th>
                                            <th>Creation Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$sql=mysqli_query($con,"select * from level");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>


                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo htmlentities($row['level']);?></td>
                                            <td><?php echo htmlentities($row['creationDate']);?></td>
                                            <td>
  <a href="level.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
                                            <button class="btn">Delete</button>
</a>
                                            </td>
                                        </tr>
<?php 
$cnt++;
} ?>

                                        
                                    </tbody>
                                </table>
                            </div>
          
</body>
</html>
<?php } ?>
