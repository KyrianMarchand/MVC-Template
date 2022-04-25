<?php
class Controller{

    private $controller;
    private $controllerName;
    private $action;
    private $postParams;

    public function __construct ($controllerName, $action, $postParams)
    {

        if($controllerName == null || trim($controllerName) == '' || $controllerName == 'Controller') {
            // Define default "Controller" class
            // in order to make the rest of the code work properly
            $controllerName = 'EventController';
        }

        if(!class_exists($controllerName)) {
            header("HTTP/1.1 404 Not Found"); // https://www.php.net/manual/fr/function.header.php
            exit();
        }

        if($action == null || trim($action) == '') {
            $action = 'index';
        }

        $controller = new $controllerName;

        if(!method_exists($controller, $action)) {
            header("HTTP/1.1 404 Not Found"); // https://www.php.net/manual/fr/function.header.php
            exit();

        }

        $this->postParams = $postParams;
        $this->controllerName = $controllerName;
        $this->action = $action;
        $this->controller = $controller;



    }


    public function execute()
    {
        $B_called = call_user_func_array(array($this->controller, $this->action), array());

        if (false === $B_called) {
            throw new ControllerException("Action " . $this->_A_urlDecortique['action'] .
                " of the controller " . $this->_A_urlDecortique['controleur'] . " encounter a problem.");
        }
    }
}