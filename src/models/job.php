<?php
class job extends Model
{
    var $table = "jobs";
    public function getAlljobs(): false|array|null
    {
        return $this->find(array(
            "order" => ' id',
        ));
    }

    public function saveJob($data)
    {
        return $this->save($data);
    }

    public function getJob($id)
    {
        return $this->findfirst(array(
            "condition" => 'id=' . $id
        ));
    }
    public function deleteJob($id)
    {
        return $this->delete(array(
            "condition" => 'id=' . $id,

        ));
    }

}
