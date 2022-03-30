<?php

use App\Core\Controller;

class OrdersController extends Controller{

    private $orderModel;
    private $statusModel;

    function __construct(){

        $this->orderModel = $this->model('OrderModel');

        $this->statusModel = $this->model('StatusModel');
    }

    function Index(){

        $orders = $this->orderModel->all();
        $totals = $this->orderModel->getDetail();

        $data['orders'] = $orders;
        $data['totals'] = [];
        foreach($orders as $key => $order) {
            $data['totals'][$key] = 0;
            foreach($totals as $index => $total) {
                $sum = $data['totals'][$key];
                if($total['id_order'] == $order['id'])
                {
                    $sum = $data['totals'][$key] + $total['amount'] * $total['price_product'];
                    $data['totals'][$key] = $sum;
                }
            }
        }
        // $data['tatals'] = $totals;
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // echo $_SESSION['message'];
        // die(var_dump(PUBLIC_DIR_PRODUCT_IMAGES));
        // unset($_SESSION['message']);
        $this->view('/admin/orders/index', $data);
    }

    function edit($id) {

        $orderDetails = $this->orderModel->getOrderDetails($id);
        $data['orderDetails'] = $orderDetails;
        $status = $this->statusModel->all();
        $data['status'] = $status;
        $totals = $this->orderModel->getDetail($id);
        $data['total'] = 0;
        foreach ($totals as $index => $total) {
            $sum = $data['total']+ $total['amount'] * $total['price_product'];
            $data['total'] = $sum;
        }

        $name = $this->orderModel->getNameById($id);
        $data['userName'] = $name;
        $order = $this->orderModel->getById($id);
        if(!$order){
            header("Location: " . DOCUMENT_ROOT . "/admin/orders");
        }

        $data['order'] = $order;

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // die(var_dump(PUBLIC_DIR_PRODUCT_IMAGES));
        
        $this->view('/admin/orders/edit', $data);
    }

    function update($id){

       if(!isset($_POST)){
           header("Location: " . DOCUMENT_ROOT . "/admin");
       }

        $data = $_POST;

        $data['id'] = $id;
        $data['statusId'] = $_POST['statusId'];
        $data['delivery_date'] = $_POST['delivery_date'];

        // echo $_SESSION['message'];
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // die(var_dump(PUBLIC_DIR_PRODUCT_IMAGES));

        $result = $this->orderModel->update($data);
        if($result){
            $_SESSION['message'] = "Cap nhat don hang thanh cong";
            header("Location: " . DOCUMENT_ROOT . "/admin/orders");
        }else {
            if(isset($_SERVER["HTTP_REFERER"])){
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
        }
    }

    function delete($id)
    {
        // var_dump(($id));
        $result = $this->orderModel->delete($id);

        if ($result) {
            $_SESSION['message'] = "Xoa don hang thanh cong";
            header("Location: " . DOCUMENT_ROOT . "/admin/orders");
        } else {
            if (isset($_SERVER["HTTP_REFERER"])) {
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
        }
    }

    

}
