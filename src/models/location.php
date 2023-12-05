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

    

}
