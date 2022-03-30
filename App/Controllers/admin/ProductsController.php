<?php

use App\Core\Controller;

class ProductsController extends Controller{

    private $productModel;
    private $categoryModel;

    function __construct(){
        $this->productModel = $this->model('ProductModel');

        $this->categoryModel = $this->model('CategoryModel');
    }

    function Index(){

        $products = $this->productModel->all();

        $data['products'] = $products;
        
        $this->view('/admin/products/index', $data);
    }

    function create(){

        $categories = $this->categoryModel->all();

        $data['categories'] = $categories;
 
        $this->view('/admin/products/create', $data);
    }

    function store(){

       if(!isset($_POST)){
           header("Location: " . DOCUMENT_ROOT . "/admin");
       }
        
        $data = $_POST;

        $data['name'] = $_POST['name'];
        $data['categoryId'] = $_POST['categoryId'];
        $data['price'] = $_POST['price'];
        $data['description'] = $_POST['description'];
        $data['image1'] = "";
        $data['image2'] = "";
        $data['image3'] = "";
        $data['image4'] = "";
        $data['image5'] = "";

        // handle image
        // $output_dir = PUBLIC_DIR_PRODUCT_IMAGES; //Path for file upload
        // die(var_dump(PUBLIC_DIR_PRODUCT_IMAGES));

        for($i = 1; $i <=5; $i++) {
            if (isset($_FILES["image$i"])) {
                if ($_FILES["image$i"]['name'] != "") {
                    $randomNum = time() + $i;
                    $imageName = str_replace(' ', '-', strtolower($_FILES["image$i"]['name']));
                    $imageExt = substr($imageName, strrpos($imageName, '.'));
                    $imageExt = str_replace('.', '', $imageExt);
                    $newImageName = $randomNum . '.' . $imageExt;

                    move_uploaded_file($_FILES["image$i"]["tmp_name"], PUBLIC_DIR_PRODUCT_IMAGES . DS . $newImageName);
                    $data["image$i"] = $newImageName;
                }
            }
        }

        $result = $this->productModel->store($data);
        if($result){
            $_SESSION['message'] = "Thêm sản phẩm thành công";
            header("Location: " . DOCUMENT_ROOT . "/admin/products");
        }else {
            if(isset($_SERVER["HTTP_REFERER"])){
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
        }
    }

    function edit($id){

        $product = $this->productModel->getById($id);
        if(!$product){
            header("Location: " . DOCUMENT_ROOT . "/admin/products");
        }
        $categories = $this->categoryModel->all();

        $data['categories'] = $categories;

        $data['product'] = $product;

        $this->view('/admin/products/edit', $data);
    }

    function update($id){

       if(!isset($_POST)){
           header("Location: " . DOCUMENT_ROOT . "/admin");
       }

        // $data = $_POST;

        $product = $this->productModel->getById($id);

        $data['image1'] = "";
        $data['image2'] = "";
        $data['image3'] = "";
        $data['image4'] = "";
        $data['image5'] = "";
        // $data = $_FILES;
        for ($i=1; $i <= 5; $i++) {
            if (isset($_FILES["image$i"])) {
                if ($_FILES["image$i"]['name'] != "") {
                    $randomNum = time() + $i;
                    $imageName = str_replace(' ', '-', strtolower($_FILES["image$i"]['name']));
                    $imageExt = substr($imageName, strrpos($imageName, '.'));
                    $imageExt = str_replace('.', '', $imageExt);
                    $newImageName = $randomNum . '.' . $imageExt;

                    move_uploaded_file($_FILES["image$i"]["tmp_name"], PUBLIC_DIR_PRODUCT_IMAGES . DS . $newImageName);
                    $data["image$i"] = $newImageName;
                    unlink(PUBLIC_DIR_PRODUCT_IMAGES . DS . $product["image$i"]);
                } else {
                    $data["image$i"] = $product["image$i"];
                }
            }
        }

        
        $data['id'] = $id;
        $data['name'] = $_POST['name'];
        $data['categoryId'] = $_POST['categoryId'];
        $data['price'] = $_POST['price'];
        $data['description'] = $_POST['description'];

        // echo '</pre>';
        // print_r ($data);
        // echo '</pre>';
        // die();

        $result = $this->productModel->update($data);
        if($result){
            $_SESSION['message'] = "Cập nhật sản phẩm thành công!";
            header("Location: " . DOCUMENT_ROOT . "/admin/products");
        }else {
            if(isset($_SERVER["HTTP_REFERER"])){
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
        }
    }

    function delete($id)
    {
        // var_dump(($id));
        $result = $this->productModel->delete($id);

        if ($result) {
            $_SESSION['message'] = "Xóa sản phẩm thành công!";
            header("Location: " . DOCUMENT_ROOT . "/admin/products");
        } else {
            if (isset($_SERVER["HTTP_REFERER"])) {
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
        }
    }


    

}

?>