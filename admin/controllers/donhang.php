<?php
require_once "models/model_donhang.php"; //nạp model để có các hàm tương tác db
class donhang
{
    function __construct()
    {
        $this->model = new model_donhang();
        $act = "index"; //chức năng mặc định
        if (isset($_GET["act"]) == true) {
            $act = $_GET["act"];
        } //tiếp nhận chức năng user request
        switch ($act) {
            case "index":
                $this->index();
                break;
            case "viewdonhang":
                $this->viewdonhang();
                break;
            case "hoanthanh":
                $this->hoanthanh();
                break;
            case "delete":
                $this->delete();
                break;
        }
    }
    function index()
    {
        $list = $this->model->listrecords();
        $page_title = "Danh sách đơn hàng";
        $page_file = "views/donhang_index.php";
        require_once 'layout.php';
    }
    function viewdonhang()
    {
        if (isset($_GET['iddh'])) {
            $iddh = $_GET['iddh'];
            $detail = $this->model->detail($iddh);
            $detailDH = $this->model->detailDH($iddh);
            $page_title = "Chi tiết đơn hàng";
            $page_file = "views/donhang_view.php";
            require_once 'layout.php';
        }
    }
    function hoanthanh()
    {
        if (isset($_POST['hoanthanh'])) {
            $id = $_GET['id'];
            $trangthai = $_POST['trangthai'];
            $capnhat = $this->model->hoanthanh($trangthai, $id);
            header('location: ?ctrl=donhang&act=index');
        }
    }
    function delete()
    {
        if (isset($_GET['iddh'])) {
            $id = $_GET['iddh'];
            $capnhat = $this->model->delete($id);
            header('location: ?ctrl=donhang&act=index');
        }
    }
}
