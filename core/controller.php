<?php
class controller
{
    var $vars = array();
    var $layout = "default";
    var $Session;
    function __construct()
    {
        // chargement de tout nos modèles en mémoire 
        if (isset($this->models)) {
            foreach ($this->models as $m) {
                $this->loadmodel($m);
            }
        }
        $this->Session = new session();
    }
    function loadmodel($name)
    {
        require(ROOT . "models/" . strtolower($name) . ".php");
        $this->models[$name] = new $name();
    }
    function render($filename)
    {
        extract($this->vars);

        // je démarre une mise en mémoire tempoon
        ob_start();

        require(ROOT . 'views/' . get_class($this) . '/' . $filename . '.php');

        $content_for_layout = ob_get_clean();
        if ($this->layout == false) {
            echo $content_for_layout;
        } else {
            require(ROOT . 'views/layout/' . $this->layout . '.php');
        }
    }
    function set($d)
    {
        $this->vars = array_merge($this->vars, $d);
    }
    function liste($listederoulante, $name, $floatingName, $nomidentiiant, $nomidentifiantvariable, $nomaderoule, $listevariable = null)
    {
        echo "<div class='form-floating'>";
        echo "<select class='form-select mb-3' aria-label='Default select example' name='$name'>";
        foreach ($listederoulante as $l) {
            echo "<option value='";
            echo $l->$nomidentiiant;
            echo " ' ";
            if (isset($listevariable->$nomidentifiantvariable)) {
                if ($listevariable->$nomidentifiantvariable == $l->$nomidentiiant) {
                    echo 'selected';
                }
            }
            echo ">";
            echo $l->$nomaderoule;
            echo " </option>";
        }
        echo "</select>";
        echo "<label for='floatingSelect'>$floatingName</label>";
        echo "</div>";
    }
    function saveimage()
    {
    }
}
