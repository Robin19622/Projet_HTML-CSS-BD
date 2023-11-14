<?php
class Session
{
    public $id;
    public $table;
    public $conf = "default";
    public $db;
    // read : un select sur clé primaire 

    function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }
    public function setFlash($message,  $icon = "", $type = "success")
    {
        $_SESSION['flash'] = array(
            'message' => $message,
            'icon' => $icon,
            'type' => $type
        );
    }
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
    public function write($key, $value)
    {
        $_SESSION[$key] = $value;
    }
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
    public function isLogged()
    {

        return isset($_SESSION['User']->nom);
    }
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
