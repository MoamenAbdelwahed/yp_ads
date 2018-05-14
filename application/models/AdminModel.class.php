<?php

class AdminModel extends Model{
    public function login($username, $password){
        $sql = "select * from $this->table where `username` = '$username' and `password` = '$password'";
        $admin = $this->db->getAll($sql);
        return $admin;
    }
}