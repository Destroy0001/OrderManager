/*
 * Filename: Order.js
 * Contains Frontend Code for displaying all Orders.
 */

(function(){
	var table = angular.module("table", ["ui.bootstrap","ngResource","ngTable","xeditable","chart.js"]);
	table.run(function(editableOptions) {
		  editableOptions.theme = 'bs3';
		});
	table.controller('OrderGridController', function($scope,NgTableParams,$resource,$http) {
	    
		/**
		 * Process to get all orders as per user 
		 **/
		var getAllOrdersApi = $resource("/orders");
	    $scope.tableParams = new NgTableParams({
	        page:1,
	        count:10,
	        total:100,
	        sorting: {orderID:'asc'}
	      },{
	      getData: function(params) {
	        return getAllOrdersApi.query(params.url()).$promise.then(function(data){
	        	//success callback
	          params.total(data.length);
	          return data;
	        },function(data){
	        	//redirect callback
	        	window.location.replace("/");
	        });
	      }
	    });
	    
	    /***
	     * Saving process begins here
	     ***/
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
	    
	    
	    /**
	     * charting code starts here
	     * code for number of orders to date 
	     **/
	    $scope.orderData = []; 
	    $scope.orderLabels = []; 
	    $scope.orderChartOptions = {
	    		  legend:{
	    		      display: false
	    		  },
	    		  scales: {
	    		    xAxes: [{
	    		        gridLines: {
	    		            show: false,
	    		        },
	    		        scaleLabel: {
	    		            display: true,
	    		            labelString: 'Date'
	    		         }
	    		    }],
	    		    yAxes: [{
	    		      ticks: {
	    		        beginAtZero: true,
	    		        max:10,
	    		      },
    		        scaleLabel: {
    		            display: true,
    		            labelString: 'Number of Orders'
    		          }
	    		    }]
	    		 }
	    };
	    		    
	    $http.get("/order-report").then(function(data){
	    		$scope.orderData.push(data.data.sales);
	    		$scope.orderLabels = data.data.dates;
	        }
	    	,function(data){
	    		$scope.addAlert('Error Loading Order Report','danger');
	        });
	    
	    /**
	     * charting code starts here
	     * code for number of orders to date 
	     **/
	    $scope.productData = []; 
	    $scope.productLabels = []; 
	    $scope.productChartOptions = {
	    		  legend:{
	    		      display: false
	    		  },
	    		  scales: {
	    		    xAxes: [{
	    		        gridLines: {
	    		            show: false,
	    		        },
	    		        scaleLabel: {
	    		            display: true,
	    		            labelString: 'Products'
	    		         }
	    		    }],
	    		    yAxes: [{
	    		      ticks: {
	    		        beginAtZero: true,
	    		        max:10,
	    		      },
    		        scaleLabel: {
    		            display: true,
    		            labelString: 'Number of Orders'
    		          }
	    		    }]
	    		 }
	    };
	    
	    $http.get("/product-report").then(function(data){
	    		$scope.productData.push(data.data.sales);
	    		$scope.productLabels = data.data.products;
	        }
	    	,function(data){
	    		$scope.addAlert('Error loading product report','danger');
	        });
	    
	    
	    
	    
	});
	
	
	
	
	
	
})();

