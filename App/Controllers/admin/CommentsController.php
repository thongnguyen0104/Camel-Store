<?php

use App\Core\Controller;

class CommentsController extends Controller{

    private $commentModel;

    function __construct(){
        $this->commentModel = $this->model('CommentModel');
    }

    function Index(){

        $comments = $this->commentModel->all();

        $data['comments'] = $comments;

        // echo '</pre>';
        // print_r ($data['comments']);
        // echo '</pre>';

        $this->view('/admin/comments/index', $data);
    }

    function delete($id)
    {
        var_dump(($id));
        $result = $this->commentModel->delete($id);

        if ($result) {
            $_SESSION['message'] = "Xóa loại bình luận thành công!";
            header("Location: " . DOCUMENT_ROOT . "/admin/comments");
        } else {
            if (isset($_SERVER["HTTP_REFERER"])) {
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
        }
    }

}
