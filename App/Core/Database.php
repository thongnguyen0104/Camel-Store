<?php 

namespace App\Core;

use mysqli;

class Database {

    protected $db;
    function __construct() {

        $this->db = new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if($this->db->connect_error) {
            die("Ket noi that bai: " . $this->db->connect_error);
        }
        $this->db->set_charset("utf8");
    }
}

?>