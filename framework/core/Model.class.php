<?php

class Model{

    protected $db;

    protected $table; 

    protected $fields = array();

    public function __construct($table){ 

        $this->db = new Mysql();

        $this->table = $table;

        $this->getFields();

    }

    /**

     * Get the list of table fields

     *

     */

    private function getFields(){

        $sql = "DESC ". $this->table;

        $result = $this->db->getAll($sql);

        foreach ($result as $v) {

            $this->fields[] = $v['Field'];

            if ($v['Key'] == 'PRI') {

                // If there is PK, save it in $pk

                $pk = $v['Field'];

            }

        }

        // If there is PK, add it into fields list

        if (isset($pk)) {

            $this->fields['pk'] = $pk;

        }

    }

    /**

     * Insert records

     * @access public

     * @param $list array associative array

     * @return mixed If succeed return inserted record id, else return false

     */

    public function insert($list){

        $field_list = '';

        $value_list = '';

        foreach ($list as $k => $v) {

            if (in_array($k, $this->fields)) {

                $field_list .= "`".$k."`" . ',';

                $value_list .= "'".$v."'" . ',';

            }

        }

        // Trim the comma on the right

        $field_list = rtrim($field_list,',');

        $value_list = rtrim($value_list,',');

        // Construct sql statement

        $sql = "INSERT INTO `{$this->table}` ({$field_list}) VALUES ($value_list)";

        if ($this->db->query($sql)) {

            // Insert succeed, return the last record’s id

            return $this->db->getInsertId();

            //return true;

        } else {

            // Insert fail, return false

            return false;

        }

       

    }

    /**

     * Update records

     * @access public

     * @param $list array associative array needs to be updated

     * @return mixed If succeed return the count of affected rows, else return false

     */

    public function update($list){

        $uplist = ''; 

        $where = 0;

        foreach ($list as $k => $v) {

            if (in_array($k, $this->fields)) {

                if ($k == $this->fields['pk']) {

                    $where = "`$k`=$v";

                } else {

                    $uplist .= "`$k`='$v'".",";

                }

            }

        }

        $uplist = rtrim($uplist,',');

        $sql = "UPDATE `{$this->table}` SET {$uplist} WHERE {$where}";

        if ($this->db->query($sql)) {

           return true;    

        } else {

            return false;
        }

    }

    /**

     * Delete records

     * @access public

     * @param $pk mixed could be an int or an array

     * @return mixed If succeed, return the count of deleted records, if fail, return false

     */

    public function delete($pk){

        $where = 0;


        if (is_array($pk)) {


            $where = "`{$this->fields['pk']}` in (".implode(',', $pk).")";

        } else {


            $where = "`{$this->fields['pk']}`=$pk";

        }


        $sql = "DELETE FROM `{$this->table}` WHERE $where";

        if ($this->db->query($sql)) {


            return true;        

        } else {

            return false;

        }

    }

    /**

     * Get info based on PK

     * @param $pk int Primary Key

     * @return array an array of single record

     */

    public function selectByPk($pk){

        $sql = "select * from `{$this->table}` where `{$this->fields['pk']}`=$pk";

        return $this->db->mysql_fetch_row($sql);

    }

    /**

     * Get the count of all records

     *

     */

    public function total(){

        $sql = "select count(*) from {$this->table}";

        return $this->db->getOne($sql);

    }

}