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
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.rawgit.com/esvit/ng-table/1.0.0/dist/ng-table.min.css">
        <link rel="stylesheet" href="http://vitalets.github.io/angular-xeditable/dist/css/xeditable.css">
        <?= $this->Html->css('main.css') ?>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.2/angular.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/2.1.3/ui-bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-resource.min.js"></script>
        <script src="https://cdn.rawgit.com/esvit/ng-table/1.0.0/dist/ng-table.js"></script>
        <script src="http://vitalets.github.io/angular-xeditable/dist/js/xeditable.js"></script>
        <script src="http://momentjs.com/downloads/moment.min.js"></script>
        
        <?= $this->Html->script('order') ?>
    </head>
    <body class="home">
        <div class="jumbotron">
           <h1>Welcome to OrderManager!</h1> 
           <p>Manager all your sales in one place.</p> 
           <a href="/logout" class='btn btn-default'> Log Out</a>
           <hr/>
           <hr/> 
           <div ng-app="app" ng-controller="OrderGridController">
               <script type="text/ng-template" id="alert.html">
                    <div ng-transclude></div>
               </script>
              <div uib-alert template-url="alert.html" ng-repeat="alert in alerts" ng-class="'alert-' + (alert.type || 'warning')" close="closeAlert()">{{alert.msg}}</div>
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
            </div>
        </div>
    </body>
</html>