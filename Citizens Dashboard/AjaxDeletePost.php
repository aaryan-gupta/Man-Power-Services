<?php
    include_once("../Files/connection.php");
    $rid = $_GET["rid"];
    $query = "DELETE from requirements where rid='$rid'";
    mysqli_query($dbCon,$query);
    $err = mysqli_error($dbCon);
    if($err == "") echo "Requirement DELETED.";
    else echo $err;
?>