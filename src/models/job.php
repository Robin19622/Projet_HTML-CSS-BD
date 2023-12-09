<?php
class job extends Model
{
    var string $table = "jobs";
    public function getAlljobs(): false|array|null
    {
        return $this->find(array(
            "order" => ' id',
        ));
    }

    public function saveJob( array $data): bool
    {
        return $this->save($data);
    }

    public function getJob( int $id): object
    {
        return $this->findfirst(array(
            "condition" => 'id=' . $id
        ));
    }
    public function deleteJob( int $id): bool
    {
        return $this->delete(array(
            "condition" => 'id=' . $id,

        ));
    }

}
