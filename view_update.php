<?php
    print_r($_POST);
    $name= $_POST['t1'];
    $contact= $_POST['t2'];
    $email= $_POST['t3'];
    $age= $_POST['t4'];
    $id= $_POST['hid'];

    $con = new mysqli ("localhost","root","","empdb");
    if($con->connect_error) die($con->connect_error);
    else{
        $update = "update users set uname='$name', contact='$contact', email='$email', age='$age' where uid=$id";
        $con->query($update);
        $updated_rows = $con->affected_rows;
        if($updated_rows==1)
                    {
                        header("location:home.php");
                    }
        else
                    {
                        echo "error while updating";
                    }

    }
    $con->close();

?>
