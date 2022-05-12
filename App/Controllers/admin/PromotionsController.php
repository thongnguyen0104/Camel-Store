<?php

use App\Core\Controller;

class PromotionsController extends Controller{

    private $promotionModel;

    function __construct(){
        $this->promotionModel = $this->model('PromotionModel');
    }

    function Index(){

        $promotions = $this->promotionModel->all();

        $data['promotions'] = $promotions;

        $this->view('/admin/promotions/index', $data);
    }

    function create(){
 
        $this->view('/admin/promotions/create');
    }

    function store(){

       if(!isset($_POST)){
           header("Location: " . DOCUMENT_ROOT . "/admin");
       }
        
        // $data = $_POST;

        $data['name'] = $_POST['name'];
        $data['percent'] = $_POST['percent'];

        // $data['start_date'] = $_POST['start_date'];
        // $data['end_date'] = $_POST['end_date'];

        $data['start_date'] = $_POST['start_date'] . " " . $_POST['start_time'] . ":00";
        $data['end_date'] = $_POST['end_date'] . " " . $_POST['end_time'] . ":59";
        
        // $data['date_time'] = date('Y-m-d H:i:s');
        // echo '</pre>';
        // print_r($data);
        // echo '</pre>';

        $result = $this->promotionModel->store($data);

        if($result){
            $_SESSION['message'] = "Thêm khuyến mãi thành công";
            header("Location: " . DOCUMENT_ROOT . "/admin/promotions");
        }else {
            if(isset($_SERVER["HTTP_REFERER"])){
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
        }
    }

    function edit($id){

        $promotions = $this->promotionModel->getById($id);
        if(!$promotions){
            header("Location: " . DOCUMENT_ROOT . "/admin/promotions");
        }
        $data['promotions'] = $promotions;

        $this->view('/admin/promotions/edit', $data);
    }

    function update($id){

       if(!isset($_POST)){
           header("Location: " . DOCUMENT_ROOT . "/admin");
       }

        // $data = $_POST;
        $data['id'] = $id;
        $data['name'] = $_POST['name'];
        $data['percent'] = $_POST['percent'];
        // $data['end_date'] = $_POST['end_date'];
        // $data['start_time'] = $_POST['start_time'];
        // $data['end_time'] = $_POST['end_time'];

        $promotions = $this->promotionModel->getById($id);

        $start_date = substr($promotions['start_date'], -19, 10);
        $end_date = substr($promotions['end_date'], -19, 10);
        $start_time = substr($promotions['start_date'], -8, 5);
        $end_time = substr($promotions['end_date'], -8, 5);

        if ($_POST['start_date'] != "") {
            $data['start_date'] = $_POST['start_date'];
        } else {
            $data['start_date'] = $start_date;
        }

        if ($_POST['end_date'] != "") {
            $data['end_date'] = $_POST['end_date'];
        } else {
            $data['end_date'] = $end_date;
        }

        if ($_POST['start_time'] != "") {
            $data['start_time'] = $_POST['start_time'];
        } else {
            $data['start_time'] = $start_time;
        }

        if ($_POST['end_time'] != "") {
            $data['end_time'] = $_POST['end_time'];
        } else {
            $data['end_time'] = $end_time;
        }

        $data['start_date'] = $data['start_date'] . " " . $data['start_time'] . ":00";
        $data['end_date'] = $data['end_date'] . " " . $data['end_time'] . ":59";

        // echo '</pre>';
        // print_r($data);
        // echo '</pre>';

        $result = $this->promotionModel->update($data);

        if($result){
            $_SESSION['message'] = "Cập nhật khuyến mãi thành công!";
            header("Location: " . DOCUMENT_ROOT . "/admin/promotions");
        }else {
            if(isset($_SERVER["HTTP_REFERER"])){
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
        }
    }

    // function delete($id)
    // {
    //     // var_dump(($id));
    //     $result = $this->promotionModel->delete($id);

    //     if ($result) {
    //         $_SESSION['message'] = "Xóa loại sản phẩm thành công!";
    //         header("Location: " . DOCUMENT_ROOT . "/admin/promotions");
    //     } else {
    //         if (isset($_SERVER["HTTP_REFERER"])) {
    //             header("Location: " . $_SERVER["HTTP_REFERER"]);
    //         }
    //     }
    // }

    

}
