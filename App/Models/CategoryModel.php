<?php

use App\Core\Database;

class CategoryModel extends Database {

    function all() {
        $sql = 'SELECT * FROM PRODUCT_TYPE';
        $result = $this->db->query($sql);

        if($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    function getById($id) {

        $stmt = $this->db->prepare("SELECT * FROM PRODUCT_TYPE WHERE id = ? ");

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
        $description = $data['description'];
        $image = $data['image'];

        $stmt = $this->db->prepare("UPDATE PRODUCT_TYPE SET name = ?, description = ?, image = ? WHERE id = ?");
        $stmt->bind_param("sssi", $name, $description, $image, $id);

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

    function store($data)
    {
        $name = $data['name'];
        $description = $data['description'];
        $imageName = $data['image'];

        $stmt = $this->db->prepare("INSERT INTO PRODUCT_TYPE(name, description, image) VALUES(?, ?, ?)");
        $stmt->bind_param("sss", $name, $description, $imageName);

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

    function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM PRODUCT_TYPE WHERE  id = ?");
        $stmt->bind_param("i", $id);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        }
        return false;
    }

    function getAmount()
    {
        $sql = "SELECT COUNT(*) amount FROM PRODUCT_TYPE";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }


}


?>