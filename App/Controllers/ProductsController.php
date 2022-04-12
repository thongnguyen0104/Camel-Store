<?php

use App\Core\Controller;

class ProductsController extends Controller {

    private $productModel;
    private $categoryModel;
    private $commentModel;
    function __construct() {
        $this->productModel = $this->model('ProductModel');
        $this->categoryModel = $this->model('CategoryModel');
        $this->commentModel = $this->model('CommentModel');
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

        if(isset($_GET['limit'])) {
            $limit = $_GET['limit'];
        }

        $data['page'] = $page;

        $products = $this->productModel->all($page, $limit);
        $data['products'] = $products;

        $categories = $this->categoryModel->all();
        $data['categories'] = $categories;

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';

        $this->view("/products/index", $data);
    }

    function Search() {

        $page = 1;
        $limit = 16;
        $pageCount = 1;

        $keyword = $_GET['keyword'];
        $pageCount = $this->productModel->getPageCountKeyword($keyword, $limit);
        $data['pageCount'] = $pageCount;

        if(isset($_GET['page']) && $_GET['page'] > 0) {
            $page = $_GET['page'];
            if($_GET['page'] > $pageCount) {
                $page = $pageCount;
            }
        }

        if(isset($_GET['limit'])) {
            $limit = $_GET['limit'];
        }

        $data['page'] = $page;

        // $keyword = $_GET['keyword'];
        // $products = $this->productModel->getByKeyword($keyword);
        $products = $this->productModel->getByKeywordLimit($keyword, $page, $limit);

        $data['keyword'] = $keyword;

        $data['products'] = $products;
        
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';

        $this->view("/products/search", $data);
    }


    function Details($id) {

        $products = $this->productModel->getById($id);
        $comments = $this->commentModel->getById($id);

        if($comments != false) {
            $data['comments'] = $comments;
        } else {
            $data['comments'] = "Chưa có đánh giá nào";
        }
        $data['products'] = $products;
        // $data['star'] = $comments['star'];

        $productsSame = $this->productModel->getByIdCategory($data['products']['id_product_type']);
        $data['productsSame'] = $productsSame;

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        
        // $data['session'] = $_SESSION['user'];
        // echo '<pre>';
        // print_r($_SESSION['user']['id']);
        // // print_r($data);
        // echo '</pre>';
        $this->view("/products/details", $data);
    }

    function Categories($id) {

        $products = $this->productModel->getByIdCategory($id);
        $categories = $this->categoryModel->all();

        $data['products'] = $products;
        $data['categories'] = $categories;
        

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';

        $this->view("/products/categories", $data);
    }

    function Evaluation($id) {

        $data = $_POST;
        $data['id_product'] = $id;
        $data['id_user'] = $_SESSION['user']['id'];
        $data['date_time'] = date('Y-m-d H:i:s');

        $comments = $this->commentModel->getById($id);

        $data['comments'] = $comments;
        if($comments != false) {
            foreach($comments as $index => $comment) {
                if ($comment['id_user'] == $_SESSION['user']['id']) {
                    $data['checkComment'] = "1";
                }
            }
        }
            

        $result = $this->commentModel->store($data);
        if($result != false) {
            $data['result'] = "Lưu comment thành công!";
        } else {
            $data['result'] = "Lưu không thành công!";
        }

        // echo '<pre>';
        // print_r($data['result']);
        // print_r($data);
        // echo '</pre>';

        // Lay binh luan cua san pham
        $comments = $this->commentModel->getById($id);
        if($comments != false) {
            $data['comments'] = $comments;
        } else {
            $data['comments'] = "Chưa có đánh giá nào";
        }
        
        // Lay chi tiet san pham
        $products = $this->productModel->getById($id);
        $data['products'] = $products;

        // Lay san pham cung loai
        $productsSame = $this->productModel->getByIdCategory($data['products']['id_product_type']);
        $data['productsSame'] = $productsSame;
        
        // $data['session'] = $_SESSION['user'];
        // echo '<pre>';
        // print_r($_SESSION['user']['id']);
        // echo '</pre>';

        $this->view("/products/details", $data);
    }


}

?>