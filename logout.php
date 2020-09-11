<?php

session_start();


session_destroy();

echo "<script>
        alert('you have succesfully logged out');
        window.location.href='indx.php';
    </script>";
?>