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
    <?= $this->Html->meta('icon') ?>
    
    <link   href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"    rel="stylesheet">
    <link   href="http://vitalets.github.io/angular-xeditable/dist/css/xeditable.css" rel="stylesheet">
    <?= $this->Html->css('main.css') ?>
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.2/angular.min.js"></script>
    <script src="http://vitalets.github.io/angular-xeditable/dist/js/xeditable.js"></script>
    <script src="http://momentjs.com/downloads/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/2.1.3/ui-bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <?= $this->Html->script('order') ?>
</head>
<body class="home">
    <div class="jumbotron">
       <h1>Welcome to OrderManager!</h1> 
       <p>Manager all your sales in one place.</p> 
       <a href='/logout' class='.btn-default'></a>
       <div ng-app="app" ng-controller="OrderGridController" ng-init="loadOrders()">
          <table class="table table-bordered table-hover table-condensed">
            <tr style="font-weight: bold">
              <td style="width:auto">Date <a href="#" ng-click="sortType = 'OrderDate'"><span class="fa fa-caret-down"></span></a></td>
              <td style="width:auto">Shipping Date</td>
              <td style="width:auto">Shipping Status</td>
              <td style="width:auto">Customer Name </td>
              <td style="width:auto">Customer Address </td>
              <td style="width:auto">Customer Instruction </td>
              <td style="width:auto">Store</td>
              <td style="width:auto">Product Name</td>
              <td style="width:auto">Product Description</td>
              <td style="width:auto">Product Price</td>
            </tr>
            <tr ng-repeat="order in orders">
            <!---  OrderDate --->
             <td> 
                <span class='orderDate'>
                  {{ order.orderDate | date:"medium" }}
                </span>
             </td>
             <td>
                <div editable-combodate="order.orderShippingDate" e-name="orderShippingDate" onbeforesave="checkName($data, order.id)">
                      {{ order.orderShippingDate | date:"medium" }}
                </div>
             </td>
             <td>
                <div editable-checkbox="order.isOrderShipped" e-title="Shipped?" e-name="isOrderShipped" onbeforesave="checkName($data, order.id)">
                      {{ order.isOrderShipped && "Shipped" || "Pending" }}
                </div>
             </td>
             <td>
                <span editable-text="order.orderCustomerName" e-name="CustomerName" onbeforesave="checkName($data, order.id)">
                    {{ order.orderCustomerName || 'empty' }}
                </span>
             </td>
             <td>
                <span editable-textarea="order.orderCustomerAddress" e-name="CustomerAddress" onbeforesave="checkName($data, order.id)">
                    {{ order.orderCustomerAddress || 'empty' }}
                </span>
             </td>
             <td>
                <span editable-textarea="order.orderDescription" e-name="orderDescription" onbeforesave="checkName($data, order.id)">
                    {{ order.orderDescription || 'empty' }}
                </span>
             </td>
             <td>
                <span class='productStoreName'>
                    {{ order.product_store.store.storename || 'empty' }}
                </span>
             </td>
             <td>
                <span class='productName'>
                    {{ order.product_store.product.productName || 'empty' }}
                </span>
             </td>
             <td>
                <span class='productDescription'>
                    {{ order.product_store.product.productDescription || 'empty' }}
                </span>
             </td>
             <td>
                <span class='productStorePrice'>
                    {{ order.product_store.productStorePrice || 'empty' }}
                </span>
             </td>
            </tr>
          </table>
        </div>
    </div>
</body>
</html>