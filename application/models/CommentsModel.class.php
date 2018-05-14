<?php

class CommentsModel extends Model{
    public function getComments($id){
        $sql = "select * from $this->table where `ad_id` = $id";
        $comments = $this->db->getAll($sql);
        return $comments;
    }

    public function postOne($id,$comment){
        $name = $comment['name'];
        $c = $comment['comment'];
        $date = Date("Y-m-d");
        $sql = "insert into $this->table (`name`, `comment`, `created_at`, `ad_id`, `approved`) values ('$name','$c','$date','$id','1')";
        if($this->db->query($sql))
            return true;
        else
            return false;
    }
}