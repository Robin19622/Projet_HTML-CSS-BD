<?php
class employee extends Model
{
    var $table = "employees";
    function getLast(int $num = 10 )
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

    function countAllEmployees() {
        return $this->find(array(
            "fields" => 'COUNT(*) as total_employees',
            "limit" => ''
        ));
    }    
}
