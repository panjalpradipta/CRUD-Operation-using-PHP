<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <?php require_once('assets/bootstrap.php'); ?> 
</head>
<body>
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
          <li class="active"><a href="#">Home</a></li>
          <li><a href="read.php">Read</a></li>
        <li><a href="update.php">Update</a></li>
        <li><a href="delete.php">Delete</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <?php
        if(isset($_SESSION['user'])){?>
          <li style="color:#CFCDCD; margin-right:1vw; margin-top:2vh;"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['user']; ?></a></li>
          <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
          <?php
        }
        else{?>
          <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
          <li><a href="indx.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          <?php
        }
        ?>
        </ul>
      </div>
  </div>
</nav>

<div class="container">

<h2 style="text-align:center;margin-top:5vh;">Badhai Ho !!!</h2>

</div>
</body>
</html>