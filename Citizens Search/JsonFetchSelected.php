<?php
    include_once("../Files/connection.php");
    $category = $_GET["category"];
    // $city = $_GET["city"];
    $query = "SELECT * from requirements where category='$category' and DATE_SUB(curdate(), INTERVAL 10 DAY)<=dop";
    // $query = "SELECT * from requirements where category='$category' and city='$city' and DATE_SUB(curdate(), INTERVAL 10 DAY)<=dop";
    $table = mysqli_query($dbCon,$query);
    $arr = array();
    while($row = mysqli_fetch_array($table)) {
        $arr[] = $row;
    }
    echo json_encode($arr);
    // include_once("../Files/connection.php");
    // $category = $_GET["category"];
    // $query = "SELECT * from citizens where category='$category'";
    // $table = mysqli_query($dbCon,$query);
    // $arr = array();
    // while($row = mysqli_fetch_array($table)) {
    //     $arr[] = $row;
    // }
    // echo json_encode($arr);
?>