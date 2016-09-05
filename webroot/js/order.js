/*
 * Filename: Order.js
 * Contains Frontend Code for displaying all Orders.
 */
var app = angular.module("app", ["xeditable", "ui.bootstrap"]);
app.controller('OrderGridController', function($scope, $filter, $http) {
  $scope.orders = [];
  $scope.loadOrders = function() {
	  $http.get('/orders').success(function(data) {
      $scope.orders = data;
		setTimeout(function(){
			$scope.$apply();
		});
    });
  };
});


app.run(function(editableOptions) {
	  editableOptions.theme = 'bs3';
});