/*
 * Filename: Order.js
 * Contains Frontend Code for displaying all Orders.
 */

(function(){
	var app = angular.module("app", ["ui.bootstrap","ngResource","ngTable","xeditable"]);
	app.run(function(editableOptions) {
		  editableOptions.theme = 'bs3';
		});
	app.controller('OrderGridController', function($scope,NgTableParams,$resource,$http) {
	    var Api = $resource("/orders");
	    $scope.tableParams = new NgTableParams({
	        page: 1,
	        count: 10,
	        sorting: {orderID:'asc'}
	      },{
	      getData: function(params) {
	        return Api.query(params.url()).$promise.then(function(data){
	        	//success callback
	          params.total(data);
	          return data;
	        },function(data){
	        	//redirect callback
	        	window.location.replace("/");
	        });
	      }
	    });
	    $scope.alerts = [];
	    $scope.addAlert = function(alertMessage,alertType) {
	    	$scope.alerts = [];
	    	$scope.alerts.push({type:alertType,msg:alertMessage});
	    	
	    };
	    
	    $scope.closeAlert = function() {
	    	$scope.alerts = [];
	    };
	    
	    $scope.saveData = function(orderColumnData,orderColumnName,orderID){
	    return $http.post('/orders/save', 
	    						{id:orderID, 
	    						 columnData: orderColumnData, 
	    						 columnName:orderColumnName }
	    					).then
	    					(function(response){
	    						//success callback
	    						$scope.addAlert('Order saved','success');
	    					},function(response){
	    						//error callback
	    						if(response.status == '500' || response.status == '400')
	    							$scope.addAlert('Order saving error','danger');
	    						else if(response.status == '401' || response.status == '403' ){
	    							alert("Hello there! You need to login again. ");
	    							window.location.replace("/");
	    						}
	    						else
	    							$scope.addAlert('Unknown error occured','danger');
	    							
	    					});
	    };
	    
	});
})();

