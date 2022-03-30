<?php

use App\Core\Controller;

class CartController extends Controller {

    private $cartModel;
    private $orderModel;
    function __construct() {
        $this->cartModel = $this->model('CartModel');
        $this->orderModel = $this->model('OrderModel');
    }

    function index() {
        if(isset($_SESSION['user'])) {
            $data['user'] = $_SESSION['user'];

            $products = $this->cartModel->getProductByIdUser($data['user']['id']);
            $data['products'] = $products;
        } else {
             $data = [];
        }
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        $this->view("/cart/index", $data);
    }

    function addToCart() {
        //ajax
        if(isset($_GET)) {
            $result = $this->cartModel->addToCart($_GET);
            echo json_encode($result);
            return;
        }
    }

    function removeCart() {

    }

    function deleteInCart($id) {
        if(isset($_SESSION['user'])) {
            $data['user'] = $_SESSION['user'];
            $result = $this->cartModel->deleteInCart($data['user']['id'], $id);
            if($result == true) {
                $products = $this->cartModel->getProductByIdUser($data['user']['id']);
                $data['products'] = $products;
            } 
        } else {
             $data = [];
        }

        $this->view("/cart/index", $data);
    }

    function amountInCart() {
        if(isset($_SESSION['user'])) {
            $amount = $this->cartModel->amountInCart($_SESSION['user']['id']);
            $_SESSION['amountCart'] = $amount;
            echo $amount;
        } else {
            echo 0;
        }
    }

    function checkOut() {
        $data['userId'] = $_SESSION['user']['id'];
        $data['address'] = $_SESSION['user']['address'];
        $data['phone'] = $_SESSION['user']['phone'];

        $productInCarts = $this->cartModel->getProductByIdUser($data['userId']);
        if(!$productInCarts) {
            $productInCarts = [];
        }

        foreach($productInCarts as $key => $product) {
            $id = $product['id'];
            $data['productId'][] = $id;
            $data['amount'][] = intval($_POST["numOfProduct$id"]);
            $data['price'][] = $product['price'];
        }

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // die();
        $result = $this->orderModel->store($data);
        if($result == true) {
            $productInCarts = $this->cartModel->deleteInCart($data['userId']);
        }
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        header("Location:" . DOCUMENT_ROOT . "/home");
    }


}

?>