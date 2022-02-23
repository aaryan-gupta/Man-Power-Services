<?php
    // include_once("../Files/connection.php");
    // // $uid = $_GET["uid"];
    // $query = "SELECT distinct category from citizens";
    // // $query = "SELECT * from workers";
    // $table = mysqli_query($dbCon,$query);
    // $arr = array();
    // while($row = mysqli_fetch_array($table)) {
    //     $arr[] = $row;
    // }
    // echo json_encode($arr);
?>
<?php
    include_once("../Files/connection.php");
    // $uid = $_GET["uid"];
    $query = "SELECT distinct category from requirements";
    // $query = "SELECT * from workers";
    $table = mysqli_query($dbCon,$query);
    $arr = array();
    while($row = mysqli_fetch_array($table)) {
        $arr[] = $row;
    }
    echo json_encode($arr);
?>