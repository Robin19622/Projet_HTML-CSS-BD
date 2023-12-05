<?php

class controller
{
    var array $vars = [];
    var string $layout = "default";
    var session $Session;
    var array $models = [];

    function __construct()
    {
        if (isset($this->models)) {
            foreach ($this->models as $m) {
                $this->loadModel($m);
            }
        }
        $this->Session = new session();
    }

    function loadModel($name): void
    {
        require(ROOT."models/".strtolower($name).".php");
        $this->models[$name] = new $name();
    }

    function render($filename): void
    {
        extract($this->vars);
        ob_start();
        require(ROOT.'views/'.get_class($this).'/'.$filename.'.php');
        $content_for_layout = ob_get_clean();
        if (!$this->layout) {
            echo $content_for_layout;
        } else {
            require(ROOT.'views/layout/'.$this->layout.'.php');
        }
    }

    function set($d): void
    {
        $this->vars = array_merge($this->vars, $d);
    }

    function liste(
        array $listederoulante,
        string $name,
        string $floatingName,
        string $nomidentiiant,
        array $nomaderoule,
        array $listevariable = null,
        string $onchange = null
    ): void {
        echo "<div class='form-floating'>";
        echo "<select class='form-select mb-3' aria-label='Default select example' name='$name'  $onchange>";
        foreach ($listederoulante as $l) {
            echo "<option value='";
            echo $l->$nomidentiiant;
            echo " ' ";
            if (isset($listevariable->$name)) {
                if ($listevariable->$name == $l->$nomidentiiant) {
                    echo 'selected';
                }
            }
            echo ">";
            if (is_array($nomaderoule)) {
                foreach ($nomaderoule as $fieldName) {
                    echo $l->$fieldName . ' ';
                }
            } else {
                echo $l->$nomaderoule;
            }
            echo " </option>";
        }
        echo "</select>";
        echo "<label for='floatingSelect'>$floatingName</label>";
        echo "</div>";
    }
}
