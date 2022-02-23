<?php
    session_start();
    if(isset($_SESSION["activeuser"])==false) header("location:../index.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citizen's Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
    <script src="../Files/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular.min.js"></script>
    <script>
    $(document).ready(function() {
        $("#btnPostWork").click(function() {
            var uid = $("#txtUid").val();
            var category = $("#selectCategory").val();
            var problem = $("#txtFault").val();
            var location = $("#txtLocation").val();
            var city = $("#txtCity").val();
            var actionUrl = "ajaxPostWork.php?uid=" + uid + "&category=" + category + "&problem=" +
                problem + "&location=" + location + "&city=" + city;
            $.get(actionUrl, function(response) {
                $("#postWork").html(response);
            });
        });
    });

    var myModule = angular.module("myModule", []);
    myModule.controller("myController", function($scope, $http) {
        $scope.doFetchAll = function() {
            // var uid = $("#txtPostUid").val();
            var uid = $("#txtUid").val();
            var url = "FetchRequirements.php?uid=" + uid;
            $http.get(url).then(okFx, notOkFx);

            function okFx(response) {
                // alert(JSON.stringify(response.data));
                $scope.jsonArray = response.data;
                // $scope.selectObject = $scope.jsonArray[-1];
            }

            function notOkFx(response) {
                alert(response.data);
            }
        }
        $scope.doDeletePost = function(rid) {
            var actionUrl = "AjaxDeletePost.php?rid=" + rid;
            // $http.get(actionUrl);
            $http.get(actionUrl).then(okFx, notOkFx);

            function okFx(response) {
                alert(response.data);
            }

            function notOkFx(err) {
                alert(err);
            }
            $scope.doFetchAll();
        }
        $scope.doFetchPendingRatings = function() {
            var uid = $("#txtUid").val();
            $http.get("FetchPendingRequests.php?uid=" + uid).then(okFx, notOkFx);

            function okFx(response) {
                // alert(response);
                // console.log(response);
                $scope.jsonArrayRatings = response.data;
                // console.log($scope.jsonArrayRatings);
                // console.log(response.data);
            }

            function notOkFx(err) {
                // alert(err);
                // console.log(err);
            }
        }

        $scope.Rating = function() {
            var rate = $("#rangeRating").val();
            var workeruid = $("#obj2WorkerUid").html();
            $http.get("RatingValue.php?uid=" + workeruid + "&rate=" + rate).then(okFx,
                notOkFx);

            function okFx(response) {
                alert("You rated: " + rate);
                // console.log(response);
            }

            function notOkFx(err) {
                // alert(err);
                console.log(err);
            }
            $scope.deleteRatingRequests();
            $scope.doFetchPendingRatings();
        }

        $scope.deleteRatingRequests = function() {
            var rid = $("#obj2Rid").html();
            $http.get("DeleteRatingRequests.php?rid=" + rid).then(okFx, notOkFx);

            function okFx(response) {
                // alert(response);
                console.log(response);
                $scope.doFetchPendingRatings();
            }

            function notOkFx(err) {
                console.log(err);
            }
        }
    });
    </script>
    <style>
    /* img {
        border-radius: 100%;
    } */

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

<body ng-app="myModule" ng-controller="myController">
    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1 ml-5" style="font-style: italic;">CITIZEN'S DASHBOARD</span>
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
    <br>
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-4">
                <button class="btn btn-light cardWidth">
                    <a href="../Citizens Page/Profile-citizen-front.php" target="_blank">
                        <div class="card border-dark">
                            <center><img src="../Pics/images1.jpg" class="img-fluid"></center>
                            <div class="card-body">
                                <p class="card-text">
                                    <center>UPDATE PROFILE</center>
                                </p>
                            </div>
                        </div>
                    </a>
                </button>
            </div>
            <div class="col-md-4">
                <button class="btn btn-light cardWidth" type="button" data-toggle="modal" data-target="#exampleModal">
                    <div class="card border-dark">
                        <center><img src="../Pics/download (1).jpg" class="img-fluid"></center>
                        <div class="card-body">
                            <p class="card-text">
                                <center>POST REQUIREMENT</center>
                            </p>
                        </div>
                    </div>
                </button>
            </div>
            <div class="col-md-4">
                <button class="btn btn-light cardWidth">
                    <a href="../Workers Search/Worker-search-final.php" target="_blank">
                        <div class="card border-dark">
                            <center><img src="../Pics/download2.jpg" class="img-fluid">
                            </center>
                            <div class="card-body">
                                <p class="card-text">
                                    <center>SEARCH WORKER</center>
                                </p>
                            </div>
                        </div>
                    </a>
                </button>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-4">
                <button class="btn btn-light cardWidth" type="button" data-toggle="modal" data-target="#exampleModalRW">
                    <div class="card border-dark" height="100%">
                        <center><img src="../Pics/images (1).png" class="img-fluid"></center>
                        <div class="card-body">
                            <p class="card-text">
                                <center>RATE THE WORKER</center>
                            </p>
                        </div>
                    </div>
                </button>
            </div>
            <div class="col-md-4">
                <button class="btn btn-light cardWidth" type="button" data-toggle="modal" data-target="#exampleModalRM">
                    <div class="card border-dark">
                        <center><img src="../Pics/download (2).jpg" class="img-fluid"></center>
                        <div class="card-body">
                            <p class="card-text">
                                <center>REQUIREMENT MANAGER</center>
                            </p>
                        </div>
                    </div>
                </button>
            </div>

            <div class="col-md-4">
                <button class="btn btn-light cardWidth">
                    <a href="../Files/Logout.php">
                        <div class="card border-dark">
                            <center><img src="../Pics/images (3).jpg" class="img-fluid">
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
    <br>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Post Requirement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="ajaxPostWork.php" method="POST">
                        <center>
                            <label for="txtUid">USER ID</label>
                            <input type="text" name="txtUid" id="txtUid" class="form-control" readonly
                                value="<?php echo $_SESSION['activeuser']; ?>">
                            <label for="selectCategory" class="mt-4">CATEGORY</label>
                            <select name="selectCategory" id="selectCategory" class="form-control">
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
                            <label for="txtFault" class="mt-4">WHAT'S THE PROBLEM/FAULT</label>
                            <input type="text" name="txtFault" id="txtFault" class="form-control">
                            <label for="txtLocation" class="mt-4">LOCATION OF TASK</label>
                            <input type="text" name="txtLocation" id="txtLocation" class="form-control">
                            <label for="txtCity" class="mt-4">CITY</label>
                            <input type="text" name="txtCity" id="txtCity" class="form-control">
                        </center>
                    </form>
                </div>
                <div class="modal-footer">
                    <span id="postWork"></span>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btnPostWork">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModalRM">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Requirement Manager</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <center>
                        <input type="button" class="btn btn-primary" ng-click="doFetchAll();"
                            value="Fetch Requirements">
                    </center>
                    <!-- </div>
                    </div> -->
                    <table border="1" width="100%" style="text-align: center;" class="mt-4 table table-responsive-lg">
                        <tr>
                            <th>Category</th>
                            <th>Problem</th>
                            <th>Location</th>
                            <th>City</th>
                            <th>Date of Post</th>
                            <th>Delete</th>
                        </tr>
                        <tr ng-repeat="obj in jsonArray">
                            <td id="fetchCategory">{{obj.category}}</td>
                            <td id="fetchFault">{{obj.problem}}</td>
                            <td id="fetchLocation">{{obj.location}}</td>
                            <td id="fetchCity">{{obj.city}}</td>
                            <td id="fetchDate">{{obj.dop}}</td>
                            <td style="padding: 10px;">
                                <input type="button" class="btn btn-primary" value="Detete"
                                    ng-click="doDeletePost(obj.rid);">
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModalRW">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" align="center">
                    <input type="button" value="Get all pending Ratings" class="btn btn-primary"
                        ng-click="doFetchPendingRatings();">
                    <table border="1" width="100%" style="text-align: center;" class="mt-4 table table-responsive-lg">
                        <tr>
                            <th>R ID</th>
                            <th>Worker's ID</th>
                            <th>Your Rating</th>
                            <th>Submit Rating</th>
                        </tr>
                        <tr ng-repeat="obj2 in jsonArrayRatings">
                            <td id="obj2Rid">{{obj2.rid}}</td>
                            <td id="obj2WorkerUid">{{obj2.workeruid}}</td>
                            <td>
                                MIN = 1
                                <input type="range" name="rangeRating" id="rangeRating" max="5" min="1"
                                    class="ml-2 mr-2">
                                MAX = 5
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary" ng-click="Rating();">
                                    Save
                                </button>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>