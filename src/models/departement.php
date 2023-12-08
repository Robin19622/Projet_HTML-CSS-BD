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

    public function getDepartmentEmployeeCounts() {
        return $this->find(array(
            'fields' => 'departments.DEPARTMENT_NAME, COUNT(employees.id) as employee_count',
            'inner' => 'inner join employees ON departments.id = employees.department_id',
            'group' => 'group by departments.id',
            'order' => 'COUNT(employees.id) DESC'
        ));
    }
}
