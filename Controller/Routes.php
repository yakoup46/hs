<?php

class Routes extends Controller {

    private $controller = App_Controller;

    private $method = App_Method;

    private $badArg;

    public function __construct() {
        require_once __DIR__ . '/../config/routes.php';

        $cases = $this->specialRoutes($routes);

        $parts = explode('/', $_SERVER['REQUEST_URI']);

        if (isset($cases[$parts[1]])) {
            $this->controller = $cases[$parts[1]]['controller'];
            $this->method = $parts[1];
            $this->args = $parts[2];

            return;
        }

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

    private function specialRoutes($routes){
        $cases = array();

        foreach ($routes as $route => $param) {
            $parts = explode('::', $route);

            $cases[$parts[0]] = array(
                'controller' => $parts[1],
                'format' => $param
            );
        }

        return $cases;
    }

}