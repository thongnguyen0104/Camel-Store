<?php

use App\Core\Controller;

class HomeController extends Controller {

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

        if(!$products) {
            $products = [];
        }
        $data['products'] = $products;
        $data['categories'] = $this->categoryModel->all();

        $data['date_time'] = date('Y-m-d H:i:s');
        $data['starProduct'] = $this->commentModel->getStarProduct();

        foreach ($data['products'] as $index => $product) {
            $totalStar = 0.0;
            $avgStar = 0.0;
            $count = 0;
            foreach ($data['starProduct'] as $starIndex => $starProduct) {
                if($product['id'] == $starProduct['id']) {
                    $totalStar = $totalStar + $starProduct['star'];
                    $count ++;
                }
            }
            $avgStar = $totalStar / $count;
            $data['products'][$index]['avgStar'] = $avgStar;
        }


        // print_r($data['products'][0]['price']);

        // echo '<pre>';
        // print_r($data['products']);
        // echo '</pre>';

        $this->view("/home/index", $data);
    }

}

?>