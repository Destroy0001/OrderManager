<?php
/**
 * home page of the application with login form. 
 * Author: Ashish Jhanwar
 **/
$this->layout = false;
$description = 'OrderManager! Manage your Ecommerce with ease!';
?>

<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('main.css') ?>
</head>
<body class="home">
        <div class="jumbotron vertical-center">
            <h1>Welcome to OrderManager!</h1> 
            <p>OrderManager is the easiest way to manage your ecommerce sales </p> 
            <form class="form-horizontal">
          <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-4">
              <input type="email" class="form-control" id="email" placeholder="Enter email">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Password:</label>
            <div class="col-sm-4"> 
              <input type="password" class="form-control" id="pwd" placeholder="Enter password">
            </div>
          </div>
          <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" id='login' class="btn btn-default">Login</button>
            </div>
          </div>
        </form>
       </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <?= $this->Html->script('bootstrap.min') ?>
</body>

</html>
