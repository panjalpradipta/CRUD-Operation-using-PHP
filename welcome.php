<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--Bootstrap CDN-->
    <?php require_once('assets/bootstrap.php'); ?>
    <!--End Of Bootstrap CDN--> 
    <script type="text/javascript">

        $(document).ready(function(e){
           // console.log('jQuery is Loaded');
            var count = 0;
            var time = setInterval(function(){
                if(count == 20)
                    {
                        windows.location.href= 'logout.php';
                        clearInterval(time);
                    }
                count++;
                console.log(count);
            },1000);

        $(this).mousemove(function(e){count = 0;});
        $(this).keypress(function(e){count = 0;});
        });
    </script>
    <style>
        .container{font-size:2rem;text-align:center;}
       
    </style>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Welcome</a></li>
      <li><a href="read.php">Read</a></li>
      <li><a href="update.php">Update</a></li>
      <li><a href="delete.php">Delete</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <li style="color:#CFCDCD; margin-right:1vw; margin-top:2vh;"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['user']; ?></a></li>
    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
    
    </ul>
  </div>
</nav>
    <div class="container">
    <?php 
    if(isset($_SESSION['user']))
        {?>
            <div id="d1">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aperiam, natus fuga. Sit et, error numquam modi eius tempore dolorum facere! Repudiandae ipsa fugiat, consequatur cum fugit accusantium nisi maiores eius deserunt, incidunt inventore aliquam minima enim corrupti accusamus. Exercitationem tempore quae quia labore quam a, reprehenderit corporis. Mollitia, fugiat iusto ea est dolore earum molestiae neque laborum eius facilis incidunt qui autem cupiditate. Totam quod, aliquam nihil temporibus saepe eos nemo aperiam voluptates exercitationem minima commodi impedit. Provident quibusdam, ad maiores excepturi praesentium a itaque cumque ullam. Voluptatum perferendis beatae, possimus saepe libero quod vitae perspiciatis aperiam laudantium a? Et odit praesentium nihil laudantium velit, sit sapiente magni exercitationem illo nesciunt quidem, eos cupiditate totam animi, alias ad incidunt tenetur harum ab inventore veniam. Asperiores quidem eos, iure earum sequi fugiat cumque quisquam reprehenderit velit ut? Animi numquam earum perferendis odit nemo ipsa inventore est quaerat amet culpa, quas, quae quidem consectetur soluta temporibus excepturi saepe cum enim, officia obcaecati harum? Facere alias nihil pariatur nobis quod, obcaecati similique dolore atque reprehenderit dolorem vitae est beatae labore, illum tempore commodi quo nesciunt cupiditate harum quidem! Ad, dignissimos! Quo pariatur dolor aspernatur sunt dolores odit neque nisi id! Nisi, magni deleniti.
            </div>
        <?php
        }
            else
            {
                header("location:indx.php");
            }
        ?>
    </div>
</body>
</html>