<?php

class Routes extends Controller {

    private $controller = App_Controller;

    private $method = App_Method;

    private $badArg;

    public function __construct() {
        $parts = explode('/', $_SERVER['REQUEST_URI']);

        if (!empty($parts[1])) {
            $this->controller = strtolower($parts[1]);

            if (!class_exists($this->controller)) {
                $this->badArg = 'controller';

                return;
            }
        }

        if (!empty($parts[2])) {
            $this->method = $parts[2];

            if (!method_exists($this->controller, $this->method)) {
                $this->badArg = 'method';
            }
        }
    }

    public function __get($name) {
        return $this->$name;
    }

}