<?php
define('WEBROOT', str_replace("index.php", "", $_SERVER["REQUEST_URI"]));
define('ROOT', str_replace("index.php", "", $_SERVER["SCRIPT_FILENAME"]));
//echo "Webroot: ".WEBROOT.'<br>';
//echo "root: ".ROOT.'<br>';
//phpinfo();
require(ROOT . 'config/conf.php');
require(ROOT . 'core/model.php');
require(ROOT . 'core/controller.php');
require(ROOT . 'core/session.php');
$chemin = explode("/", WEBROOT);
//echo"<PRE>";
//print_r($chemin);
//echo"<PRE>";
define('WEBROOT2', $chemin[1] . "/" . $chemin[2]);
//echo "WEBROOT2 : " . WEBROOT2 . "<br>";

if (empty($chemin[3])) {
    $controller = "home";
} else {
    $controller = $chemin[3];
}
//echo "controller:".$controller."<br>";
if (empty($chemin[4])) {
    $action = "Index";
} else {
    $action = $chemin[4];
}

//echo "action :".$action."<br>";

require(ROOT . 'controllers/' . $controller . '.php');
$controller = new $controller();

//verification de l'existance de l'action demande 
if (method_exists($controller, $action)) {
    //$controller->$action();
    unset($chemin[0]);
    unset($chemin[1]);
    unset($chemin[2]);
    unset($chemin[3]);
    unset($chemin[4]);
    // 1 paramètre : tableau( objets, méthode)
    // 2 paramètre : un tableau contenant de 0 a N parametre 
    call_user_func_array(array($controller, $action), $chemin);
} else {
    echo "erreur 404";
}
