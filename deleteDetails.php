<?php

$id = $_GET['id'];

$con = new mysqli ("localhost","root","","empdb");
if($con->connect_error) die($con->connect_error);
else{
    $delete = "delete from users where uid=$id";
    $con->query($delete);
    $deleted_rows = $con->affected_rows;
    if($deleted_rows==1){
        header("location:home.php");
    }
    else{
        echo "error occurs while deleting data";
    }
}
$con->close();

?>