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
                'name'              => $rows['uname'],
                'contact'           => $rows['contact'],
                'email'             => $rows['email'],
                'age'               => $rows['age'],
                'gender'            => $rows['gender']
            ];

            ?>
            <div class="container">
                <h3>Individual Details</h3><hr/>
                <p>Name: <?php echo $data['name']; ?></p>
                <p>Contact: <?php echo $data['contact']; ?></p>
                <p>Email: <?php echo $data['email']; ?></p>
                <p>Age: <?php echo $data['age']; ?></p>
                <p>Gender: <?php echo $data['gender']; ?></p>
                <a class="btn btn-sm btn-primary" href="read.php">Back to Previous Page</a>
                <a class="btn btn-sm btn-success" href="home.php">Back to Home</a>
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