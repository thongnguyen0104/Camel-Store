<?php

use App\Core\Controller;

class LoginController extends Controller{

    private $cakeModel;
    private $categoryModel;
    private $orderModel;
    private $userModel;

    function __construct(){
        $this->orderModel = $this->model('OrderModel');
        $this->userModel = $this->model('UserModel');
    }

    function Index() {
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // $this->view("/admin/login/index");
        require_once(VIEW . DS . 'admin/login/index.php');
    }

    function signout()
    {
        unset($_SESSION['admin']);
        unset($_SESSION['amountCart']);
        header("Location: " . DOCUMENT_ROOT . DS . "admin");
        return;
    }

    function authentication()
    {

        if (isset($_POST)) {
            $result = $this->userModel->authenticationAdmin($_POST);
            if ($result === true) {
                $admin = $this->userModel->getByEmail($_POST['email']);

                $_SESSION['admin'] = $admin;

                header("Location: " . DOCUMENT_ROOT . DS . "admin");
                return;
            } else {
                $data['errorAu'][] = $result;
            }
        } else {
            $data['errorAu'][] = "Email and password can't be empty!";
        }
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        $this->view("admin/login/index", $data);
    }

}
