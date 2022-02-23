<?php
    include_once("../Files/connection.php");
    include_once("../SMS/SMS_OK_sms.php");
    $uid = $_GET["uid"];
    $query = "SELECT * from users where uid='$uid'";
    $row = mysqli_query($dbCon, $query);
    // echo (mysqli_num_rows($row));
    if(mysqli_num_rows($row)==1) {
        $mob = mysqli_fetch_array($row);
        // echo (mysqli_fetch_array($row));
        $mobile = $mob["mobile"];
        // $mobile = "9560843290";
        // $mobile = "9532437525";
        $pwd = $mob["pwd"];
        $msg = "Your Login Password is: ".$pwd;
        $msgSent = SendSMS($mobile,$msg);
        echo $msgSent;
        // echo ("<br><b>Password sent to </b>");
        // echo $mobile;
        // echo("<br><b>Password is: </b>");   
        // echo $pwd;
    }
    // echo (mysqli_error($dbCon));
?>