<?php
    include_once("../Files/connection.php");
    $btn = $_POST["btn"];
    if($btn == "Save") {
        $uid = $_POST["txtUid"];
        $email = $_POST["txtEmail"];
        $name = $_POST["txtName"];
        $contact = $_POST["txtNumber"];
        $firmshop = $_POST["txtFirm"];
        $address = $_POST["txtAddress"];
        $city = $_POST["txtCity"];
        $state = $_POST["selectState"];
        $pincode = $_POST["txtPin"];
        $category = $_POST["selectCategory"];
        $spl = $_POST["txtSpecialization"];
        $exp = $_POST["txtExp"];
        $otherinfo = $_POST["txtInfo"];
        $hdnAadhar = $_POST["hdnAadhar"];
        $hdnProfile = $_POST["hdnProfile"];
        $orgNameAadhar = $_FILES["picAadhar"]["name"];
        $tmpNameAadhar = $_FILES["picAadhar"]["tmp_name"];
        $orgNameProfile = $_FILES["picProfile"]["name"];
        $tmpNameProfile = $_FILES["picProfile"]["tmp_name"];
        if($orgNameAadhar == "") $fileNameAadhar = $hdnAadhar;
        else {
            $fileNameAadhar = $orgNameAadhar;
            move_uploaded_file($tmpNameAadhar,"Uploads/".$orgNameAadhar);
        }
        if($orgNameProfile == "") $fileNameProfile = $hdnProfile;
        else {
            $fileNameProfile = $orgNameProfile;
            move_uploaded_file($tmpNameProfile,"Uploads/".$orgNameProfile);
        }
        // $query = "INSERT into workers values('$uid','$email','$name','$contact','$firmshop','$address','$city','$state','$pincode','$category','$spl','$exp','$otherinfo','$fileNameAadhar','$fileNameProfile',0,1)";
        // mysqli_query($dbCon,$query);
        $query = "INSERT into workers values('$uid','$email','$name','$contact','$firmshop','$address','$city','$state','$pincode','$category','$spl','$exp','$otherinfo','$orgNameAadhar','$orgNameProfile',0,1)";
        mysqli_query($dbCon,$query);
        $err = mysqli_error($dbCon);
        if($err == "") echo "<h1>Saved Successfully. You can now LOGIN.</h1>";
        else echo $err;
    }
    elseif($btn == "Update") {
        $uid = $_POST["txtUid"];
        $email = $_POST["txtEmail"];
        $name = $_POST["txtName"];
        $contact = $_POST["txtNumber"];
        $firmshop = $_POST["txtFirm"];
        $address = $_POST["txtAddress"];
        $city = $_POST["txtCity"];
        $state = $_POST["selectState"];
        $pincode = $_POST["txtPin"];
        $category = $_POST["selectCategory"];
        $spl = $_POST["txtSpecialization"];
        $exp = $_POST["txtExp"];
        $otherinfo = $_POST["txtInfo"];
        $hdnAadhar = $_POST["hdnAadhar"];
        $hdnProfile = $_POST["hdnProfile"];
        $orgNameAadhar = $_FILES["picAadhar"]["name"];
        $tmpNameAadhar = $_FILES["picAadhar"]["tmp_name"];
        $orgNameProfile = $_FILES["picProfile"]["name"];
        $tmpNameProfile = $_FILES["picProfile"]["tmp_name"];
        if($orgNameAadhar == "") $fileNameAadhar = $hdnAadhar;
        else {
            $fileNameAadhar = $orgNameAadhar;
            move_uploaded_file($tmpNameAadhar,"Uploads/".$orgNameAadhar);
        }
        if($orgNameProfile == "") $fileNameProfile = $hdnProfile;
        else {
            $fileNameProfile = $orgNameProfile;
            move_uploaded_file($tmpNameProfile,"Uploads/".$orgNameProfile);
        }
        // $query = "UPDATE workers set email='$email',name='$name',contact='$contact',firmshop='$firmshop',address='$address',city='$city',state='$state',pincode='$pincode',category='$category',spl='$spl',exp='$exp',otherinfo='$otherinfo',aadhar='$fileNameAadhar',profile='$fileNameProfile' where uid='$uid'";
        $query = "UPDATE workers set email='$email',name='$name',contact='$contact',firmshop='$firmshop',address='$address',city='$city',state='$state',pincode='$pincode',category='$category',spl='$spl',exp='$exp',otherinfo='$otherinfo',aadhar='$orgNameAadhar',profile='$orgNameProfile' where uid='$uid'";
        mysqli_query($dbCon,$query);
        $msg = mysqli_error($dbCon);
        if($msg == "") echo "<h2>RECORD UPDATED SUCCESSFULLY</h2>";
        else $msg;
    }
?>