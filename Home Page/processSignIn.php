<?php
    include_once("../Files/connection.php");
    $uid = $_POST["txtEmailSignIn"];
    $pwd = $_POST["txtPasswordSignIn"];
    $query = "SELECT * from users where uid='$uid' and pwd='$pwd' and status=1";
    $row = mysqli_query($dbCon,$query);
    if(mysqli_num_rows($row)==1) echo "<b>VALID</b>";
    else echo "<b>INVALID</b>";
?>