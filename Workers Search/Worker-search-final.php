<?php
    session_start();
    if(isset($_SESSION["activeuser"])!=true) header("location:../index.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Worker Search</title>
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
                // console.log(JSON.stringify(response.data));
                $scope.jsonArraySelected = response.data;
            }

            function notOkFx() {
                alert(response.data);
            }
        }
        $scope.storeValues = function(obj) {
            $scope.values = obj;
        }
    });
    </script>
    <style>
    img {
        border-radius: 35px;
        padding: 20px;
    }

    #cardImage {
        background-color: black;
        color: white;
        border-radius: 25px;
    }
    </style>
</head>

<body ng-app="myModule" ng-controller="myController" ng-init="doFetchAll();">
    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1 ml-5" style="font-style: italic;">SEARCH WORKER</span>
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
            <br>
            <div class="row">
                <div class="col-md-3" ng-repeat="obj in jsonArraySelected">
                    <div class="card" id="cardImage">
                        <img src="../Workers Page/Uploads/{{obj.profile}}">
                        <div class="card-body">
                            <h5 class="card-title">
                                NAME: {{obj.name}}
                            </h5>
                            <p class="card-text">
                                <span> Experience: </span> {{obj.exp}} years
                            </p>
                            <p class="card-text">
                                <span> Specialization: </span> {{obj.spl}}
                            </p>
                            <p class="card-text">
                                <span> Rating: </span> {{(obj.total/obj.count) | number:2}}
                            </p>
                            <button type="button" class="btn btn-primary" ng-click="storeValues(obj)"
                                data-toggle="modal" data-target="#exampleModal">
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
                            <h5 class="modal-title" id="exampleModalLabel" style="color: black;">
                                Details
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="color: black;">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-3"><b>Name</b></div>
                                    <div class="form-group col-md-9">
                                        <span class="form-control">{{values.name}}</span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3"><b>Email</b></div>
                                    <div class="form-group col-md-9">
                                        <span class="form-control">{{values.email}}</span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3"><b>Mobile</b></div>
                                    <div class="form-group col-md-9">
                                        <span class="form-control">{{values.contact}}</span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3"><b>Firm/Shop</b></div>
                                    <div class="form-group col-md-9">
                                        <span class="form-control">{{values.firmshop}}</span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </center>
</body>

</html>