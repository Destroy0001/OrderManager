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
    <link rel="stylesheet" href="https://cdn.rawgit.com/esvit/ng-table/1.0.0/dist/ng-table.min.css">
    <?= $this->Html->css('main.css') ?>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.2/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/2.1.3/ui-bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-resource.min.js"></script>
    <script src="https://cdn.rawgit.com/esvit/ng-table/1.0.0/dist/ng-table.js"></script>
    <?= $this->Html->script('order') ?>
</head>

<body class="home">
    <div class="jumbotron">
       <h1>Welcome to OrderManager!</h1> 
       <p>Manager all your sales in one place.</p> 
       <a href='/logout' class='.btn-default'></a>
       <div ng-app="app" ng-controller="OrderGridController" ng-init="loadOrders()">
          <table ng-table="tableParams" class="table table-bordered table-hover table-condensed">
            <tr ng-repeat="row in $data track by row.id">
             <td data-title="'Order ID'" sortable="'orderID'"> 
                  {{ row.id }}
             </td>
             <td data-title="'Order Date'" sortable="'orderDate'"> 
                  {{ row.orderDate | date:"medium" }}
             </td>
             <td data-title="'Order Shipping Date'" sortable="'orderShippingDate'">
                  {{ row.orderShippingDate | date:"medium" }}
             </td>
             <td data-title="'Order Shipping Status'" sortable="'isOrderShipped'">
                  {{ row.isOrderShipped && "Shipped" || "Pending" }}
             </td>
             <td data-title="'Customer Name'" sortable="'customerName'">
                  {{ row.orderCustomerName || 'empty' }}
             </td>
             <td data-title="'Customer Address'">
                  {{ row.orderCustomerAddress || 'empty' }}
             </td>
             <td data-title="'Order Description'">
                  {{ row.orderDescription || 'empty' }}
             </td>
             <td data-title="'Store'" sortable="'productStoreName'">
                  {{ row.product_store.store.storename || 'empty' }}
             </td>
             <td data-title="'Product Name'" sortable="'productName'">
                  {{ row.product_store.product.productName || 'empty' }}
             </td>
             <td data-title="'Product Description'">
                  {{ row.product_store.product.productDescription || 'empty' }}
             </td>
             <td data-title="'Order Value'" sortable="'productStorePrice'">
                  {{ row.product_store.productStorePrice || 'empty' }}
             </td>
            </tr>
          </table>
        </div>
    </div>
</body>
</html>