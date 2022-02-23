<?php
    session_start();
    if(isset($_SESSION["activeuser"])!=true) header("location:../index.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citizens Search</title>
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
            $http.get("JsonFetchAll.php").then(okFx, notOkFx);

            function okFx(response) {
                // alert(JSON.stringify(response.data));
                $scope.jsonArray = response.data;
                $scope.selectObject = $scope.jsonArray[-1];
            }

            function notOkFx(response) {
                alert(response.data);
            }
        }
        $scope.doFetchSelected = function() {
            // $http.get("JsonFetchSelected.php?category=" + $scope.selectObject.category + "&city=" + $scope
            //     .selectObject.city).then(okFx, notOkFx);
            $http.get("JsonFetchSelected.php?category=" + $scope.selectObject.category).then(okFx, notOkFx);

            function okFx(response) {
                // alert(JSON.stringify(response.data));
                $scope.jsonArraySelected = response.data;
            }

            function notOkFx() {
                alert(response.data);
            }
        }
        $scope.storeValues = function(uid) {
            $http.get("JsonFetchSelectedCitizens.php?uid=" + uid).then(okFx, notOkFx);

            function okFx(response) {
                // alert(JSON.stringify(response.data));
                $scope.jsonArraySelectedCitizen = response.data;
                $scope.values = $scope.jsonArraySelectedCitizen[0];
                // alert($scope.values);
                // alert(response.data);
            }

            function notOkFx(error) {
                alert(error);
            }
        }
    });
    </script>
    <style>
    #cardImage {
        background-color: black;
        color: white;
        border-radius: 25px;
    }

    span {
        font-style: italic;
    }
    </style>
</head>

<body ng-app="myModule" ng-controller="myController" ng-init="doFetchAll();">
    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1 ml-5">SEARCH CITIZEN</span>
        <span class="text-white"><?php echo $_SESSION["activeuser"]; ?></span>
    </nav>
    <br>
    <center>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <label for="selectCategory">
                        <h2>Select Category: </h2>
                    </label>
                </div>
                <div class="col-md-6">
                    <select name="selectCategory" id="selectCategory" ng-model="selectObject"
                        ng-options="obj.category for obj in jsonArray" ng-change="doFetchSelected();"
                        class="btn border-dark"></select>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-md-6">
                    <label for="selectCity">
                        <h2>Select City: </h2>
                    </label>
                </div>
                <div class="col-md-6">
                    <select name="selectCity" id="selectCity" ng-model="selectObject"
                        ng-options="obj.city for obj in jsonArray" ng-change="doFetchSelected();"
                        class="btn border-dark"></select>
                </div>
            </div> -->
            <br>
            <div class="row">
                <div class="col-md-6" ng-repeat="obj in jsonArraySelected">
                    <div class="card bg-dark text-white mt-2 mb-2">
                        <div class="card-body">
                            <p class="card-text">
                                <!-- <table border="2" style="text-align: center;" class="table text-white">
                                    <tr>
                                        <td><b>Problem</b></td>
                                        <td>{{obj.problem}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Location</b></td>
                                        <td>{{obj.location}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Date of Post</b></td>
                                        <td>{{obj.dop}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">VALID FOR NEXT 10 DAYS</td>
                                    </tr>
                                </table> -->
                                <form class="">
                                    <div class="form-row">
                                        <div class="form-group col-md-4" align="left">
                                            <div><b>Problem</b></div>
                                        </div>
                                        <div class="form-group col-md-8" align="right">
                                            <div>{{obj.problem}}</div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4" align="left">
                                            <div><b>Location</b></div>
                                        </div>
                                        <div class="form-group col-md-8" align="right">
                                            <div>{{obj.location}}</div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4" align="left">
                                            <div><b>Date of Post</b></div>
                                        </div>
                                        <div class="form-group col-md-8" align="right">
                                            <div>{{obj.dop}}</div>
                                        </div>
                                    </div>
                                    <div class="form-row text-center col-md-12">
                                        <div class="col-md-12">
                                            VALID FOR NEXT 10 DAYS
                                        </div>
                                    </div>
                                </form>
                            </p>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal" ng-click="storeValues(obj.uid);">
                                More Details
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: black;">Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table border="1" width="100%" style="text-align: center; color: black;">
                                <tr>
                                    <th>Name</th>
                                    <th>Contact Number</th>
                                    <th>Address</th>
                                </tr>
                                <tr>
                                    <td>{{values.name}}</td>
                                    <td>{{values.contact}}</td>
                                    <td>{{values.address}}</td>
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
        </div>
    </center>
</body>

</html>