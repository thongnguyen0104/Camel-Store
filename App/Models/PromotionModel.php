<?php

use App\Core\Database;

class PromotionModel extends Database {

    function all() {

        $sql = "SELECT * FROM PROMOTION";
        $result = $this->db->query($sql);

        if($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

}