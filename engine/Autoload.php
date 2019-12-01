<?php

namespace app\engine;

class Autoload
{
    public function loadClass($className)
    {
        $className = str_replace(['app\\', '\\'], ['/../', DIRECTORY_SEPARATOR], $className);

        $fileName = $_SERVER['DOCUMENT_ROOT'] . $className . '.php';

        //var_dump($fileName);

        if (file_exists($fileName)) {
            include $fileName;
        }
    }
}
