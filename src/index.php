<?php
session_start();
define('WEBROOT', str_replace("index.php", "", $_SERVER["REQUEST_URI"]));
define('ROOT', str_replace("index.php", "", $_SERVER["SCRIPT_FILENAME"]));
//echo "Webroot: " . WEBROOT . '<br>';
//echo "root: " . ROOT . '<br>';

//phpinfo();


require(ROOT . 'config/conf.php');
require(ROOT . 'core/model.php');
require(ROOT . 'core/controller.php');
require(ROOT . 'core/session.php');

$chemin = explode("/", WEBROOT);
//echo"<PRE>";
//print_r($chemin);
//echo"<PRE>";
define('WEBROOT2', $chemin[1]);
//echo "WEBROOT2 : " . WEBROOT2 . "<br>";

if (empty($chemin[1])) {
    $controller = "home";
} else {
    $controller = $chemin[1];
}
//echo "controller:" . $controller . "<br>";
if (empty($chemin[2])) {
    $action = "Index";
} else {
    $action = $chemin[2];
}

//echo "action :" . $action . "<br>";

$controller_file = ROOT . 'controllers/' . $controller . '.php';
if (file_exists($controller_file)) {
    require($controller_file);
    $controller = new $controller();

    if (method_exists($controller, $action)) {
        unset($chemin[0]);
        unset($chemin[1]);
        unset($chemin[2]);
        call_user_func_array(array($controller, $action), $chemin);
    } else {
        require(ROOT . 'views/errors/404.php');
    }
} else {
    require(ROOT . 'views/errors/404.php');
}
