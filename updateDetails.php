<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <?php require_once('assets/bootstrap.php'); ?>
</head>
<body>
    <?php
    $data = [];
    $uid = $_GET['id'];
    $con = new mysqli ("localhost","root","","empdb");
    if($con->connect_error) die($con->connect_error);
    else{
        $sql = "select * from users where uid = $uid";
        $res = $con->query($sql);

        if($rows = $res->fetch_assoc()){
            $data = [
                'uid'               => $rows['uid'],
                'name'              => $rows['uname'],
                'contact'           => $rows['contact'],
                'email'             => $rows['email'],
                'age'               => $rows['age']
            ];

            ?>
            <div class="container">
                <h3>Update Individual Details</h3><hr/>
                <form action="view_update.php" method="post">
                <p>Name:    <input type="text" name="t1" value="<?php echo $data['name']; ?>" class="form-control"></p>
                <p>Contact: <input type="number" name="t2" value="<?php echo $data['contact']; ?>" class="form-control"></p>
                <p>Email:   <input type="email" name="t3" value="<?php echo $data['email']; ?>" class="form-control"></p>
                <p>Age:     <input type="number" name="t4" value="<?php echo $data['age']; ?>" class="form-control"></p>   
                </p>
                <!--Adding a Hideen field which will hold the id-->
                <input type="hidden" name="hid" value="<?php echo $data['uid'];?>">
                <button class="btn btn-sm btn-info">Update</button>
                <a href="update.php" class="btn btn-sm btn-primary">Back to Previous Page</a>
                <a href="home.php" class="btn btn-sm btn-success">Back to Home</a> 
                </form>
                </div>
            <?php
        }
        else{
            echo "no such records...";
        }
    }
    $con->close();
    ?>
</body>
</html>