<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citizen's Profile</title>
    <link rel="stylesheet" href="../Files/bootstrap.min.css">
    <script src="../Files/jquery-3.5.1.min.js"></script>
    <script src="../Files/bootstrap.min.js"></script>
    <script>
    function showpreview(file) {
        if (file.files && file.files[0]) {
            var reader = new FileReader();
            reader.onload = function(ev) {
                $("#preview").attr("src", ev.target.result);
            }
            reader.readAsDataURL(file.files[0]);
        }
    }
    $(document).ready(function() {
        $("#btnFetch").click(function() {
            var uid = $("#txtUid").val();
            var url = "fetchJson.php?uid=" + uid;
            $.getJSON(url, function(jsonaryresult) {
                // alert(JSON.stringify(jsonaryresult));
                if (jsonaryresult.length == 0) alert("INVALID ID");
                else {
                    $("#txtEmail").val(jsonaryresult[0].email);
                    $("#txtName").val(jsonaryresult[0].name);
                    $("#txtNumber").val(jsonaryresult[0].contact);
                    $("#txtAddress").val(jsonaryresult[0].address);
                    $("#txtCity").val(jsonaryresult[0].city);
                    $("#selectState").val(jsonaryresult[0].state);
                    $("#txtPin").val(jsonaryresult[0].pincode);
                    // $("#preview").attr("src", "Uploads/" + jsonaryresult[0].pic);
                    $("#inputImg").attr("src", "Uploads/" + jsonaryresult[0].pic);
                    $("#hdn").val(jsonaryresult[0].pic);
                }
            });
        });
    });
    </script>
    <style>
    body {
        background-image: url(../Pics/aa.jpg);
        background-repeat: no-repeat;
        background-size: cover;
    }

    label {
        font-weight: bolder;
        font-style: italic;
    }

    input {
        text-align: center;
    }

    #preview {
        width: 150px;
        height: 150px;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1 ml-5" style="font-style: italic;">CITIZEN'S PROFILE</span>
        <!-- <span class="text-white"><?php echo $_SESSION["activeuser"]; ?></span> -->
    </nav>
    <div class="container">
        <form action="process.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="hdn" id="hdn">
            <div class="form-row mt-5">
                <div class="form-group col-md-4">
                    <center><label for="txtUid">USER ID</label></center>
                    <input type="text" name="txtUid" id="txtUid" class="form-control"
                        placeholder="ID that you entered in the SIGNUP Form" required>
                </div>
                <div class="form-group col-md-4">
                    <center><label for="txtEmail">E-MAIL</label></center>
                    <input type="text" name="txtEmail" id="txtEmail" class="form-control" required
                        pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$">
                </div>
                <div class="form-group col-md-4">
                    <center><label for="txtName">NAME</label></center>
                    <input type="text" name="txtName" id="txtName" class="form-control" required>
                </div>
            </div>
            <div class="form-row mt-4">
                <div class="form-group col-md-4">
                    <center><label for="txtNumber">CONTACT NUMBER</label></center>
                    <input type="text" name="txtNumber" id="txtNumber" class="form-control" required
                        pattern="^[6-9]{1}[0-9]{9}$">
                </div>
                <div class="form-group col-md-8">
                    <center><label for="txtAddress">ADDRESS</label></center>
                    <input type="text" name="txtAddress" id="txtAddress" class="form-control" required>
                </div>
            </div>
            <div class="form-row mt-4">
                <div class="form-group col-md-4">
                    <center><label for="txtCity">CITY</label></center>
                    <input type="text" name="txtCity" id="txtCity" class="form-control" required>
                </div>
                <div class="form-group col-md-4">
                    <center><label for="selectState">STATE</label></center>
                    <select id="selectState" name="selectState" class="form-control" required>
                        <option></option>
                        <option>Andaman and Nicobar Islands (UT)</option>
                        <option>Arunachal Pradesh</option>
                        <option>Assam</option>
                        <option>Bihar</option>
                        <option>Chandigarh (UT)</option>
                        <option>Chhattisgarh</option>
                        <option>Dadra and Nagar Haveli (UT)</option>
                        <option>Daman and Diu (UT)</option>
                        <option>Goa</option>
                        <option>Gujarat</option>
                        <option>Haryana</option>
                        <option>Himachal Pradesh</option>
                        <option>Jammu and Kashmir (UT)</option>
                        <option>Jharkhand</option>
                        <option>Karnataka</option>
                        <option>Kerala</option>
                        <option>Ladakh (UT)</option>
                        <option>Lakshadweep</option>
                        <option>Madhya Pradesh</option>
                        <option>Maharashtra</option>
                        <option>Manipur</option>
                        <option>Meghalaya</option>
                        <option>Mizoram</option>
                        <option>Nagaland</option>
                        <option>National Capital Territory of Delhi</option>
                        <option>Odisha</option>
                        <option>Puducherry (UT)</option>
                        <option>Punjab</option>
                        <option>Rajasthan</option>
                        <option>Sikkim</option>
                        <option>Tamil Nadu</option>
                        <option>Telangana</option>
                        <option>Tripura</option>
                        <option>Uttar Pradesh</option>
                        <option>Uttarakhand</option>
                        <option>West Bengal</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <center><label for="txtPin">PINCODE</label></center>
                    <input type="text" name="txtPin" id="txtPin" class="form-control" required
                        pattern="^[1-9]{3}[0-1]{2}[0-9]{1}$">
                </div>
            </div>
            <div class="form-row mt-4">
                <div class="form-group col-md-6">
                    <center><label for="inputImg">UPLOAD YOUR PROFILE PICTURE</label></center>
                    <input type="file" name="inputImg" id="inputImg" class="form-control" onchange="showpreview(this);"
                        required>
                </div>
                <div class="form-group col-md-6">
                    <center>
                        <label for="preview">PREVIEW OF UPLOADED PICTURE</label>
                        <img src="../Pics/images.jpg" alt="" class="form-control" id="preview">
                    </center>
                </div>
            </div>
            <center class="mt-4">
                <!-- <input type="button" value="Fetch" id="btnFetch" class="btn btn-dark"> -->
                <input type="submit" class="btn btn-dark" value="Save" name="btn">
                <!-- <input type="submit" class="btn btn-dark" value="Update" name="btn"> -->
            </center>
        </form>
    </div>
</body>

</html>