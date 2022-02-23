<?php
    include_once("../Files/connection.php");
    $uid = $_GET["uid"];
    $rate = $_GET["rate"];
    $query = "UPDATE workers set total=total+'$rate', count=count+1 where uid='$uid'";
    mysqli_query($dbCon,$query);
    $err = mysqli_error($dbCon);
    if($err == "") echo "Saved Successfully";
    else echo $err;
?>