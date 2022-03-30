<?php

use App\Core\Controller;

class AccountController extends Controller {

    private $userModel;
    private $orderModel;
    function __construct() {
        $this->userModel = $this->model('UserModel');
        $this->orderModel = $this->model('OrderModel');
    }

    function Index() {
        $this->view("/account/index");
    }
    
    function register() {
       
        $this->view("/account/index");
    }

    function authentication() {
        
        if(isset($_POST)) {
            $result = $this->userModel->authentication($_POST);
            if($result === true) {
                $user = $this->userModel->getByEmail($_POST['email']);

                $_SESSION['user'] = $user;

                header("Location: " . DOCUMENT_ROOT);
                return;
            } else {
                $data['errorAu'][] = $result;
            }
        } else {
            $data['errorAu'][] = "Email và mật khẩu không được để trống!";
        }
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        $this->view("/account/index", $data);
    }

    function signup() {

        if(isset($_POST)) {
            $isValid = true;
            //Validation
            if($_POST['password'] !== $_POST['confirmPassword']) {
                $data['error'][] = "Mật khẩu và nhập lại phải giống nhau";
                $isValid = false;
            }

            $isValiUsername = $this->userModel->checkValidUser($_POST['email']);
            if(!$isValiUsername) {
                $data['error'][] = "Email đã tồn tại";
                $isValid = false;
            }

            if(!$isValid) {
                $this->view("/account/index", $data);
                return;
            }

            $_POST['avatar'] = "";
            // echo '<pre>';
            // print_r($_POST);
            // echo '</pre>';
            $result = $this->userModel->register($_POST);
            if($result == true) {
                $data['message'] = "Đăng ký thành công. Vui lòng đăng nhập!";
                $this->view("/account/index", $data);
            } else {
                $data['error'][] = "Đăng ký không thành công. Vui lòng đăng nhập lại!";
                $this->view("/account/index", $data);
                return;
            }
        }
    }

    function signout() {
        unset($_SESSION['user']);
        unset($_SESSION['amountCart']);
        header("Location: " . DOCUMENT_ROOT);
        return;
    }

    function profile() {
        
        if(isset($_SESSION['user'])) {
            $data['user'] = $_SESSION['user'];
        }

        $orders = $this->orderModel->getOrderUser($_SESSION['user']['id']);
        $data['orders'] = $orders;
        
        if($orders != false) {
            $orderDetails = $this->orderModel->getOrderUserDetails($_SESSION['user']['id']);
            foreach($orders as $key => $order) {
                $data["total$order[id]"] = 0;
                foreach($orderDetails as $index => $orderDetail) {
                    if($order['id'] == $orderDetail['idO']) {
                        $data["orderDetail$order[id]"][$index] = $orderDetail;
                        $sum = $data["total$order[id]"];
                        $sum = $sum + $orderDetail['price_product'] * $orderDetail['amount'];
                        $data["total$order[id]"] = $sum;
                    }
                }
            }
        } else {
            $data['message'] = "Bạn không có lịch sử mua hàng nào!";
        }

        // $data['orders'] = $orders;
        // echo '<pre>';
        // print_r ($data);
        // echo '</pre>';
        // var_dump($_SESSION['user']);

        $this->view("/account/profile", $data);
    }

    function updateInfo($id)
    {
        if (!isset($_POST)) {
            header("Location: " . DOCUMENT_ROOT . "/");
        }

        $data = $_POST;

        $data['id'] = $id;
        $data['phone'] = $_POST['new-phone'];
        $data['address'] = $_POST['new-address'];
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // die();
        $result = $this->userModel->updateInfo($data);
        if ($result) {
            $_SESSION['user']['address'] = $data['address'];
            $_SESSION['user']['phone'] = $data['phone'];
            header("Location: " . DOCUMENT_ROOT . "/account/profile");
        } else {
            if (isset($_SERVER["HTTP_REFERER"])) {
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
        }
    }

    function updateAvatar($id)
    {

        $data['id'] = $id;

        $user = $this->userModel->getById($id);

        if (isset($_FILES["image"])) {
            if ($_FILES["image"]['name'] != "") {
                $randomNum = time();
                $imageName = str_replace(' ', '-', strtolower($_FILES["image"]['name']));
                $imageExt = substr($imageName, strrpos($imageName, '.'));
                $imageExt = str_replace('.', '', $imageExt);
                $newImageName = $randomNum . '.' . $imageExt;

                move_uploaded_file($_FILES["image"]["tmp_name"], PUBLIC_DIR_USER_IMAGES . DS . $newImageName);
                $data["image"] = $newImageName;
            }
        }

        // echo '<pre>';
        // print_r ($user);
        // echo '</pre>';

        $result = $this->userModel->updateAvatar($data);
        if($result != false) {
            unlink(PUBLIC_DIR_USER_IMAGES . DS . $user['avatar']);
        }
        if ($result) {
            $_SESSION['user']['avatar'] = $data['image'];
            header("Location: " . DOCUMENT_ROOT . "/account/profile");
        } else {
            if (isset($_SERVER["HTTP_REFERER"])) {
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
        }
    }


} 

    // function checkValidEmail() {
    //     die(var_dump($_GET['email']));
    //     if(isset($_GET['email'])) {
    //         $result = $this->checkValidEmail($_GET['email'; //nhớ thêm ]) vào nha thôi lỗi đó
    //         if($result == true) {
    //             echo "true";
    //             return;
    //         } else {
    //             echo "false";
    //             return;
    //         }
    //     }
    //     echo "false";
    // }

?>