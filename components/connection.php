<?php
    /* DATABASE CONNECTION*/
    $con = mysqli_connect("localhost","root","","simple_curd");

    if(!$con){
        die('Connection Failed'. mysqli_connect_error());
    }
?>
