<?php
    include_once("../Files/connection.php");
    $uid = $_GET["uid"];
    $pwd = $_GET["pwd"];
    $mob = $_GET["mobile"];
    $rad = $_GET["category"];
    $query = "INSERT into users values('$uid','$pwd','$mob','$rad',curdate(),1)";
    mysqli_query($dbCon,$query);
    $err = mysqli_error($dbCon);
    if($err == "") {
        echo  $rad;
    }
    else echo $err;
?>