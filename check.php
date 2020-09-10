<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Succesfull</title>
    <?php require_once('assets/bootstrap.php'); ?>
    <style>
        .container{
            margin-top:10vw;
        }
    </style>
    }
</head>
<body>
<div class="container">
<?php

if (isset($_POST['btn'])){ //check the submit button is clicked or not

    //fethcing the value from input field and stored the value
    $name               = $_POST['name'];
    $contact            = $_POST['contact'];
    $email              = $_POST['email'];
    $pass               = $_POST['password'];
    $age                = $_POST['age'];
    $gender             = $_POST['gender'];
}

$connect = new mysqli("localhost","root","","empdb");//Establish the database connection

if($connect->connect_error) die ($connect->connect_error);//checking error
else{
    $sql = "insert into users (uname, contact, email, password, age, gender) values ('$name', '$contact', '$email', password('$pass'), '$age', '$gender')";//Insert the value into database

    $connect->query($sql);//execute the query
    $rows = $connect->affected_rows;//number of how many rows we got
    if($rows==1){
        echo "<div align='center' class='alert alert-success'>Registered Successfully</div>";// if there are any rows affected
        ?>
        <a class="btn btn-sm btn-info" href="indx.php">Login</a>
        <a class="btn btn-sm btn-primary" href="home.php">Back to Home</a>
        <?php
    }
    else{
        echo "something went wrong";// if there are no rows
        ?>
        <a href="signup.php?error=true">home.php</a>
        <?php
    }
}
?>
</div>
</body>
</html>