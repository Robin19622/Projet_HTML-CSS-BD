<?php
class employee extends Model
{
    var $table = "employees";
    //ici : $num est un paramètre falcutatif initialisée par defaut a 6 
    function getLast($num = 6)
    {
        return $this->find(array(
            "limit" => 'LIMIT ' . $num,
        ));
    }
    function getEmployee($id)
    {
        return $this->findfirst(array(
            "condition" => 'id=' . $id
        ));
    }
    function deleteEmployee($id)
    {
        return $this->delete(array(
            "condition" => 'id=' . $id,

        ));
    }
    function saveEmployee($data)
    {
        return $this->save($data);
    }

    function getAllManagers(): false|array|null
    {
        return $this->find(array(
            "order" => ' id',
        ));
    }
}
