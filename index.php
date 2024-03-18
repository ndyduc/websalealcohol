<?php

require_once('data.php');
session_start();
if(!$_SESSION['id']){
  $length = random_int(10, 15);
  $randomBytes = random_bytes($length);
  $sessionId = bin2hex($randomBytes);
  
  $_SESSION['id'] = $sessionId;
  require_once('models/Order.php');
  echo 'add new cart : '.$_SESSION['id'];
  $result = Order::add($_SESSION['id']);
  echo $result['message'];
}

if (isset($_GET['controller'])) {
  $controller = $_GET['controller'];
  if (isset($_GET['action'])) {
    $action = $_GET['action'];
  } else {
    $action = 'index';
  }
} else {
  $controller = 'Alcohol';
  $action = 'index';
}
require_once('routes.php');
include 'views/footer.php';
