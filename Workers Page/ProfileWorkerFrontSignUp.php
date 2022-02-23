<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Worker's Profile</title>
    <link rel="stylesheet" href="../Files/bootstrap.min.css">
    <script src="../Files/jquery-3.5.1.min.js"></script>
    <script src="../Files/bootstrap.min.js"></script>
    <script>
    function showpreviewAadhar(file) {
        if (file.files && file.files[0]) {
            var reader = new FileReader();
            reader.onload = function(ev) {
                $("#prevAadhar").attr("src", ev.target.result);
            }
            reader.readAsDataURL(file.files[0]);
        }
    }

    function showpreviewProfile(file) {
        if (file.files && file.files[0]) {
            var reader = new FileReader();
            reader.onload = function(ev) {
                $("#prevProfile").attr("src", ev.target.result);
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
                    $("#txtFirm").val(jsonaryresult[0].firmshop);
                    $("#txtAddress").val(jsonaryresult[0].address);
                    $("#txtCity").val(jsonaryresult[0].city);
                    $("#selectState").val(jsonaryresult[0].state);
                    $("#txtPin").val(jsonaryresult[0].pincode);
                    $("#selectCategory").val(jsonaryresult[0].category);
                    $("#txtSpecialization").val(jsonaryresult[0].spl);
                    $("#txtExp").val(jsonaryresult[0].exp);
                    $("#txtInfo").val(jsonaryresult[0].otherinfo);
                    $("#prevAadhar").attr("src", "Uploads/" + jsonaryresult[0].aadhar);
                    $("#prevProfile").attr("src", "Uploads/" + jsonaryresult[0].profile);
                    $("#hdnAadhar").val(jsonaryresult[0].aadhar);
                    $("#hdnProfile").val(jsonaryresult[0].profile);
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

    #prevProfile,
    #prevAadhar {
        height: 70px;
        width: 100px;
    }

    label {
        font-weight: bolder;
        font-style: italic;
    }

    input {
        text-align: center;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1 ml-5" style="font-style: italic;">WORKER'S PROFILE</span>
        <!-- <span class="text-white"><?php echo $_SESSION["activeuser"]; ?></span> -->
    </nav>
    <div class="container">
        <form action="process.php" method="POST" enctype="multipart/form-data" id="workersProfileForm">
            <input type="hidden" name="hdnAadhar" id="hdnAadhar">
            <input type="hidden" name="hdnProfile" id="hdnProfile">
            <div class="form-row mt-3">
                <div class="form-group col-md-4">
                    <center><label for="txtUid">USER ID</label></center>
                    <input type="text" class="form-control" id="txtUid" name="txtUid"
                        placeholder="ID that you entered in the SIGNUP Form" required>
                </div>
                <div class="form-group col-md-4">
                    <center><label for="txtEmail">E-MAIL</label></center>
                    <input type="email" class="form-control" id="txtEmail" name="txtEmail" required
                        pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$">
                </div>
                <div class="form-group col-md-4">
                    <center><label for="txtName">NAME</label></center>
                    <input type="text" class="form-control" id="txtName" name="txtName" required>
                </div>
            </div>
            <div class="form-row mt-2">
                <div class="form-group col-md-3">
                    <center><label for="txtNumber">CONTACT NUMBER</label></center>
                    <input type="text" class="form-control" id="txtNumber" name="txtNumber" pattern="^[6-9]{1}[0-9]{9}$"
                        required>
                </div>
                <div class="form-group col-md-3">
                    <center><label for="selectCategory">CATEGORY</label></center>
                    <select name="selectCategory" id="selectCategory" class="form-control" required>
                        <option></option>
                        <option>AC Service</option>
                        <option>Carpenter</option>
                        <option>Electrician</option>
                        <option>Mechanic</option>
                        <option>Painter</option>
                        <option>Plumber</option>
                        <option>Refrigerator Repair</option>
                        <option>RO Service/Repair</option>
                        <option>Washing Machine Repair</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <center><label for="txtSpecialization">SPECIALIZATION</label></center>
                    <input type="text" name="txtSpecialization" id="txtSpecialization" class="form-control" required>
                </div>
            </div>
            <div class="form-row mt-2">
                <div class="form-group col-md-3">
                    <center><label for="txtExp">EXPERIENCE IN YEARS</label></center>
                    <input type="number" name="txtExp" id="txtExp" class="form-control" required>
                </div>
                <div class="form-group col-md-4">
                    <center><label for="txtFirm">FIRM/SHOP NAME</label></center>
                    <input type="text" class="form-control" name="txtFirm" id="txtFirm" required>
                </div>
                <div class="form-group col-md-5">
                    <center><label for="txtAddress">FIRM/SHOP ADDRESS</label></center>
                    <input class="form-control" name="txtAddress" id="txtAddress" required>
                </div>
            </div>
            <div class="form-row mt-2">
                <div class="form-group col-md-3">
                    <center><label for="txtCity">CITY</label></center>
                    <input type="text" class="form-control" id="txtCity" name="txtCity" required>
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
                <div class="form-group col-md-2">
                    <center><label for="txtPin">PINCODE</label></center>
                    <input type="text" class="form-control" id="txtPin" name="txtPin"
                        pattern="^[1-9]{3}[0-1]{2}[0-9]{1}$" required>
                </div>
                <div class="form-group col-md-3">
                    <center><label for="txtInfo">OTHER INFORMATION</label></center>
                    <textarea name="txtInfo" id="txtInfo" cols="30" rows="1" class="form-control" required></textarea>
                </div>
            </div>
            <div class="form-row mt-2">
                <div class="form-group col-md-6">
                    <center>
                        <label for="picAadhar">UPLOAD YOUR AADHAR</label>
                        <input type="file" class="form-control" id="picAadhar" name="picAadhar"
                            onchange="showpreviewAadhar(this);" required>
                    </center>
                </div>
                <div class="form-group col-md-6">
                    <center>
                        <label for="prevAadhar">PREVIEW OF UPLOADED AADHAR</label>
                        <img src="../Pics/images.jpg" class="form-control" id="prevAadhar">
                    </center>
                </div>
            </div>
            <div class="form-row mt-2">
                <div class="form-group col-md-6">
                    <center>
                        <label for="picProfile">UPLOAD YOUR PROFILE PICTURE</label>
                        <input type="file" class="form-control" id="picProfile" name="picProfile"
                            onchange="showpreviewProfile(this);" required>
                    </center>
                </div>
                <div class="form-group col-md-6">
                    <center>
                        <label for="prevProfile">PREVIEW OF UPLOADED PROFILE PICTURE</label>
                        <img src="../Pics/images.jpg" class="form-control" id="prevProfile">
                    </center>
                </div>
            </div>
            <center class="mt-2">
                <!-- <input type="button" value="Fetch" class="btn btn-dark" id="btnFetch"> -->
                <input type="submit" value="Save" class="btn btn-dark" name="btn">
                <!-- <input type="button" value="Save" class="btn btn-dark" name="btn" id="btnSave"> -->
                <!-- <input type="submit" value="Update" class="btn btn-dark" name="btn"> -->
                <!-- <input type="button" value="Update" class="btn btn-dark" name="btn" id="btnUpdate"> -->
                <!-- <br>
                <span id="result"></span> -->
            </center>
        </form>
    </div>
</body>

</html>