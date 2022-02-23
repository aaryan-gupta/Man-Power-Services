<?php
    include_once("../Files/connection.php");
    $category = $_GET["category"];
    // $city = $_GET["city"];
    // $query = "SELECT * from workers where category='$category' and city='$city'";
    $query = "SELECT * from workers where category='$category'";
    $table = mysqli_query($dbCon,$query);
    // echo $table;
    $arr = array();
    while($row = mysqli_fetch_array($table)) {
        $arr[] = $row;
    }
    echo json_encode($arr);
?>