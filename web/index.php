<?php
session_start();

require_once '../autoload.php';
require_once '../config.php';

$controllerName = filter_input(INPUT_GET, 'controller', FILTER_SANITIZE_STRING);
$actionName = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

$controllerName = $controllerName ? ucfirst($_GET['controller']) . 'Controller' : 'DefaultController';

if (!class_exists($controllerName)) {
    header('Location: ./');
    die;
}

$controller = new $controllerName();

$actionName = $actionName ? strtolower($_GET['action']) . 'Action' : 'defaultAction';

if (!method_exists($controller, $actionName)) {
    header('Location: ./');
    die;
}

$controller->$actionName();