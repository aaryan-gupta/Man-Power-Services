<?php
    // include_once("../Files/connection.php");
    // $uid = $_GET["uid"];
    // $pwd = $_GET["pwd"];
    // $query = "SELECT * from users where uid='$uid' AND pwd='$pwd' and status=1";
    // $row = mysqli_query($dbCon,$query);
    // if(mysqli_num_rows($row)==1) echo "<b>VALID</b>";
    // else echo "<b>INVALID</b>";

    // session_start();
    // include_once("../Files/connection.php");
    // $uid = $_GET["uid"];
    // $pwd = $_GET["pwd"];
    // $query = "SELECT * from users where uid='$uid' AND pwd='$pwd'";
    // $row = mysqli_query($dbCon,$query);
    // if(mysqli_num_rows($row)==1) {
    //     $q = "SELECT * from users where uid='$uid' AND pwd='$pwd' AND status=1";
    //     $r = mysqli_query($dbCon,$q);
    //     if(mysqli_num_rows($r)==1)
    //     {
    //         // echo "<b>VALID</b>";
    //         $c = mysqli_fetch_array($r);
    //         $category = $c["category"];
    //         echo "<b>VALID </b>$category";
    //         $_SESSION["activeuser"] = $uid;
    //     }
    //     else echo "<b>THIS ACCOUNT IS BLOCKED</b>";
    // }
    // else echo "<b>INVALID</b>";

    session_start();
    include_once("../Files/connection.php");
    $uid = $_GET["uid"];
    $pwd = $_GET["pwd"];
    $query = "SELECT * from users where uid='$uid' AND pwd='$pwd'";
    $row = mysqli_query($dbCon,$query);
    if(mysqli_num_rows($row)==1) {
        $q = "SELECT * from users where uid='$uid' AND pwd='$pwd' AND status=1";
        $r = mysqli_query($dbCon,$q);
        if(mysqli_num_rows($r)==1)
        {
            // echo "<b>VALID</b>";
            $c = mysqli_fetch_array($r);
            $category = $c["category"];
            echo "<b>VALID </b>$category";
            $_SESSION["activeuser"] = $uid;
            if($uid == "admin") echo $uid;
        }
        else echo "<b>THIS ACCOUNT IS BLOCKED</b>";
    }
    else echo "<b>INVALID</b>";
?>