<?php
    include_once("../Files/connection.php");
    $uid = $_POST["txtEmailSignUp"];
    $pwd = $_POST["txtPasswordSignUp"];
    $mob = $_POST["txtNumberSignUp"];
    $rad = $_POST["category"];
    $query = "INSERT into users values('$uid','$pwd','$mob','$rad',curdate(),1)";
    mysqli_query($dbCon,$query);
    $err = mysqli_error($dbCon);
    if($err == "") echo "<h1>Sign-Up Successful</h1>";
    else echo $err;
?>