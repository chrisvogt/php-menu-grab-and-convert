<?php
$autoload_path = dirname(__DIR__) . "/vendor/autoload.php";
var_dump($autoload_path);
require $autoload_path;
$myclass = new MyProject\MyClass();
echo $myclass->MyFunction();