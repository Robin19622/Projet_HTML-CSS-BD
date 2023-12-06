<?php
class countrie extends Model
{
    var $table = "countries";
    public function getAllcountries(): false|array|null
    {
        return $this->find(array(
            "order" => ' id',
        ));
    }

    public function savecountrie($data)
    {
        return $this->save($data);
    }

    public function getcountrie($id)
    {
        return $this->findfirst(array(
            "condition" => 'id=' . $id
        ));
    }
    public function deletecountrie($id)
    {
        return $this->delete(array(
            "condition" => 'id=' . $id,

        ));
    }
    public function countAllEmployees()
    {
        return $this->find(array(
            "fields" => 'COUNT(*) as total_employees',
            "limit" => ''
        ));
    }
}
