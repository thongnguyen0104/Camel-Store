<?php

use App\Core\Controller;

class HomeController extends Controller {

    private $productModel;
    private $categoryModel;
    function __construct() {
        $this->productModel = $this->model('ProductModel');
        $this->categoryModel = $this->model('CategoryModel');
    }

    function Index() {

        $page = 1;
        $limit = 16;
        $pageCount = 1;

        $pageCount = $this->productModel->getPageCount($limit);
        $data['pageCount'] = $pageCount;

        if(isset($_GET['page']) && $_GET['page'] > 0) {
            $page = $_GET['page'];
            if($_GET['page'] > $pageCount) {
                $page = $pageCount;
            }
        }

        // if(isset($_GET['page'])) {
        //     $page = $_GET['page'];
        // }

        if(isset($_GET['limit'])) {
            $limit = $_GET['limit'];
        }

        $data['page'] = $page;
        
        $products = $this->productModel->all($page, $limit);

        if(!$products) {
            $products = [];
        }
        $data['products'] = $products;

        $data['categories'] = $this->categoryModel->all();

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';

        $this->view("/home/index", $data);
    }

}

?>