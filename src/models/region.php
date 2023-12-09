<?php
class region extends Model
{
    var string $table = "regions";
    public function getAllRegions(): false|array|null
    {
        return $this->find(array(
            "order" => ' id',
        ));
    }

}
