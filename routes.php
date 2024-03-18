<?php
$controllers = array(
  'Alcohol' => ['index','update','addal','error','info','add','search','delete','edit'],
  'Detail' => ['add','takeDTC', 'update', 'delete','add1','remove1'],
  'Order' => ['make','addOR','search', 'cancel','status'],
  'Employee' => ['login','logout','log','addem','backhome','edit','update','listacc','delete','listor','add','changepass','pass','editem']
);
if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
  echo "Invalid controller or action!";
  die();
}
include_once('controllers/' . $controller . '_controller.php');
$k = ucwords($controller) . 'Controller';
$controller = new $k;
$controller->$action();