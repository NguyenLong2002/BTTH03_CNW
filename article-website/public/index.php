<?php
define('APP_ROOT', dirname(__FILE__,2 ));

$controller = ucfirst(strtolower(isset($_GET['controller']) ? $_GET['controller'] : 'home')) . 'Controller';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$controllerPath = '../app/Controllers/' . $controller . '.php';

require_once($controllerPath);

$myObj = new $controller();
$myObj->$action();

