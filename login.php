<?php

#session start
session_start();

$uname = $_POST['user'];
$pass  = $_POST['password'];

$con = new mysqli("localhost","root","","empdb");
if($con->connect_error) die(connect_error);
else{
    $sql = "select * from users where email='$uname' and password= password('$pass')";
    $res= $con->query($sql);
    if($rows = $res->fetch_assoc()){
        $_SESSION['id']     = $rows['uid'];
        $_SESSION['role']   = $rows['role'];
        $_SESSION['user']   = $rows['uname'];
        $_SESSION['IP']     = $_SERVER['REMOTE_ADDR'];

        header("location:welcome.php");
    }
    else{
        header("location:indx.php?error=true");
    }
}
$con->close();
?>