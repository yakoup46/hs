<?php

$configs = parse_ini_file(__DIR__ . '/config/app.ini', true);

foreach ($configs as $type => $config) {

    foreach ($config as $key => $value) {
        define($type . '_' . $key, $value);
    }

}

function debug($info) {
    echo '<pre>';
    print_r($info);
    echo '</pre>';
}