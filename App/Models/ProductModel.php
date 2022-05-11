<?php

use App\Core\Database;

class ProductModel extends Database {

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
            $sql = "SELECT prt.id, prt.`name`, prt.price, prt.image1, pro.percent, pro.start_date, pro.end_date FROM products prt JOIN promotion pro ON prt.id_promotion=pro.id order by prt.id asc LIMIT $index, $limit";

            $result = $this->db->query($sql);

            if($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return false;
            }
        }
    }

    function getById($id) {

        $stmt = $this->db->prepare("SELECT * FROM PRODUCTS WHERE id = ? ");

        $stmt->bind_param("i", $id);

        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    function getByKeyword($keyword) {

        $keyword = '%' . $keyword . '%';
        $stmt = $this->db->prepare("SELECT * FROM PRODUCTS WHERE name like ? ");

        $stmt->bind_param("s", $keyword);

        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    function getByKeywordLimit($keyword, $page = 0, $limit = 16) {

        $keyword = '%' . $keyword . '%';
        $index = ($page -1) * $limit;
        $stmt = $this->db->prepare("SELECT prt.id, prt.`name`, prt.price, prt.image1, pro.percent, pro.start_date, pro.end_date FROM products prt JOIN promotion pro ON prt.id_promotion=pro.id WHERE prt.name like '$keyword' order by id asc LIMIT $index, $limit ");

        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    function getByIdCategory($id) {

        $stmt = $this->db->prepare("SELECT prt.id, prt.`name`, prt.price, prt.image1, pro.percent, pro.start_date, pro.end_date FROM products prt JOIN promotion pro ON prt.id_promotion=pro.id WHERE id_product_type = ? order by prt.id asc");
        
        $stmt->bind_param("i", $id);

        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    function getPageCount($limit) {

        $sql = 'SELECT count(*) FROM PRODUCTS';
        $result = $this->db->query($sql);

        $totalRow = $result->fetch_row()[0];

        $pageCount = ceil($totalRow / $limit);
        return $pageCount;
    }

    function getPageCountKeyword($keyword, $limit) {
        $keyword = '%' . $keyword . '%';
        $sql = "SELECT count(*) FROM PRODUCTS WHERE name like '$keyword'";
        $result = $this->db->query($sql);

        $totalRow = $result->fetch_row()[0];

        $pageCount = ceil($totalRow / $limit);
        return $pageCount;
    }

    // ADMIN
    function store($data)
    {
        $name = $data['name'];
        $categoryId = $data['categoryId'];
        $price = $data['price'];
        $description = $data['description'];
        $imageName1 = $data['image1'];
        $imageName2 = $data['image2'];
        $imageName3 = $data['image3'];
        $imageName4 = $data['image4'];
        $imageName5 = $data['image5'];

        $stmt = $this->db->prepare("INSERT INTO PRODUCTS(name, id_product_type, price, description, image1, image2, image3, image4, image5) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("siissssss", $name, $categoryId, $price, $description, $imageName1, $imageName2, $imageName3, $imageName4, $imageName5);

        $stmt->execute();
        $result = $stmt->affected_rows;

        if ($result < 1
        ) {
            return false;
        } else {
            return true;
        }
    }

    function update($data)
    {
        $id = $data['id'];
        $name = $data['name'];
        $categoryId = $data['categoryId'];
        $price = $data['price'];
        $description = $data['description'];
        $imageName1 = $data['image1'];
        $imageName2 = $data['image2'];
        $imageName3 = $data['image3'];
        $imageName4 = $data['image4'];
        $imageName5 = $data['image5'];
        $promotionId = $data['promotionId'];

        $stmt = $this->db->prepare("UPDATE PRODUCTS SET name = ?, id_product_type = ?, price = ?, description = ?, image1 = ?, image2 = ?, image3 = ?, image4 = ?, image5 = ?, id_promotion = ? WHERE id = ?");
        $stmt->bind_param("siissssssii", $name, $categoryId, $price, $description, $imageName1, $imageName2, $imageName3, $imageName4, $imageName5, $promotionId, $id);

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

    function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM PRODUCTS WHERE  id = ?");
        $stmt->bind_param("i", $id);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        }
        return false;
    }

    function getAmount()
    {
        $sql = "SELECT COUNT(*) amount FROM PRODUCTS";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

}


?>