<?php
    session_start();
    if(isset($_SESSION["activeuser"])!=true) header("location:../index.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Worker's Dashboard</title>
    <link rel="stylesheet" href="../Files/bootstrap.min.css">
    <script src="../Files/jquery-3.5.1.min.js"></script>
    <script src="../Files/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        $("#btnRequestRating").click(function() {
            var citizenUid = $("#txtCitizenUid").val();
            var workerUid = $("#txtWorkerUid").val();
            var actionUrl = "ajaxRequestRating.php?citizenuid=" + citizenUid + "&workeruid=" +
                workerUid;
            $.get(actionUrl, function(response) {
                $("#requestRating").html(response);
            });
        });
    });
    </script>
    <style>
    label {
        font-weight: bolder;
        font-style: italic;
    }

    input {
        text-align: center;
    }

    .cardWidth {
        width: 100%;
        height: 100%;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1 ml-5" style="font-style: italic;">WORKERS'S DASHBOARD</span>
        <span>
            <b class="text-white">
                Welcome
            </b>
            <span class="text-white">
                <?php
                    echo $_SESSION["activeuser"];
                ?>
            </span>
        </span>
    </nav>
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-6">
                <button class="btn btn-light cardWidth">
                    <a href="../Workers Page/Profile-workers-front.php" target="_blank">
                        <div class="card border-dark">
                            <center>
                                <img src="../Pics/images1.jpg" class="img-fluid">
                            </center>
                            <div class="card-body">
                                <p class="card-text">
                                    <center>UPDATE PROFILE</center>
                                </p>
                            </div>
                        </div>
                    </a>
                </button>
            </div>
            <div class="col-md-6">
                <button class="btn btn-light cardWidth">
                    <a href="../Citizens Search/CitizenSearchByWorkerFinal.php" target="_blank">
                        <div class="card border-dark">
                            <center>
                                <img src="../Pics/download2.jpg" class="img-fluid">
                            </center>
                            <div class="card-body">
                                <p class="card-text">
                                    <center>CITIZEN SEARCH</center>
                                </p>
                            </div>
                        </div>
                    </a>
                </button>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <button class="btn btn-light cardWidth" type="button" data-toggle="modal" data-target="#exampleModal">
                    <div class="card border-dark">
                        <center>
                            <img src="../Pics/images (1).png" class="img-fluid">
                        </center>
                        <div class="card-body">
                            <p class="card-text">
                                <center>REQUEST RATING</center>
                            </p>
                        </div>
                    </div>
                </button>
            </div>
            <div class="col-md-6">
                <button class="btn btn-light cardWidth">
                    <a href="../Files/Logout.php">
                        <div class="card border-dark">
                            <center>
                                <img src="../Pics/images (3).jpg" class="img-fluid">
                            </center>
                            <div class="card-body">
                                <p class="card-text">
                                    <center>LOGOUT</center>
                                </p>
                            </div>
                        </div>
                    </a>
                </button>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">REQUEST RATING</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="ajaxRequestRating.php" method="POST">
                        <center>
                            <label for="txtWorkerUid">WORKER'S UID</label>
                            <input type="text" name="txtWorkerUid" id="txtWorkerUid" class="form-control" readonly
                                value="<?php echo $_SESSION['activeuser']; ?>">
                            <label for="txtCitizenUid" class="mt-4">CITIZEN'S UID</label>
                            <input type="text" name="txtCitizenUid" id="txtCitizenUid" class="form-control" autofocus>
                        </center>
                    </form>
                    <div class="modal-footer">
                        <span id="requestRating"></span>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btnRequestRating">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>