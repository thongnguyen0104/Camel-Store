<?php

use App\Core\Controller;

class UsersController extends Controller{

    private $userModel;

    function __construct(){
        $this->userModel = $this->model('UserModel');
    }

    function Index(){

        $users = $this->userModel->all();

        $data['users'] = $users;

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        
        $this->view('/admin/users/index', $data);
    }

    function create(){

        $categories = $this->categoryModel->all();

        $data['categories'] = $categories;
 
        $this->view('/admin/products/create', $data);
    }

    function edit($id){

        $user = $this->userModel->getById($id);
        if(!$user){
            header("Location: " . DOCUMENT_ROOT . "/admin/users");
        }

        $data['user'] = $user;

        // echo '<pre>';
        // echo $id;
        // print_r($data);
        // echo '</pre>';
        $this->view('/admin/users/edit', $data);
    }

    function update($id){

       if(!isset($_POST)){
           header("Location: " . DOCUMENT_ROOT . "/admin");
       }

        $data = $_POST;
        
        $data['id'] = $id;
        $data['name'] = $_POST['name'];
        $data['categoryId'] = $_POST['categoryId'];
        $data['price'] = $_POST['price'];
        $data['description'] = $_POST['description'];

        $result = $this->productModel->update($data);
        if($result){
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
        $result = $this->userModel->delete($id);

        if ($result) {
            $_SESSION['message'] = "Xoa người dung thanh cong";
            header("Location: " . DOCUMENT_ROOT . "/admin/users");
        } else {
            if (isset($_SERVER["HTTP_REFERER"])) {
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
        }
    }

    

}
