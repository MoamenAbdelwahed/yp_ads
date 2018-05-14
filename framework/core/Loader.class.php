<?php

class Loader{

    // Load library classes

    public function library($lib){

        include LIB_PATH . "$lib.class.php";

    }


    // loader helper functions

    public function helper($helper){

        include HELPER_PATH . "{$helper}_helper.php";

    }

}