<?php
require_once "models/model_nhasanxuat.php"; //nạp model để có các hàm tương tác db
class nhasanxuat
{
    function __construct()
    {
        $this->model = new model_nhasanxuat();
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
        //$this->$act;
    }

    function index()
    {
        $list = $this->model->listrecords();
        $page_title = "Danh sách nhà sản xuất";
        $page_file = "views/nhasanxuat_index.php";
        require_once 'layout.php';
    }

    function addnew()
    {
        $list = $this->model->listrecords();
        $page_title = "Thêm nhà sản xuất";
        $page_file = "views/nhasanxuat_addnew.php";
        require_once 'layout.php';
    }

    function store()
    {
        if (isset($_POST['ThemNSX'])) {
            $tenNSX = strip_tags(trim($_POST['nameNSX']));
            if (is_numeric($_POST['ThuTu'])) {
                $ThuTu = strip_tags(trim($_POST['ThuTu']));
            } else {
                $ThuTu = 0;
            }
            if (is_numeric($_POST['AnHien'])) {
                $AnHien = strip_tags(trim($_POST['AnHien']));
            } else {
                $AnHien = 0;
            }
            $this->model->store($tenNSX, $ThuTu, $AnHien);
            header("location:" . ADMIN_URL . "/?ctrl=nhasanxuat");
        }
    }

    function edit()
    {
        if (isset($_GET['idnsx']) && $_GET['idnsx'] > 0) {
            $idnsx = $_GET['idnsx'];
            $detail = $this->model->detailrecord($idnsx);
            $page_title = "Chỉnh sửa nhà sản xuất";
            $page_file = "views/nhasanxuat_edit.php";
            require_once 'layout.php';
        }
    }

    function update()
    {
        if (isset($_POST['updateNSX'])) {
            $tenNSX = strip_tags(trim($_POST['nameNSX']));
            if (is_numeric($_POST['ThuTu'])) {
                $ThuTu = strip_tags(trim($_POST['ThuTu']));
            } else {
                $ThuTu = 0;
            }
            if (is_numeric($_POST['AnHien'])) {
                $AnHien = strip_tags(trim($_POST['AnHien']));
            } else {
                $AnHien = 0;
            }
            $idnsx = $_POST['idnsx'];
            $this->model->update($tenNSX, $ThuTu, $AnHien, $idnsx);
            header("location:" . ADMIN_URL . "/?ctrl=nhasanxuat");
        }
    }

    function delete()
    {
        if (isset($_GET['idnsx']) && $_GET['idnsx'] > 0) {
            $idnsx = $_GET['idnsx'];
            $this->model->delete($idnsx);
        }
        header("location:" . ADMIN_URL . "/?ctrl=nhasanxuat");
    }
}