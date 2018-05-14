<?php

class AdsModel extends Model{
    public function getAds(){
        $sql = "select * from $this->table";
        $ads = $this->db->getAll($sql);
        return $ads;
    }

    public function getAd($id){
        $sql = "select * from $this->table where `id` = $id";
        $ad = $this->db->getAll($sql);
        return $ad[0];
    }

    public function postOne($ad){
        $image = $ad['image'];
        $desc = $ad['description'];
        $sql = "insert into $this->table (`image`, `description`) values ('$image','$desc')";
        if($this->db->query($sql))
            return true;
        else
            return false;
    }
}