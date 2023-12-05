<?php
class region extends Model
{
    var $table = "regions";
    public function getAllRegions(): false|array|null
    {
        return $this->find(array(
            "order" => ' id',
        ));
    }

}
