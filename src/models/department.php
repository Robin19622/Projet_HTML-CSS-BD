<?php
class department extends Model
{
    var $table = "departments";
    function getAllDepartment(): false|array|null
    {
        return $this->find(array(
            "order" => ' id',
        ));
    }
}
