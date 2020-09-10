<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" type="text/css" href="css/style1.css">
    <!--Bootstrap Integration-->
    <?php require_once('assets/bootstrap.php'); ?> 

    <script type="text/javascript">
        //Starting of Function for phone number validation
            function phoneValid()
            {
                var phone = document.getElementById('contact').value; // Fetching value from CONTACT input field.
                if(phone.length == 10)
                {
                    if (phone.substr(0,1)=='9'|| phone.substr(0,1)=='8' || phone.substr(0,1)=='7'  || phone.substr(0,1)=='6')
                        {
                            document.getElementById('errorPhone').innerHTML='';
                            document.getElementById('b1').disabled=false; // button gets enabled
                        }
                    else
                        {
                            document.getElementById('errorPhone').innerHTML='Invalid Mobile No';
                            document.getElementById('b1').disabled=true; // button gets disbaled
                        }  
                }
                else
                {
                    document.getElementById('errorPhone').innerHTML='Mobile No must contain 10 digits.';
                    document.getElementById('b1').disabled=true; // button gets enabled
                }
            }
        //Ending of Function for phone validation

        // Starting of Function for email id validation
        function emailValid(){
                var em = document.getElementById('email').value; //Fetching value from EMAIL input field.
                var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                if(regex.test(em)){
                    document.getElementById('errorEmail').innerHTML='';
                    document.getElementById('b1').disabled= false;
                }
                else{
                    document.getElementById('errorEmail').innerHTML='Invalid Email Address';
                    document.getElementById('b1').disabled= true;
                }
            }
        // Ending of Function for email id validation

        //Starting of function for password policy
        function passPol(){
                var pswd = document.getElementById('password').value;
                var regex =  /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;

                if (regex.test(pswd)){
                    document.getElementById('passPolicy').innerHTML='';
                    document.getElementById('b1').disabled = false;
                }
                else{
                    document.getElementById('passPolicy').innerHTML= '<br>Password Policy :<br/><ul><li>at least One UpperCase</li><li>at least One LowerCase</li><li>at least One Special Char.</li><li>at least One Digit</li><li>Min 6 Chars Long</li><li>Max 16 Chars Long</li></ul>';
                    document.getElementById('b1').disabled = true; 
                }
            }
        //Ending of function for password policy

        // Starting of Function for password matching
        function confirmPass(){
                var pass = document.getElementById('password').value; //Fetching value from PASSWORD input field.
                var conpass = document.getElementById('conpwd').value; //Fetching value from CONFIRM PASSWORD input field.

                //check whether the given two password is same or not

                if(pass == conpass){
                    document.getElementById('errorPass').innerHTML='Password match';
                    document.getElementById('b1').disabled = false ; //button gets enabled
                }
                else{
                    document.getElementById('errorPass').innerHTML='Password does not match';
                    document.getElementById('b1').disabled = true ;  //button gets disbaled
                }
            }
        // Ending of Function for password matching

        //Starting of function for password toggle
        function passTogg(){
                var pass = document.getElementById('password');
                var conpass = document.getElementById('conpwd');

                var ch = document.getElementById('ch1');

                    if (ch.checked){
                        pass.type = conpass.type = 'text' ;
                    }
                    else
                    {
                        pass.type = conpass.type = 'password';
                    }
            }
        //Ending of function for password toggle
    </script>
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
          <li ><a href="home.php">Home</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
          <li><a href="indx.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
      </div>
  </div>
</nav>
    <div class="container">
    <h3>Sign Up!!!</h3>
            <div class="wrapper">
            <form action="check.php" method="post">
        <!-------------------------------------Name Field-------------------------------------------->
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" placeholder="Enter name" id="name" name="name" required autocomplete="off" >
        </div>

        <!-------------------------------------Contact Field-------------------------------------------->
        <div class="form-group">
            <label for="contact">Contact:</label>
            <input type="number" class="form-control" placeholder="Enter number" id="contact" name="contact" required autocomplete="off" onkeyup="phoneValid()">
            <span id="errorPhone"><!--Error Show--></span>
        </div>

        <!-------------------------------------Email Field-------------------------------------------->
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" placeholder="Enter email" id="email" name="email" required autocomplete="off" onkeyup="emailValid()">
            <span id="errorEmail"><!--Error Show--></span>
        </div>

        <!-------------------------------------Password Field-------------------------------------------->
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" placeholder="Enter password" id="password" name="password" required autocomplete="off" onkeyup="passPol()">
        <!----------------------------Adding a checkbox for password toggle-------------------------------->
            <input type="checkBox" name="ch1" id="ch1" onchange="passTogg()"><label style="color: rgb(0,0,0);">Show/Hide</label> 
            <span id="passPolicy"><!--Error Show--></span>
        </div>

        <!-------------------------------------Confirm Password Field-------------------------------------------->
        <div class="form-group">
            <label for="pwd">Retype Password:</label>
            <input type="password" class="form-control" placeholder="Enter password" id="conpwd" name="conpwd" required autocomplete="off" onkeyup="confirmPass()">
            <span id="errorPass"><!--Error Show--></span>
        </div>

        <!-------------------------------------Age Field-------------------------------------------->
        <div class="form-group">
            <label for="pwd">Age:</label>
            <input type="number" class="form-control" placeholder="Enter age" id="age" name="age" required autocomplete="off">
        </div>

        <!-------------------------------------Gender Field-------------------------------------------->
        <div class="form-group">
            <label for="pwd">Gender:</label>
            <input type="radio" name="gender" id="gender" value="Male" required><label style="color: rgb(0,0,0);">Male</label>
            <input type="radio" name="gender" id="gender" value="Female" required><label style="color: rgb(0,0,0);">Female</label>
        </div>
        
        <div>
        <button id="b1" name="btn" type="submit" class="btn btn-block btn-success">Submit</button>
        </div>
        <?php
        if (isset($_GET['error'])){?>
        <div class="alert alert-danger">Failed</div>
        <?php
        }
        ?>
    </form>
    </div>
    </div>
</body>
</html>
