<?php
class departement extends Model
{
    var $table = "departments";
    function getAllDepartment(): false|array|null
    {
        return $this->find(array(
            "order" => ' id',
        ));
    }

    public function savedepartement($data)
    {
        return $this->save($data);
    }

    public function getdepartement($id)
    {
        return $this->findfirst(array(
            "condition" => 'id=' . $id
        ));
    }
    public function deletedepartement($id)
    {
        return $this->delete(array(
            "condition" => 'id=' . $id,

        ));
    }
}
