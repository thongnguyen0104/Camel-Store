<?php

use App\Core\Database;

class OrderModel extends Database {

    function store($data = []) {

        $data['statusId'] = "CXL";
        $data['order_date'] = date("Y-m-d");

        $stmt = $this->db->prepare("INSERT INTO ORDERS (order_date, id_user, id_status, address, phone) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sisss", $data['order_date'], $data['userId'], $data['statusId'], $data['address'], $data['phone']);

        $isSuccess = $stmt->execute();
        if(!$isSuccess) {
            return $stmt->error;
        } else if($stmt->affected_rows <= 0) {
            return "Thêm đơn hàng không thành công";
        }

        $id_order = $this->db->query("SELECT LAST_INSERT_ID()");
        if(!$id_order) {
            return $this->db->error;
        }
        $id_order = $id_order->fetch_row()[0];

        for($i = 0; $i < count($data['productId']); $i++) {
            $stmt = $this->db->prepare("INSERT INTO ORDER_DETAILS (id_order, id_product, amount, price_product) VALUES (?, ?, ?, ?)");

            if($stmt) {
                $stmt->bind_param("iiii", $id_order, $data['productId'][$i], $data['amount'][$i], $data['price'][$i]);
                $isSuccess = $stmt->execute();

                if(!$isSuccess) {
                    $deleteStmt = $this->db->prepare("DELETE FROM ORDER WHERE id = ?");
                    $deleteStmt->bind_param("i", $id_order);

                    $isDeleteSuccess = $deleteStmt->execute();
                    if(!$isDeleteSuccess) {
                        return $deleteStmt->error;
                    }
                    return $stmt->error;
                } else if($stmt->affected_rows <= 0) {
                    return "Thêm chi tiết đơn hàng không thành công";
                }
            } else {
                return $stmt;
            }
        }
        return true;

    }
// Admin
    function all()
    {
        $sql = "SELECT DISTINCT O.id, O.order_date, O.delivery_date, U.name, S.name nameST FROM ORDERS O JOIN USERS U ON O.id_user = U.id JOIN STATUS S ON S.id=O.id_status JOIN ORDER_DETAILS OD ON OD.id_order ORDER BY O.id";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    function getAmount()
    {
        $sql = "SELECT COUNT(*) amount FROM ORDERS";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    function getDetail($id = 0)
    {
        if($id==0) {
            $sql = "SELECT * FROM ORDER_DETAILS";
            $result = $this->db->query($sql);
        } else {
            $sql = "SELECT * FROM ORDER_DETAILS WHERE id_order = $id";
            $result = $this->db->query($sql);
        }

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM ORDERS WHERE id = ?");

        $stmt->bind_param("i", $id);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    function getNameById($id)
    {
        $stmt = $this->db->prepare("SELECT DISTINCT u.name FROM ORDERS O JOIN USERS U ON O.id_user = U.id WHERE O.id = ?");
        $stmt->bind_param("i", $id);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    function update($data)
    {
        $id = $data['id'];
        $statusId = $data['statusId'];
        $delivery_date = $data['delivery_date'];

        $stmt = $this->db->prepare("UPDATE ORDERS SET id_status = ?, delivery_date = ? WHERE id = ?");
        $stmt->bind_param("sss", $statusId, $delivery_date, $id);

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
        $stmt = $this->db->prepare("DELETE FROM ORDERS WHERE  id = ?");
        $stmt->bind_param("i", $id);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        }
        return false;
    }

    function getOrderUser($id) {
        $stmt = $this->db->prepare("SELECT O.id, O.order_date, O.delivery_date, O.id_user, O.id_status, O.address, O.phone, ST.name FROM ORDERS O JOIN STATUS ST ON O.id_status = ST.id WHERE O.id_user = ?");
        $stmt->bind_param("i", $id);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    function getOrderUserDetails($id)
    {
        $stmt = $this->db->prepare("SELECT DISTINCT O.id idO, P.`name` nameP, P.image1 imageP, OD.price_product, OD.amount FROM ORDERS O JOIN USERS U ON O.id_user = U.id JOIN ORDER_DETAILS OD ON OD.id_order = O.id JOIN PRODUCTS P ON P.id = OD.id_product WHERE O.id_user = ?");
        $stmt->bind_param("i", $id);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    function getOrderDetails($id)
    {
        $stmt = $this->db->prepare("SELECT DISTINCT O.id idO, P.`name` nameP, P.image1 imageP, OD.price_product, OD.amount FROM ORDERS O JOIN USERS U ON O.id_user = U.id JOIN ORDER_DETAILS OD ON OD.id_order = O.id JOIN PRODUCTS P ON P.id = OD.id_product WHERE O.id = ?");
        $stmt->bind_param("i", $id);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

}

?>