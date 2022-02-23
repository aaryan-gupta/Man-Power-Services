<?php
    include_once("../Files/connection.php");
    $uid = $_GET["uid"];
    $category = $_GET["category"];
    $problem = $_GET["problem"];
    $location = $_GET["location"];
    $city = $_GET["city"];
    $query = "INSERT into requirements values(0,'$uid','$category','$problem','$location','$city',curdate())";
    mysqli_query($dbCon,$query);
    $err = mysqli_error($dbCon);
    if($err == "") echo "<b>Requirement Posted.</b>";
    else echo $err;
?>