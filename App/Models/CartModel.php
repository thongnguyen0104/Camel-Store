<?php

use App\Core\Database;

class CartModel extends Database {

    function addToCart($data) {

        if(!isset($data['userId']) || !isset($data['productId'])) {
            return [
                'isSuccess' => false,
                'numInCart' => 0,
                'error' => "Empty user id or cake id"
            ];
        }

        $productId = $data['productId'];
        $userId = $data['userId'];
        $amount = 1;
        // $amount = isset($data['amount']) ? $data['amount'] : 1;

        $amountIncart = $this->checkProductInCart($userId, $productId);
        $isSuccess = true;
        $error = "";

        if($amountIncart > 0) {
            $amount += $amountIncart;
            $stmt = $this->db->prepare("UPDATE CART SET amount = ? WHERE id_user = ? AND id_product = ?");
            $stmt->bind_param("iii", $amount, $userId, $productId);

            $stmt->execute();
            if($stmt->error) {
                $isSuccess = false;
                $error = $stmt->error;
            }
        } else {
            $stmt = $this->db->prepare("INSERT INTO CART(id_product, id_user, amount) VALUE (?, ?, ?)");
            $stmt->bind_param("iii", $productId, $userId, $amount);

            $stmt->execute();
            if($stmt->error) {
                $isSuccess = false;
                $error = $stmt->error;
            }
        }

        $numInCart = $this->amountInCart($userId);
        return [
            'isSuccess' => $isSuccess,
            'numInCart' => $numInCart,
            'error' => $error
        ];
    }

    function checkProductInCart($userId, $productId) {

        $stmt = $this->db->prepare("SELECT * FROM CART WHERE  id_product = ? AND id_user = ?");
        $stmt->bind_param("ii", $productId, $userId);

        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0) {
            return $result->fetch_assoc()['amount'];
        }
        return 0;
    }


    function amountInCart($userId) {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM CART WHERE id_user = ?");
        $stmt->bind_param("i", $userId);

        $stmt->execute();

        $result = $stmt->get_result();

        return $result->fetch_row()[0];
    }

    function updateCart($userId, $productId, $amount) {
        
        $stmt = $this->db->prepare("UPDATE CART SET amount = ? WHERE id_user = ? AND id_product = ?");
        $stmt->bind_param("iii", $amount, $userId, $productId);
        $stmt->execute();
        
        if($stmt->affected_rows > 0) {
            return true;
        }
        return false;
    }

    function deleteInCart($userId, $productId = "") {
        if($productId !== "") {
            $stmt = $this->db->prepare("DELETE FROM CART WHERE  id_product = ? AND id_user = ?");
            $stmt->bind_param("ii", $productId, $userId);
        } else {
            $stmt = $this->db->prepare("DELETE FROM CART WHERE id_user = ?");
            $stmt->bind_param("i", $userId);
        }

        $stmt->execute();

        if($stmt->affected_rows > 0) {
            return true;
        }
        return false;
    }

    function getProductByIdUser($userId) {
        $stmt = $this->db->prepare("SELECT PR.id, PR.`name`, PR.price, PR.image1, CR.amount, PRO.percent, PRO.start_date, PRO.end_date, PRO.`check` FROM CART CR JOIN PRODUCTS PR ON CR.id_product = PR.id JOIN PROMOTION PRO ON PR.id_promotion = PRO.id WHERE CR.id_user = ?");
        $stmt->bind_param("i", $userId);

        $stmt->execute();

       $result = $stmt->get_result();

        if($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    // function getProductByIdUser($userId) {
    //     $stmt = $this->db->prepare("SELECT * FROM CART CR JOIN PRODUCTS PR ON CR.id_product = PR.id WHERE CR.id_user = ?");
    //     $stmt->bind_param("i", $userId);

    //     $stmt->execute();

    //    $result = $stmt->get_result();

    //     if($result->num_rows > 0) {
    //         return $result->fetch_all(MYSQLI_ASSOC);
    //     } else {
    //         return false;
    //     }
    // }
}

?>