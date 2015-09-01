<?php

class Controller {

    protected function view($page) {
        ob_start();
        
        include __DIR__ . '/../View/base/' . $page . '.php';

        $page = ob_get_contents();

        ob_end_clean();
    }

}