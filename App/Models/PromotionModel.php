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

    function getAmount()
    {
        $sql = "SELECT COUNT(*) amount FROM PROMOTION";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    function store($data)
    {
        $name = $data['name'];
        $percent = $data['percent'];
        $startDate = $data['start_date'];
        $endDate = $data['end_date'];

        $stmt = $this->db->prepare("INSERT INTO PROMOTION(name, percent, start_date, end_date) VALUES(?, ?, ?, ?)");
        $stmt->bind_param("siss", $name, $percent, $startDate, $endDate);

        $stmt->execute();
        $result = $stmt->affected_rows;

        if (
            $result < 1
        ) {
            return false;
        } else {
            return true;
        }
    }

    function getById($id) {

        $stmt = $this->db->prepare("SELECT * FROM PROMOTION WHERE id = ? ");

        $stmt->bind_param("i", $id);

        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    function update($data)
    {
        $id = $data['id'];
        $name = $data['name'];
        $percent = $data['percent'];
        $startDate = $data['start_date'];
        $endDate = $data['end_date'];

        $stmt = $this->db->prepare("UPDATE PROMOTION SET name = ?, percent = ?, start_date = ?, end_date = ? WHERE id = ?");
        $stmt->bind_param("sissi", $name, $percent, $startDate, $endDate, $id);
     
        $stmt->execute();
        $result = $stmt->affected_rows;

        if (
            $result < 1
        ) {
            return false;
        } else {
            return true;
        }
    }

}