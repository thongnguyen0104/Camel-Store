<?php

use App\Core\Controller;

class CategoriesController extends Controller{

    private $productModel;
    private $categoryModel;

    function __construct(){
        $this->productModel = $this->model('ProductModel');

        $this->categoryModel = $this->model('CategoryModel');
    }

    function Index(){

        $categories = $this->categoryModel->all();

        $data['categories'] = $categories;

        $this->view('/admin/categories/index', $data);
    }

    function create(){
 
        $this->view('/admin/categories/create');
    }

    function store(){

       if(!isset($_POST)){
           header("Location: " . DOCUMENT_ROOT . "/admin");
       }
        
        $data = $_POST;

        $data['name'] = $_POST['name'];
        $data['description'] = $_POST['description'];
        $data['image'] = "";

        // handle image
        // $output_dir = PUBLIC_DIR_CATEGORY_IMAGES; //Path for file upload
        // die(var_dump(PUBLIC_DIR_CATEGORY_IMAGES));

        if (isset($_FILES["image"])) {
            if ($_FILES["image"]['name'] != "") {
                $randomNum = time();
                $imageName = str_replace(' ', '-', strtolower($_FILES["image"]['name']));
                $imageExt = substr($imageName, strrpos($imageName, '.'));
                $imageExt = str_replace('.', '', $imageExt);
                $newImageName = $randomNum . '.' . $imageExt;

                move_uploaded_file($_FILES["image"]["tmp_name"], PUBLIC_DIR_CATEGORY_IMAGES . DS . $newImageName);
                $data["image"] = $newImageName;
            }
        }

        $result = $this->categoryModel->store($data);
        if($data){
            $_SESSION['message'] = "Thêm loại sản phẩm thành công";
            header("Location: " . DOCUMENT_ROOT . "/admin/categories");
        }else {
            if(isset($_SERVER["HTTP_REFERER"])){
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
        }
    }

    function edit($id){

        $category = $this->categoryModel->getById($id);
        if(!$category){
            header("Location: " . DOCUMENT_ROOT . "/admin/categories");
        }
        $data['category'] = $category;

        $this->view('/admin/categories/edit', $data);
    }

    function update($id){

       if(!isset($_POST)){
           header("Location: " . DOCUMENT_ROOT . "/admin");
       }

        $data = $_POST;
        
        $data['id'] = $id;
        $data['name'] = $_POST['name'];
        $data['description'] = $_POST['description'];

        $category = $this->categoryModel->getById($id);

        if (isset($_FILES["image"])) {
            if ($_FILES["image"]['name'] != "") {
                $randomNum = time();
                $imageName = str_replace(' ', '-', strtolower($_FILES["image"]['name']));
                $imageExt = substr($imageName, strrpos($imageName, '.'));
                $imageExt = str_replace('.', '', $imageExt);
                $newImageName = $randomNum . '.' . $imageExt;

                move_uploaded_file($_FILES["image"]["tmp_name"], PUBLIC_DIR_CATEGORY_IMAGES . DS . $newImageName);
                $data["image"] = $newImageName;
                unlink(PUBLIC_DIR_CATEGORY_IMAGES . DS . $category['image']);
            } else {
                $data['image'] = $category['image'];
            }
        }

        // $data = $category;
        // echo '</pre>';
        // print_r($data);
        // echo '</pre>';
        // die(var_dump(PUBLIC_DIR_CATEGORY_IMAGES));

        $result = $this->categoryModel->update($data);
        if($result){
            $_SESSION['message'] = "Cập nhật loại sản phẩm thành công!";
            header("Location: " . DOCUMENT_ROOT . "/admin/categories");
        }else {
            if(isset($_SERVER["HTTP_REFERER"])){
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
        }
    }

    function delete($id)
    {
        // var_dump(($id));
        $result = $this->categoryModel->delete($id);

        if ($result) {
            $_SESSION['message'] = "Xóa loại sản phẩm thành công!";
            header("Location: " . DOCUMENT_ROOT . "/admin/categories");
        } else {
            if (isset($_SERVER["HTTP_REFERER"])) {
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
        }
    }

    

}
