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
            echo isset($listevariable[$name]) && $listevariable[$name] === $l->$nomidentiiant ? 'selected' : '';
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

    function generateInputField($object,string $fieldName,string $placeholder,bool $isRequired,string $type): void {
        $value = '';
        if (isset($object->$fieldName)) {
            $value = $object->$fieldName;
        } else if (isset($_POST[$fieldName])) {
            $value = $_POST[$fieldName];
        }


        $required = $isRequired ? 'required' : '';
        $readonly = $fieldName === 'id' ? 'readonly' : '';
        echo "<input type='$type' class='form-control' id='floating_$fieldName' placeholder='$placeholder' name='$fieldName' value='$value' $required $readonly >";
        echo "<label for='floating$fieldName'>$placeholder</label>";
        if ($isRequired) {
            echo "<div class='invalid-feedback'>";
            echo "Le $placeholder est obligatoire";
            echo "</div>";
        }
    }
}
