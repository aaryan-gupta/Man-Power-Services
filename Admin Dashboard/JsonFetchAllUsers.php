<?php
    include_once("../Files/connection.php");
    // $category = $_GET["category"];
    //  $query = "SELECT * from users where category='$category'";
    $query = "SELECT distinct category from users";
    $table = mysqli_query($dbCon,$query);
    $arr = array();
    while($row = mysqli_fetch_array($table)) {
        $arr[] = $row;
    }
    echo json_encode($arr);
?>