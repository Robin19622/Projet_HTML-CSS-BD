<?php
class departement extends Model
{
    var $table = "departments";
   public  function getAllDepartment(): false|array|null
    {
        return $this->find(array(
            "order" => ' id',
        ));
    }

    public function savedepartement( array $data): bool
    {
        return $this->save($data);
    }

    public function getdepartement(int $id): object
    {
        return $this->findfirst(array(
            "condition" => 'id=' . $id
        ));
    }
    public function deletedepartement(int $id): bool
    {
        return $this->delete(array(
            "condition" => 'id=' . $id,

        ));
    }
}
