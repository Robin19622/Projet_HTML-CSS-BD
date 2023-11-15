<?php
//categorie   herite de la classe model
class category extends Model
{
    var $table = "categorie";
    //ici : $num est un paramètre falcutatif initialisée par defaut a 6 
    function getLast($num = 6)
    {
        return $this->find(array(
            "order" => 'Nom ',
            "limit" => 'LIMIT ' . $num
        ));
    }
    function getCat($id)
    {
        return $this->findfirst(array(
            "condition" => 'id=' . $id,

        ));
    }
    function deleteCat($id)
    {
        return $this->delete(array(
            "condition" => 'id=' . $id,
        ));
    }
    function saveCat($data)
    {
        return $this->save($data);
    }
}
