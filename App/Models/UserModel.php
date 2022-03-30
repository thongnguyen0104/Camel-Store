<?php

use App\Core\Database;

class UserModel extends Database {

    function authentication($data) {
        $email = $data['email'];
        $password = $data['password'];

        $stmt = $this->db->prepare("SELECT * FROM USERS WHERE Email = ?");
        $stmt->bind_param("s", $email);

        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0) {
            $passwordHashed = $result->fetch_assoc()['password'];

            $isValidPassword = password_verify($password, $passwordHashed);

            if($isValidPassword == true) {
                return true;
            } else {
                return "Mật khẩu không đúng";
            }
        } else {
            return "Email không tồn tại: " . $email; 
        }
    }

    function authenticationAdmin($data)
    {
        $email = $data['email'];
        $password = $data['password'];
        $role = 0;

        $stmt = $this->db->prepare("SELECT * FROM USERS WHERE Email = ? AND role = ?");
        $stmt->bind_param("si", $email, $role);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $passwordHashed = $result->fetch_assoc()['password'];

            $isValidPassword = password_verify($password, $passwordHashed);

            if ($isValidPassword == true) {
                return true;
            } else {
                return "Mật khẩu không đúng";
            }
        } else {
            return "Email không tồn tại: " . $email;
        }
    }

    function getByEmail($email) {

        $stmt = $this->db->prepare("SELECT id, name, email, avatar, address, phone FROM USERS WHERE email = ? ");

        $stmt->bind_param("s", $email);

        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    function getById($id)
    {

        $stmt = $this->db->prepare("SELECT id, name, email, avatar, address, phone FROM USERS WHERE id = ? ");

        $stmt->bind_param("i", $id);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    function register($data) {

        $name = $data['name'];
        $email = $data['email'];
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $avatar = $data['avatar'];
        $role = 1;

        $stmt = $this->db->prepare("INSERT INTO USERS(name, email, password, avatar, role) VALUE (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $name, $email, $password, $avatar, $role);

        $stmt->execute();
        $result = $stmt->affected_rows;

        if($result < 1) {
            return false;
        } else {
            return true; 
        }
    }

    function checkValidUser($email) {

        $stmt = $this->db->prepare("SELECT * FROM USERS WHERE Email = ?");
        $stmt->bind_param("s", $email);

        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0) {
            return false;
        } else {
            return true; 
        }
    }

    function updateInfo($data)
    {
        $id = $data['id'];
        $address = $data['address'];
        $phone = $data['phone'];

        $stmt = $this->db->prepare("UPDATE USERS SET address = ?, phone= ? WHERE id = ?");
        $stmt->bind_param("ssi", $address, $phone, $id);

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

    function updateAvatar($data)
    {
        $id = $data['id'];
        $image = $data['image'];

        $stmt = $this->db->prepare("UPDATE USERS SET avatar = ? WHERE id = ?");
        $stmt->bind_param("si", $image, $id);

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

    function all()
    {
        $sql = "SELECT id, name, phone, address, email, avatar FROM USERS WHERE role = '1' ";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    
    function getAmount()
    {
        $sql = "SELECT COUNT(*) amount FROM USERS WHERE role = '1' ";
        $result = $this->db->query($sql);
        
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }
    
    function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM USERS WHERE  id = ?");
        $stmt->bind_param("i", $id);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        }
        return false;
    }
    

}

?>