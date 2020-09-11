<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <?php require_once('assets/bootstrap.php'); ?>
    <style>
    .container h3{
        text-align:center;
    }
    </style>
</head>
<body>
<?php
if(isset($_SESSION['user'])){?>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="home.php">WebSiteName</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li ><a href="home.php">Home</a></li>
          <li><a href="read.php">Read</a></li>
          <li ><a href="update.php">Update</a></li>
          <li class="active"><a href="#">Delete</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <li style="color:#CFCDCD; margin-right:1vw; margin-top:2vh;"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['user']; ?></a></li>
    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
        </ul>
      </div>
  </div>
</nav>
    <div class="container">
    <h3>Details</h3>
    <table class="table table-hover">
    <tr>
    <th>Name</th>
    <th>Contact</th>
    <th>Email</th>
    <th>Age</th>
    <th>Gender</th>
    <th>Delete</th>
    </tr>
    
    <?php
    $con = new mysqli("localhost","root","","empdb");
    if ($con->connect_error) die ($con->connect_error);
    else{
      if($_SESSION['role']=='admin'){
        $read = "select * from users";
      }
      else{
        $read = "select * from users where uid=".$_SESSION['id'];
      }
        $res = $con->query($read);

        while($row = $res->fetch_assoc()){
            ?>
            <tr>
                <td><?php echo $row['uname']; ?></td>
                <td><?php echo $row['contact']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td> <a href="deleteDetails.php?id=<?php echo $row['uid']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Do You want to Delete This Record ?');">Delete Details</a></td>
            </tr>
    <?php
        }
    
    }
        $con->close();
    ?>
</table>
    <a class="btn btn-sm btn-info" href="home.php">Back to Home</a>
    </div>
    <?php
}
else{
  header("location:indx.php");
}
?>
</body>
</html>