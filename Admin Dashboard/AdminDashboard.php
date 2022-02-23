<?php
    session_start();
    if(isset($_SESSION["activeuser"])==false) header("location:../index.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin's Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular.min.js"></script>
    <script>
    var myModule = angular.module("myModule", []);
    myModule.controller("myController", function($scope, $http) {
        $scope.jsonArray;
        $scope.jsonArraySelected;
        $scope.doFetchAll = function() {
            $http.get("JsonFetchAllUsers.php").then(okFx, notOkFx);

            function okFx(response) {
                // alert(JSON.stringify(response.data));
                $scope.jsonArray = response.data;
                // console.log($scope.jsonArray);
                $scope.selectObject = $scope.jsonArray[-1];
            }

            function notOkFx(response) {
                alert(response.data);
            }
        }
        $scope.doFetchSelected = function() {
            $http.get("JsonFetchSelectedUsers.php?category=" + $scope.selectObject.category).then(okFx,
                notOkFx);

            function okFx(response) {
                // alert(JSON.stringify(response.data));
                $scope.jsonArraySelected = response.data;
            }

            function notOkFx() {
                alert(response.data);
            }
        }
        $scope.storeValues = function(obj) {
            $scope.values = obj;
        }
        $scope.doBlock = function(uid) {
            $http.get("Block.php?uid=" + uid).then(okFx, notOkFx);

            function okFx(response) {
                alert("BLOCKED");
            }

            function notOkFx(error) {
                alert(error);
            }
        }
        $scope.doResume = function(uid) {
            $http.get("Resume.php?uid=" + uid).then(okFx, notOkFx);

            function okFx(response) {
                alert("UNBLOCKED");
            }

            function notOkFx(error) {
                alert(error);
            }
        }
        $scope.doDelete = function(uid) {
            $http.get("Delete.php?uid=" + uid).then(okFx, notOkFx);

            function okFx(response) {
                $scope.doFetchAll();
                $scope.doFetchSelected();
            }

            function notOkFx(error) {
                alert(error);
            }
        }
    });
    </script>
    <style>
    .btnMargin {
        margin: 5%;
    }

    .cardWidth {
        width: 100%;
        height: 100%;
    }
    </style>

</head>

<body ng-app="myModule" ng-controller="myController" ng-init="doFetchAll();">
    <center>
        <nav class="navbar navbar-dark bg-dark">
            <span class="navbar-brand mb-0 h1 ml-5" style="font-style: italic;">ADMIN'S DASHBOARD</span>
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
            <div class="row mt-5">
                <div class="col-md-6">
                    <button class="btn btn-light" type="button" data-toggle="modal" data-target="#exampleModal">
                        <div class="card border-dark">
                            <center><img src="../Pics/images1.jpg" class="img-fluid"></center>
                            <div class="card-body">
                                <p class="card-text">
                                    <center>USERS MANAGER</center>
                                </p>
                            </div>
                        </div>
                    </button>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-light" type="button">
                        <a href="../Files/Logout.php">
                            <div class="card border-dark cardWidth">
                                <center><img src="../Pics/images (3).jpg" class="img-fluid"></center>
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
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Users Manager</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <b>Select Worker or Citizen</b>
                            </div>
                            <div class="form-group col-md-6">
                                <select name="categorySelected" id="categorySelected" class="form-control"
                                    ng-model="selectObject" ng-options="obj.category for obj in jsonArray"
                                    ng-change="doFetchSelected();"></select>
                            </div>
                        </div>
                        <!-- <table border="1" width="100%" style="text-align: center;" ng-repeat="obj in jsonArraySelected"> -->
                        <table border="1" width="100%" style="text-align: center;" class="table table-responsive-lg">
                            <tr>
                                <th>Email ID</th>
                                <th>Mobile</th>
                                <th colspan="3">Actions</th>
                            </tr>
                            <tr ng-repeat="obj in jsonArraySelected">
                                <td id="uid">{{obj.uid}}</td>
                                <td>{{obj.mobile}}</td>
                                <td>
                                    <input type="button" value="Block" class="btn btn-primary btnMargin"
                                        ng-click="doBlock(obj.uid);">
                                </td>
                                <td>
                                    <input type="button" value="Resume" class="btn btn-success btnMargin"
                                        ng-click="doResume(obj.uid);">
                                </td>
                                <td>
                                    <input type="button" value="Delete" class="btn btn-danger btnMargin"
                                        ng-click="doDelete(obj.uid);">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </center>
</body>

<?php session_destroy(); ?>

</html>