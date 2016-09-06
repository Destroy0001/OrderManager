<?php
/**
 * home page of the application with login form. 
 * Author: Ashish Jhanwar
 **/
$this->layout = false;
?>

<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            OrderManager! Manage your Ecommerce with ease!
        </title>
        <!--- all css files --->
        <?= $this->Html->css('bootstrap.min') ?>
        <?= $this->Html->css('xeditable') ?>
        <?= $this->Html->css('ng-table.min') ?>
        <?= $this->Html->css('main') ?>
        
        
        <!-- all js files --->
        <?= $this->Html->script('jquery.min.js') ?>
        <?= $this->Html->script('angular.min') ?>
        <?= $this->Html->script('angular-resource.min') ?>
        <?= $this->Html->script('angular-animate') ?>
        <?= $this->Html->script('angular-sanitize') ?>
        <?= $this->Html->script('ui-bootstrap.min') ?>
        <?= $this->Html->script('ui-bootstrap-tpls-2.1.3') ?>
        <?= $this->Html->script('xeditable') ?>
        <?= $this->Html->script('ng-table')?>
        <?= $this->Html->script('moment.min') ?>
        <?= $this->Html->script('Chart.bundle.min') ?>
        <?= $this->Html->script('angular-chart') ?>
        <?= $this->Html->script('order') ?>
    </head>
    <body class="home" ng-app="table">
        <div class="jumbotron" >
           <h1>Welcome to OrderManager!</h1> 
           <p>Manager all your sales in one place.</p> 
           <hr/>
           
           <a href="/logout" class="btn btn-default"> Log Out</a>
           
           <hr/> 
           
            <!--- Template for alerts--->
            <script type="text/ng-template" id="alert.html">
                    <div ng-transclude></div>
            </script>
           <div  ng-controller="OrderGridController"   >
             
              <uib-tabset active="0" justified="true" >
                  <uib-tab index="0" heading="All Orders">
                  
                   <!--- Alerts for data saving in the table --->  
                  <div uib-alert template-url="alert.html" ng-repeat="alert in alerts" ng-class="'alert-' + (alert.type || 'warning')" close="closeAlert()">
                    {{alert.msg}}
                  </div>
                      <!--- Table app for showing the orders table--->
                      <table ng-table="tableParams" class="table table-bordered table-hover table-condensed">
                        <tr ng-repeat="row in $data track by row.id">
                         <td data-title="'Order ID'" sortable="'orderID'"> 
                              {{ row.id }}
                         </td>
                         <td data-title="'Order Date'" sortable="'orderDate'"> 
                              {{ row.orderDate | date:"medium" }}
                         </td>
                         <td data-title="'Order Shipping Date'" sortable="'orderShippingDate'">
                             <span editable-combodate="row.orderShippingDate" e-max-year="2025" e-name="orderShippingDate" onbeforesave="saveData($data,'orderShippingDate', row.id,true)">
                               {{ row.orderShippingDate | date:"medium" }}
                             </span>
                         </td>
                         <td data-title="'Order Shipping Status'" sortable="'isOrderShipped'">
                             <span e-title="shipped?" editable-checkbox="row.isOrderShipped" e-name="isOrderShipped" onbeforesave="saveData($data,'isOrderShipped',row.id)">
                               {{ row.isOrderShipped && "Shipped" || "Pending" }}
                             </span>
                         </td>
                         <td data-title="'Customer Name'" sortable="'customerName'">
                              <span editable-text="row.orderCustomerName" e-name="orderCustomerName" onbeforesave="saveData($data,'orderCustomerName',row.id)">
                              {{ row.orderCustomerName || 'empty' }}
                              </span>
                         </td>
                         <td data-title="'Customer Address'">
                            <span editable-textArea="row.orderCustomerAddress" e-name="orderCustomerAddress" onbeforesave="saveData($data,'orderCustomerAddress',row.id)">
                              {{ row.orderCustomerAddress || 'empty' }}
                            </span>
                         </td>
                         <td data-title="'Order Description'">
                             <span editable-textArea="row.orderDescription" e-name="orderDescription" onbeforesave="saveData($data,'orderDescription',row.id)">
                              {{ row.orderDescription || 'empty' }}
                             </span>
                         </td>
                         <td data-title="'Store'" sortable="'productStoreName'">
                              {{ row.product_store.store.storename}}
                         </td>
                         <td data-title="'Product Name'" sortable="'productName'">
                              {{ row.product_store.product.productName }}
                         </td>
                         <td data-title="'Product Description'">
                              {{ row.product_store.product.productDescription}}
                         </td>
                         <td data-title="'Order Value'" sortable="'productStorePrice'">
                              {{ row.product_store.productStorePrice }}
                         </td>
                        </tr>
                      </table>
                  </uib-tab>
                  <uib-tab index="1" heading="Order Sales Report">
                     <canvas id="orderBar" class="chart chart-bar" chart-data="orderData" chart-labels="orderLabels" chart-options="orderChartOptions" >
                     </canvas>
                  </uib-tab>
                  <uib-tab index="2" heading="Product Sales Report" >
                     <canvas id="productBar" class="chart chart-bar"chart-data="productData" chart-labels="productLabels" chart-options="productChartOptions" >
                     </canvas>
                  </uib-tab>
             </uib-tabset>
        </div>
    </body>
</html>