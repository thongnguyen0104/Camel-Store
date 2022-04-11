<?php

use App\Core\Database;

class CommentModel extends Database {

    function all($page = 0, $limit = 16) {
        
        if($page === 0) {
            $sql = "SELECT * FROM PRODUCTS";
            $result = $this->db->query($sql);

            if($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return false;
            }
        } else {
            $index = ($page -1) * $limit;
            $sql = "SELECT * FROM PRODUCTS order by id asc LIMIT $index, $limit";

            $result = $this->db->query($sql);

            if($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return false;
            }
        }
    }

    function getById($id) {

        $stmt = $this->db->prepare("SELECT cmt.id, cmt.id_user, cmt.content, cmt.star, cmt.date, user.name, user.avatar FROM COMMENTS cmt JOIN USERS user ON cmt.id_user = user.id JOIN PRODUCTS prt ON cmt.id_product = prt.id WHERE prt.id = ?");

        $stmt->bind_param("i", $id);

        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    function store($data)
    {
        $content = $data['content'];
        $id_user = $data['id_user'];
        $id_product = $data['id_product'];
        $star = $data['star-rank'];
        $date = $data['date_time'];

        $stmt = $this->db->prepare("INSERT INTO COMMENTS (content, id_user, id_product, star, date) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("siiis", $content, $id_user, $id_product, $star, $date);

        $stmt->execute();
        $result = $stmt->affected_rows;

        if ($result < 1
        ) {
            return false;
        } else {
            return true;
        }
    }

    function getAmount()
    {
        $sql = "SELECT COUNT(*) amount FROM COMMENTS";
        $result = $this->db->query($sql);
        
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }
}