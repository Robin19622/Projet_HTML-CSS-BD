<?php
class countrie extends Model
{
    var string $table = "countries";
    public function getAllcountries(): false|array|null
    {
        return $this->find(array(
            "order" => ' id',
        ));
    }

    public function savecountrie( array $data): bool
    {
        return $this->save($data);
    }

    public function getcountrie( int $id): object
    {
        return $this->findfirst(array(
            "condition" => 'id=' . $id
        ));
    }
    public function deletecountrie( int $id): bool
    {
        return $this->delete(array(
            "condition" => 'id=' . $id,

        ));
    }
    public function countAllCountries(): array {
        return $this->find(array(
            "fields" => 'COUNT(*) as total_countries',
            "limit" => ''
        ));
    }
}
