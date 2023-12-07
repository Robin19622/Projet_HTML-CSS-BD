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

    public function getDepartmentEmployeeCounts() {
        return $this->find(array(
            'fields' => 'departments.DEPARTMENT_NAME, COUNT(employees.id) as employee_count',
            'inner' => 'inner join employees ON departments.id = employees.department_id',
            'group' => ' group by departments.id',
            'order' => '  departments.id'
        ));
    }
}
