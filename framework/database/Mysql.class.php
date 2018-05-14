<?php

class Mysql{

    protected $conn = false;

    protected $sql;

   

    /**

     * Constructor, to connect to database, select database and set charset

     * @param $config string configuration array

     */

    public function __construct($config = array()){

        $host = isset($config['host'])? $config['host'] : 'localhost';

        $user = isset($config['user'])? $config['user'] : 'root';

        $password = isset($config['password'])? $config['password'] : '';

        $dbname = isset($config['dbname'])? $config['dbname'] : 'ads';

        $port = isset($config['port'])? $config['port'] : '3306';

        $charset = isset($config['charset'])? $config['charset'] : '3306';

       

        $this->conn = mysqli_connect("$host:$port",$user,$password) or die('Database connection error');

        mysqli_select_db($this->conn,$dbname) or die('Database selection error');

    }


    /**

     * Execute SQL statement

     * @access public

     * @param $sql string SQL query statement

     * @return $result，if succeed, return resrouces; if fail return error message and exit

     */

    public function query($sql){        

        $this->sql = $sql;

        $result = mysqli_query($this->conn,$this->sql);       

        if (! $result) {

            die($this->errno().':'.$this->error().'<br />Error SQL statement is '.$this->sql.'<br />');

        }

        return $result;

    }


    /**

     * Get all records

     * @access public

     * @param $sql SQL query statement

     * @return $list an 2D array containing all result records

     */

    public function getAll($sql){

        $result = $this->query($sql);

        $list = array();

        while ($row = mysqli_fetch_assoc($result)){

            $list[] = $row;

        }

        return $list;

    }


    /**

     * Get error number

     * @access private

     * @return error number

     */

    public function errno(){

        return mysqli_errno($this->conn);

    }

    /**

     * Get error message

     * @access private

     * @return error message

     */

    public function error(){

        return mysqli_error($this->conn);

    }

}