<?php
// This file is the entry point of your application
require 'app/AutoLoad.php';
error_reporting(E_ALL);
if(!isset($_SESSION)){
    session_start();
}
const CONTROLLER_PARAMETER = 'controller';
const ACTION_PARAMETER = 'action';
try
{
    $A_postParams = isset($_POST) ? $_POST : null;
    $controllerName = isset($_GET[CONTROLLER_PARAMETER]) ? ucfirst(strtolower($_GET[CONTROLLER_PARAMETER])) . 'Controller' : null;
    $action = isset($_GET[ACTION_PARAMETER]) ? $_GET[ACTION_PARAMETER] : null;
    $O_controleur = new Controller($controllerName, $action, $A_postParams);
    $O_controleur->execute();
}
catch (ControllerException $O_exception)
{
    echo (' An error has occurred : ' . $O_exception->getMessage());
}

