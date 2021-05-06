<?php
require_once "models/model_dienthoai.php"; //nạp model để có các hàm tương tác db
class dienthoai
{
    function __construct()
    {
        $this->model = new model_dienthoai();
        $act = "index"; //chức năng mặc định
        if (isset($_GET["act"]) == true) {
            $act = $_GET["act"];
        } //tiếp nhận chức năng user request
        switch ($act) {
            case "index":
                $this->index();
                break;
            case "addnew":
                $this->addnew();
                break;
            case "store":
                $this->store();
                break;
            case "edit":
                $this->edit();
                break;
            case "update":
                $this->update();
                break;
            case "delete":
                $this->delete();
                break;
        }
    }
    function index()
    {
        $list = $this->model->listrecords();
        $page_title = "Danh sách điện thoại";
        $page_file = "views/dienthoai_index.php";
        require_once 'layout.php';
    }
    function addnew()
    {
        $listNSX = $this->model->listrecordsNSX();
        $page_title = "Thêm điện thoại";
        $page_file = "views/dienthoai_addnew.php";
        require_once 'layout.php';
    }
    function store()
    {
        if (isset($_POST['ThemDT'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $hot = $_POST['hot'];
            $trangthai = $_POST['anhien'];
            $mota = $_POST['mota'];
            $nhasanxuat = $_POST['nhasanxuat'];
            $uploaddir = '../uploads/';
            $namefile = $uploaddir . basename($_FILES['imgfile']['name']);
            echo $namefile;
            if (!move_uploaded_file($_FILES['imgfile']['tmp_name'], $namefile)) echo "Upload failed";
            $this->model->store($name, $price, $hot, $trangthai, $mota, $nhasanxuat, $namefile);
            header("location:" . ADMIN_URL . "/?ctrl=dienthoai");

        }
    }
    function delete(){
        if (isset($_GET['iddt']) && $_GET['iddt'] > 0) {
            $iddt = $_GET['iddt'];
            $this->model->delete($iddt);
        }
        header("location:" . ADMIN_URL . "/?ctrl=dienthoai");
    }
    function edit(){
        if (isset($_GET['iddt']) && $_GET['iddt'] > 0) {
            $iddt = $_GET['iddt'];
            $listNSX = $this->model->listrecordsNSX();
            $detail = $this->model->detailrecord($iddt);
            $page_title = "Sửa điện thoại";
            $page_file = "views/dienthoai_edit.php";
            require_once 'layout.php';
        }
    }
    function update(){
        if (isset($_POST['SuaDT'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $hot = $_POST['hot'];
            $trangthai = $_POST['anhien'];
            $mota = $_POST['mota'];
            $nhasanxuat = $_POST['nhasanxuat'];
            if($_FILES['imgfile']['name'] != ""){
                $uploaddir = '../uploads/';
                $namefile = $uploaddir . basename($_FILES['imgfile']['name']);
                if (!move_uploaded_file($_FILES['imgfile']['tmp_name'], $namefile)) echo "Upload failed";
            } else {
                $namefile = "";
            }
            $iddt = $_POST['iddt'];
            $this->model->update($name, $price, $hot, $trangthai, $mota, $nhasanxuat, $namefile, $iddt);
            header("location:" . ADMIN_URL . "/?ctrl=dienthoai");

        }
    }
}
