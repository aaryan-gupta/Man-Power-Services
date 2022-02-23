<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easy Work</title>
    <!-- <link rel="stylesheet" href="../Files/bootstrap.min.css"> -->
    <!-- <script src="../Files/jquery-3.5.1.min.js"></script> -->
    <!-- <script src="../Files/bootstrap.min.js"></script> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="../Files/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular.min.js"></script>
    <script>
    $(document).ready(function() {
        $("#btnSignIn").click(function() {
            var uid = $("#txtEmailSignIn").val();
            var pwd = $("#txtPasswordSignIn").val();
            var actionUrl = "../Home Page/ajaxSignIn.php?uid=" + uid + "&pwd=" + pwd;
            $.get(actionUrl, function(response) {
                if (response == "<b>VALID </b>Citizen") {
                    location.href = "../Citizens Dashboard/Citizens-dashboard-final.php";
                } else if (response == "<b>VALID </b>Worker") {
                    location.href = "../Workers Dashboard/Workers-dashboard.php";
                }
                $("#checkSignIn").html(response);
                if (response == "<b>VALID </b>admin") {
                    location.href = "../Admin Dashboard/AdminDashboard.php";
                }
            });
        });
        $("#btnSignUp").click(function() {
            var uid = $("#txtEmailSignUp").val();
            var pwd = $("#txtPasswordSignUp").val();
            var mob = $("#txtNumberSignUp").val();
            if ($("#radTypeCitizen").prop("checked") == true) var rad = $("#radTypeCitizen").val();
            else var rad = $("#radTypeWorker").val();
            var actionUrl = "../Home Page/ajaxSignUp.php?uid=" + uid + "&pwd=" + pwd + "&mobile=" +
                mob +
                "&category=" + rad;
            $.get(actionUrl, function(response) {
                $("#checkSignUp").html(response);
                if (response == "Citizen")
                    location.href = "../Citizens Page/ProfileCitizenFrontSignUp.php";
                else if (response == "Worker") {
                    location.href = "../Workers Page/ProfileWorkerFrontSignUp.php";
                } else {}
            });
        });
        $("#btnForgot").click(function() {
            var uid = $("#txtEmailSignIn").val();
            var actionUrl = "../Home Page/ajaxForgot.php?uid=" + uid;
            $.get(actionUrl, function(response) {
                $("#checkForgot").html(response);
            });
        });
    });
    </script>
    <style>
    .pic {
        height: 500px;
    }

    .cardHeight {
        height: 100%;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <a class="navbar-brand font-weight-bolder font-italic">Easy Work</a>
        <form class="form-inline">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#SignInModal">SignIn</button>
            &nbsp;&nbsp;
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#SignUpModal">SignUp</button>
        </form>
    </nav>
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade mb-2" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../Pics/electrician-2755683__340 - Copy.jpg" class="d-block w-100 img-fluid">
            </div>
            <div class="carousel-item">
                <img src="../Pics/istockphoto-1166082642-170667a.jpg" class="d-block w-100 img-fluid">
            </div>
            <div class="carousel-item">
                <img src="../Pics/istockphoto-1205228815-170667a.jpg" class="d-block w-100 img-fluid">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <h2 align="center" class="bg-dark text-white p-2 font-weight-light">OUR SERVICES</h2>
    <center style="background-color: #d7d7d9">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mt-2 mb-2">
                    <div class="card border border-dark cardHeight">
                        <center>
                            <img src="../Pics/download2.jpg" class="mt-3 img-fluid">
                        </center>
                        <div class="card-body">
                            <h5 class="card-title bg-dark text-white p-1">Worker Search</h5>
                            <p class="card-text text-left">A citizen can search the worker according to the
                                category and can contact him for the work he want the worker to do.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-2 mb-2">
                    <div class="card border border-dark cardHeight">
                        <center>
                            <img src="../Pics/download (1).jpg" class="mt-3 img-fluid">
                        </center>
                        <div class="card-body">
                            <h5 class="card-title bg-dark text-white p-1">Post Requirement</h5>
                            <p class="card-text text-left">If citizen cannot find the relevant worker for his/her
                                problem, he can post the problem/fault so that worker would get to know about the work
                                and contact the citizen if the worker is willing to do.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mt-2 mb-2">
                    <div class="card border border-dark cardHeight">
                        <center>
                            <img src="../Pics/images (1).png" class="mt-3 img-fluid">
                        </center>
                        <div class="card-body">
                            <h5 class="card-title bg-dark text-white p-1">Rate Worker</h5>
                            <p class="card-text text-left">Citizen can rate the worker according to the work the
                                worker has done.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-2 mb-2">
                    <div class="card border border-dark cardHeight">
                        <center>
                            <img src="../Pics/images (2).jpg" height="120" width="200" class="mt-3 img-fluid">
                        </center>
                        <div class="card-body">
                            <h5 class="card-title bg-dark text-white p-1">Get Work</h5>
                            <p class="card-text text-left">Worker can get work according to the requirements posted by
                                the citizen.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>
    <h2 align="center" class="bg-dark text-white p-2 font-weight-light mt-2">About Us</h2>
    <div style="background-color: #d7d7d9" class="p-3">
        <div class="container bg-light">
            <div class="row">
                <div class="col-md-12 mt-3" align="center">
                    <h3 align="center" class="bg-dark text-white p-2 font-weight-light mt-2">Meet the Developer</h3>
                    <div class="row">
                        <div class="col-md-12 mt-3 mb-2">
                            <center>
                                <img src="Pics/20200717_093756.jpg" class="img-fluid">
                            </center>
                        </div>
                        <div class="col-md-12">
                            <center>
                                <table class="table bg-dark text-white table-bordered table-responsive-md">
                                    <tr>
                                        <td><b>NAME</b></td>
                                        <td>Aaryan Gupta</td>
                                    </tr>
                                    <tr>
                                        <td><b>COURSE - BRANCH</b></td>
                                        <td>BE - CSE</td>
                                    </tr>
                                    <tr>
                                        <td><b>UNIVERSITY</b></td>
                                        <td>Chitkara University</td>
                                    </tr>
                                </table>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h6 class="bg-dark text-white p-1 mt-2 mb-0">
        <marquee behavior="alternate">&copy; copyrights reserved</marquee>
    </h6>
    <div class="modal fade" id="SignInModal" tabindex="-1" role="dialog" aria-labelledby="SignInModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="SignInModalLabel">SignIn</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../Home Page/processSignIn.php" method="POST">
                        <div class="form-group">
                            <label for="txtEmailSignIn">User ID</label>
                            <input type="text" class="form-control" id="txtEmailSignIn" name="txtEmailSignIn">
                        </div>
                        <div class="form-group">
                            <label for="txtPasswordSignIn">Password</label>
                            <input type="password" class="form-control" id="txtPasswordSignIn" name="txtPasswordSignIn">
                        </div>
                        <div class="modal-footer">
                            <span id="checkSignIn"></span>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" name="btnSignIn"
                                id="btnSignIn">SignIn</button>
                            <input type="button" class="btn btn-primary" value="Forgot Password" name="btnForgot"
                                id="btnForgot">
                        </div>
                        <span id="checkForgot"></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="SignUpModal" tabindex="-1" role="dialog" aria-labelledby="SignUpModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="SignUpModalLabel">SignUp</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../Home Page/processSignUp.php" method="POST">
                        <div class="form-group">
                            <label for="txtEmailSignUp">User ID</label>
                            <input type="text" class="form-control" id="txtEmailSignUp" name="txtEmailSignUp" required>
                        </div>
                        <div class="form-group">
                            <label for="txtPasswordSignUp">Password</label>
                            <input type="password" class="form-control" id="txtPasswordSignUp" name="txtPasswordSignUp">
                        </div>
                        <div class="form-group">
                            <label for="txtNumberSignUp">Mobile Number</label>
                            <input type="text" class="form-control" id="txtNumberSignUp" name="txtNumberSignUp">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="radio" name="category" id="radTypeCitizen" value="Citizen" required>
                                <label for="radTypeCitizen">Citizen</label>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="radio" name="category" id="radTypeWorker" value="Worker" required>
                                <label for="radTypeWorker">Worker</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div id="checkSignUp"></div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" name="btnSignUp"
                                id="btnSignUp">SignUp</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>