<?php
//categorie   herite de la classe model
class user extends Model
{
    var $table = "users";

    function getUser($login, $password)
    {
        return $this->findfirst(array(
            "condition" => 'login="' . $login . '"and password="' . md5($password) . '"'

        ));
    }
}
