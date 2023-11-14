<?php
//categorie   herite de la classe model
class maison extends Model
{
    var $table = "maison_";
    //ici : $num est un paramètre falcutatif initialisée par defaut a 6 
    function getLast($num = 6)
    {
        return $this->find(array(
            "fields" => 'maison_.*, categorie.Nom as libelle',
            "order" => 'id ',
            "limit" => 'LIMIT ' . $num,
            "inner" => ' inner join categorie on maison_.categorie= categorie.Id ',

        ));
    }
    function getM($id)
    {
        return $this->findfirst(array(
            "fields" => 'maison_.*, categorie.Nom as libelle',
            "condition" => 'maison_.id=' . $id,
            "inner" => ' inner join categorie on maison_.categorie= categorie.Id '


        ));
    }
    function deletemai($id)
    {
        return $this->delete(array(
            "condition" => 'id=' . $id,
        ));
    }
    function savemai($data)
    {
        return $this->save($data);
    }
}
