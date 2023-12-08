<?php
class location extends Model
{
    var $table = "locations";
    public function getAlllocations(): false|array|null
    {
        return $this->find(array(
            "order" => ' id',
        ));
    }
    public function savelocation(array $data): bool
    {
        return $this->save($data);
    }

    public function getlocation(int $id): object
    {
        return $this->findfirst(array(
            "condition" => 'id=' . $id
        ));
    }
    public function deletelocation(int $id): bool
    {
        return $this->delete(array(
            "condition" => 'id=' . $id,

        ));
    }
    public function countAllLocations(): array {
        return $this->find(array(
            "fields" => 'COUNT(*) as total_locations',
            "limit" => ''
        ));
    }
}
