<?php

use App\Core\Controller;

class HomeController extends Controller{

    private $productModel;
    private $categoryModel;
    private $orderModel;
    private $userModel;
    private $commentModel;

    function __construct(){
        $this->orderModel = $this->model('OrderModel');
        $this->userModel = $this->model('UserModel');
        $this->categoryModel = $this->model('CategoryModel');
        $this->productModel = $this->model('ProductModel');
        $this->commentModel = $this->model('CommentModel');
    }

    function Index() {

        $order = $this->orderModel->getAmount();
        $data['orders'] = $order[0]['amount'];

        $user = $this->userModel->getAmount();
        $data['users'] = $user[0]['amount'];

        $categories = $this->categoryModel->getAmount();
        $data['categories'] = $categories[0]['amount'];

        $products = $this->productModel->getAmount();
        $data['products'] = $products[0]['amount'];

        $comments = $this->commentModel->getAmount();
        $data['comments'] = $comments[0]['amount'];

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        $this->view("/admin/home/index", $data);
    }


}

?>