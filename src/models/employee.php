<?php
class employee extends Model
{
    var $table = "employees";
    public  function getLast(int $num = 10 ): array
    {
        return $this->find(array(
            "limit" => 'LIMIT ' . $num,
        ));
    }
    public function getEmployee(int $id): object
    {
        return $this->findfirst(array(
            "condition" => 'id=' . $id
        ));
    }
    public function deleteEmployee(int $id): bool
    {
        
        return $this->delete(array(
            "condition" => 'id=' . $id,

        ));
    }
    public function saveEmployee( array $data): bool
    {
        return $this->save($data);
    }

    public function getAllManagers(): false|array|null
    {
        return $this->find(array(
            "order" => ' id',
        ));
    }

    public function getTotalEmployees(): array {
        return $this->find(array(
            "fields" => 'COUNT(*) as nb_employees',
        ));
    }    
}
