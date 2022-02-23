<?php
    include_once("../Files/connection.php");
    $uid = $_GET["uid"];
    $query = "SELECT * from ratings where citizenuid='$uid'";
    // $query = "SELECT * from requirements where uid='$uid'";
    $table = mysqli_query($dbCon,$query);
    $arr = array();
    while($row = mysqli_fetch_array($table)) {
        $arr[] = $row;
    }
    echo json_encode($arr);
?>