<?php
spl_autoload_register(function ($class) {

    $directories = [
        'Entity',
        'Repository',
        'Controller',
        'Utils'
    ];

    foreach ($directories as $directory) {
        $file = '..' . DIRECTORY_SEPARATOR . $directory . DIRECTORY_SEPARATOR . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return true;
        }
    }

    return false;
});