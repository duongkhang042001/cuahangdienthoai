<?php
class home{
    function __construct()
    {
        $act = "index";//chức năng mặc định
        if(isset($_GET["act"])==true) $act=$_GET["act"];
        $this->$act();
    }
    function index()
    {
        $page_title = "Trang chủ";
        $page_file = "views/home.php";
        require_once 'layout.php';
    }
}
