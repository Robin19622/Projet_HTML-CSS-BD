<?php

/**
 * Classe controller
 *
 * Cette classe est le contrôleur de base pour l'application. Elle fournit des méthodes pour charger des modèles,
 * rendre des vues, et définir des variables pour les vues. Elle comprend également des méthodes pour générer des éléments de formulaire.
 */
class controller
{
    /**
     * @var array $vars
     * Un tableau associatif de variables à passer à la vue.
     */
    var array $vars = [];

    /**
     * @var string $layout
     * Le nom du layout à utiliser lors du rendu de la vue.
     */
    var string $layout = "default";

    /**
     * @var session $Session
     * L'objet de session pour la session utilisateur actuelle.
     */
    var session $Session;

    /**
     * @var array $models
     * Un tableau de modèles à charger pour le contrôleur.
     */
    var array $models = [];

    /**
     * Le constructeur du contrôleur. Il initialise la session et charge tous les modèles spécifiés dans $models.
     */
    function __construct()
    {
        if (isset($this->models)) {
            foreach ($this->models as $m) {
                $this->loadModel($m);
            }
        }
        $this->Session = new session();
    }

    /**
     * Charge un modèle pour utilisation dans le contrôleur.
     *
     * @param string $name Le nom du modèle à charger.
     */
    function loadModel($name): void
    {
        require(ROOT."models/".strtolower($name).".php");
        $this->models[$name] = new $name();
    }

    /**
     * Rend une vue.
     *
     * @param string $filename Le nom du fichier de vue à rendre.
     */
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

    /**
     * Définit des variables pour la vue.
     *
     * @param array $d Un tableau associatif de variables à définir pour la vue.
     */
    function set($d): void
    {
        $this->vars = array_merge($this->vars, $d);
    }

    /**
     * Génère un élément de formulaire de liste déroulante.
     *
     * @param array $listederoulante Les options pour la liste déroulante.
     * @param string $name Le nom de la liste déroulante.
     * @param string $floatingName Le label flottant pour la liste déroulante.
     * @param string $nomidentiiant L'identifiant pour les options.
     * @param array $nomaderoule Les noms pour les options.
     * @param array|null $listevariable L'option sélectionnée.
     * @param string|null $onchange L'attribut onchange pour la liste déroulante.
     */
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

    /**
     * Génère un élément de formulaire de champ d'entrée.
     *
     * @param object $object L'objet contenant la valeur du champ.
     * @param string $fieldName Le nom du champ.
     * @param string $placeholder Le placeholder pour le champ.
     * @param bool $isRequired Si le champ est requis.
     * @param string $type Le type du champ d'entrée.
     */
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