<?php
class job extends Model
{
    var $table = "jobs";


    function getAlljobs(): false|array|null
    {
        return $this->find(array(
            "order" => ' id',
        ));
    }
}
