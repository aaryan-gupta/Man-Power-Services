<?php
    include_once("../Files/connection.php");
    $btn = $_POST["btn"];
    
    if($btn == "Update") {
        $uid = $_POST["txtUid"];
        $email = $_POST["txtEmail"];
        $name = $_POST["txtName"];
        $contact = $_POST["txtNumber"];
        $address = $_POST["txtAddress"];
        $city = $_POST["txtCity"];
        $state = $_POST["selectState"];
        $pincode = $_POST["txtPin"];
        $hdn = $_POST["hdn"];
        $orgName = $_FILES["inputImg"]["name"];
        $tmpName = $_FILES["inputImg"]["tmp_name"];
        if($orgName == "") $fileName = $hdn;
        else $fileName = $orgName;
        move_uploaded_file($tmpName,"Uploads/".$fileName);
        $query = "UPDATE citizens set email='$email',name='$name',contact='$contact',address='$address',city='$city',state='$state',pincode='$pincode',pic='$fileName' where uid='$uid'";
        mysqli_query($dbCon,$query);
        $msg = mysqli_error($dbCon);
        if($msg == "") echo "<h2>RECORD UPDATED SUCCESSFULLY</h2>";
        else $msg;
    }
    else if($btn == "Save") {
        $uid = $_POST["txtUid"];
        $email = $_POST["txtEmail"];
        $name = $_POST["txtName"];
        $contact = $_POST["txtNumber"];
        $address = $_POST["txtAddress"];
        $city = $_POST["txtCity"];
        $state = $_POST["selectState"];
        $pincode = $_POST["txtPin"];
        $hdn = $_POST["hdn"];
        $orgName = $_FILES["inputImg"]["name"];
        $tmpName = $_FILES["inputImg"]["tmp_name"];
        $fileName = $orgName;
        $query = "INSERT into citizens values('$uid','$email','$name','$contact','$address','$city','$state','$pincode','$orgName')";
        mysqli_query($dbCon,$query);
        $err = mysqli_error($dbCon);
        move_uploaded_file($tmpName,"Uploads/".$orgName);
        if($err == "") echo "<h1>Saved Successfully. You can now LOGIN.</h1>";
        else echo $err;
    }
?>