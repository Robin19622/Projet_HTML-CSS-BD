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
    public function savelocation($data)
    {
        return $this->save($data);
    }

    public function getlocation($id)
    {
        return $this->findfirst(array(
            "condition" => 'id=' . $id
        ));
    }
    public function deletelocation($id)
    {
        return $this->delete(array(
            "condition" => 'id=' . $id,

        ));
    }

    

}
