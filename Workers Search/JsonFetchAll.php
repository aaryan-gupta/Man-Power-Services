<?php
    include_once("../Files/connection.php");
    // $uid = $_GET["uid"];
    $query = "SELECT distinct category from workers";
    // $query = "SELECT distinct category and city from workers";
    // $query = "SELECT * from workers";
    $table = mysqli_query($dbCon,$query);
    $arr = array();
    while($row = mysqli_fetch_array($table)) {
        $arr[] = $row;
    }
    echo json_encode($arr);
?>