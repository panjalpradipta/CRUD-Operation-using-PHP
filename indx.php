<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once('assets/bootstrap.php'); ?>
    <style>
        .error{color:red; text-align:center; font-size:2rem;}
        .container{width:30%;}
        @media only screen and (max-width:768px){
          .container{width:80%;}
        }
    </style>
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
        <a class="navbar-brand" href="home.php">Pradipta Panjal</a>
      </div>

      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li ><a href="home.php">Home</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
          <li class="active"><a href="indx.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
      </div>
    </div>
</nav>
    <div class="container">
    <form action="login.php" method="POST">
        <h1>Login Here</h1>
        <div class="form-group">
            <label for="">User Name:</label>
            <input type="text" name="user" required placeholder="Enter User Name" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Password:</label>
            <input type="password" name="password" required placeholder="Enter Password" class="form-control">
        </div>

        <div class="form-group">
            <button class="btn btn-block btn-success" value="login" name="button">Login</button>
        </div>
    </form>
    </div>
    <?php if(isset($_GET['error'])){
        echo "<div class='error'>Invalid Credentials !!! </div>";
    } ?>
</body>
</html>