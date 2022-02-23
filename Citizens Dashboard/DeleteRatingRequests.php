<?php
    include_once("../Files/connection.php");
    $rid = $_GET["rid"];
    $query = "DELETE from ratings where rid='$rid'";
    mysqli_query($dbCon,$query);
    $err = mysqli_error($dbCon);
    if($err == "") echo "Saved Successfully";
    else echo $err;
?>