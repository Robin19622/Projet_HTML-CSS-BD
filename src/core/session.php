<?php
/**
 * Classe Session
 *
 * Cette classe gère les sessions utilisateur pour l'application. Elle fournit des méthodes pour écrire et lire des données de session, vérifier si un utilisateur est connecté, et gérer les messages flash.
 */
class Session
{
    /**
     * Le constructeur de la classe. Il démarre une nouvelle session si aucune n'est déjà active.
     */
    function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    /**
     * Définit un message flash à afficher à l'utilisateur.
     *
     * @param string $message Le message à afficher.
     * @param string $icon L'icône à afficher avec le message.
     * @param string $type Le type de message (par exemple, "success" ou "error").
     */
    public function setFlash($message,  $icon = "", $type = "success")
    {
        $_SESSION['flash'] = array(
            'message' => $message,
            'icon' => $icon,
            'type' => $type
        );
    }

    /**
     * Affiche le message flash actuel, s'il y en a un.
     *
     * @return string Le code HTML du message flash.
     */
    public function flash()
    {
        if (isset($_SESSION['flash']['message'])) {
            $html = '<div class="alert alert-' . $_SESSION['flash']['type'] . ' d-flex align-items-center" role="alert">';
            $html .= $_SESSION['flash']['icon'];
            $html .= '<div>';
            $html .= $_SESSION['flash']['message'];
            $html .= '</div>';
            $html .= '</div>';
            $_SESSION['flash'] = array();
            return $html;
        }
    }

    /**
     * Écrit une valeur dans la session.
     *
     * @param string $key La clé sous laquelle écrire la valeur.
     * @param mixed $value La valeur à écrire.
     */
    public function write($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Lit une valeur de la session.
     *
     * @param string|null $key La clé de la valeur à lire. Si null, toutes les données de session sont renvoyées.
     * @return mixed La valeur lue, ou false si la clé n'est pas définie.
     */
    public function read($key = null)
    {
        if ($key) {
            if (isset($_Session[$key])) {
                return $_Session[$key];
            } else {
                return false;
            }
        } else {
            return $_SESSION;
        }
    }

    /**
     * Vérifie si un utilisateur est connecté.
     *
     * @return bool True si un utilisateur est connecté, false sinon.
     */
    public function isLogged()
    {
        return isset($_SESSION['User']->id);
    }

    /**
     * Récupère une propriété de l'utilisateur connecté.
     *
     * @param string $key La propriété à récupérer.
     * @return mixed La valeur de la propriété, ou false si l'utilisateur n'est pas connecté ou si la propriété n'est pas définie.
     */
    public function user($key)
    {
        if ($this->read('User')) {
            if (isset($this->read('User')->$key)) {
                return $this->read('User')->$key;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}