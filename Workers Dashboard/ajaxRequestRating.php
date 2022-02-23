<?php
    include_once("../Files/connection.php");
    $citizenUid = $_GET["citizenuid"];
    $workerUid = $_GET["workeruid"];
    // $rid = 0;
    // $query = "INSERT into ratings values('$rid','$citizenUid','$workerUid',0)";
    $query = "INSERT into ratings values(0,'$citizenUid','$workerUid',0)";
    mysqli_query($dbCon,$query);
    $err = mysqli_error($dbCon);
    if($err == "") echo "<b>Rating Requested.</b>";
    else echo $err;
?>