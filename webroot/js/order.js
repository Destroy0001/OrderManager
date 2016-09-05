/*
 * Filename: Order.js
 * Contains Frontend Code for displaying all Orders.
 */
var app = angular.module("app", ["ui.bootstrap","ngResource","ngTable"]);
(function(){
	app.controller('OrderGridController', function($scope, NgTableParams, $resource) {
	    var Api = $resource("/orders");
	    $scope.tableParams = new NgTableParams({
	        page: 1,
	        count: 10,
	        sorting: {orderID:'asc'}
	      },{
	      getData: function(params) {
	        return Api.query(params.url()).$promise.then(function(data) {
	          params.total(data);
	          return data;
	        });
	      }
	    });
	});
})();

