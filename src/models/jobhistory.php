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
    public function savejobhistory(array $data): bool
    {
        return $this->save($data);
    }

    public function getjobhistory(int $id): object
    {
        return $this->findfirst(array(
            "condition" => 'id=' . $id
        ));
    }
    public function deletejobhistory(int $id): bool
    {
        return $this->delete(array(
            "condition" => 'id=' . $id,

        ));
    }

    

}
