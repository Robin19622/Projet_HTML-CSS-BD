<?php
class jobhistory extends Model
{
    var $table = "job_history";
    public function getAlljobhistorys(): false|array|null
    {
        return $this->find(array(
            "order" => ' id',
        ));
    }
    public function savejobhistory($data)
    {
        return $this->save($data);
    }

    public function getjobhistory($id)
    {
        return $this->findfirst(array(
            "condition" => 'id=' . $id
        ));
    }
    public function deletejobhistory($id)
    {
        return $this->delete(array(
            "condition" => 'id=' . $id,

        ));
    }

    

}
