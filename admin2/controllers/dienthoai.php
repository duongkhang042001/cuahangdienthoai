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
            case "detail":
                $this->detail();
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
    function to_slug($str)
    {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }
    function store()
    {
        if (isset($_POST['ThemDT'])) {
            $name = $_POST['name'];
            $slug = $this->to_slug($name);
            $price = $_POST['price'];
            $hot = $_POST['hot'];
            $trangthai = $_POST['anhien'];
            $mota = $_POST['mota'];
            $nhasanxuat = $_POST['nhasanxuat'];
            //thuoctinh
            $hedieuhanh = $_POST['hedieuhanh'];
            $manhinh = $_POST['manhinh'];
            $cameratruoc = $_POST['cameratruoc'];
            $camerasau = $_POST['camerasau'];
            $cpu = $_POST['cpu'];
            $ram = $_POST['ram'];
            $bonhotrong = $_POST['bonhotrong'];
            $dungluongpin = $_POST['dungluongpin'];
            $thenho = $_POST['thenho'];
            $thesim = $_POST['thesim'];

            $uploaddir = '../uploads/';
            $namefile = $uploaddir . basename($_FILES['imgfile']['name']);
            if (!move_uploaded_file($_FILES['imgfile']['tmp_name'], $namefile)) echo "Upload failed";
            $iddt = $this->model->store($name, $slug, $price, $hot, $trangthai, $mota, $nhasanxuat, $namefile);
            $tt = $this->model->storethuoctinh($hedieuhanh, $manhinh, $camerasau, $cameratruoc, $cpu, $ram, $bonhotrong, $dungluongpin, $thenho, $thesim, $iddt);
            header("location:" . ADMIN_URL . "/?ctrl=dienthoai");
        }
    }
    function delete()
    {
        if (isset($_GET['iddt']) && $_GET['iddt'] > 0) {
            $iddt = $_GET['iddt'];
            $this->model->delete($iddt);
            $this->model->deletett($iddt);
        }
        header("location:" . ADMIN_URL . "/?ctrl=dienthoai");
    }
    function detail()
    {
        if (isset($_GET['iddt']) && $_GET['iddt'] > 0) {
            $iddt = $_GET['iddt'];
            $listNSX = $this->model->listrecordsNSX();
            $thuoctinh = $this->model->thuoctinhdt($iddt);
            $detail = $this->model->detailrecord($iddt);
            $page_title = "Thông tin chi tiết điện thoại";
            $page_file = "views/dienthoai_detail.php";
            require_once 'layout.php';
        }
    }
    function edit()
    {
        if (isset($_GET['iddt']) && $_GET['iddt'] > 0) {
            $iddt = $_GET['iddt'];
            $listNSX = $this->model->listrecordsNSX();
            $thuoctinh = $this->model->thuoctinhdt($iddt);
            $detail = $this->model->detailrecord($iddt);
            $page_title = "Sửa điện thoại";
            $page_file = "views/dienthoai_edit.php";
            require_once 'layout.php';
        }
    }
    function update()
    {
        if (isset($_POST['SuaDT'])) {
            $name = $_POST['name'];
            $slug = $this->to_slug($name);
            $price = $_POST['price'];
            $hot = $_POST['hot'];
            $trangthai = $_POST['anhien'];
            $mota = $_POST['mota'];
            $nhasanxuat = $_POST['nhasanxuat'];
            $hedieuhanh = $_POST['hedieuhanh'];
            $manhinh = $_POST['manhinh'];
            $cameratruoc = $_POST['cameratruoc'];
            $camerasau = $_POST['camerasau'];
            $cpu = $_POST['cpu'];
            $ram = $_POST['ram'];
            $bonhotrong = $_POST['bonhotrong'];
            $dungluongpin = $_POST['dungluongpin'];
            $thenho = $_POST['thenho'];
            $thesim = $_POST['thesim'];

            if ($_FILES['imgfile']['name'] != "") {
                $uploaddir = '../uploads/';
                $namefile = $uploaddir . basename($_FILES['imgfile']['name']);
                if (!move_uploaded_file($_FILES['imgfile']['tmp_name'], $namefile)) echo "Upload failed";
            } else {
                $namefile = "";
            }
            $iddt = $_POST['iddt'];
            $this->model->update($name, $slug, $price, $hot, $trangthai, $mota, $nhasanxuat, $namefile, $iddt);
            $this->model->updatethuoctinh($hedieuhanh, $manhinh, $camerasau, $cameratruoc, $cpu, $ram, $bonhotrong, $dungluongpin, $thenho, $thesim, $iddt);
            header("location:" . ADMIN_URL . "/?ctrl=dienthoai");
        }
    }
}
