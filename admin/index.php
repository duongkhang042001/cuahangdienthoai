<?php

session_start();
ob_start();
// if (isset($_SESSION['admin']) && $_SESSION['admin'] == 'admin') {
    require_once("../system/config.php");
    define("ARR_CONTROLLER", ["home", "nhasanxuat", "dienthoai", "binhluan", "users", "donhang"]);
    $ctrl = 'home';
    if (isset($_GET['ctrl']) == true) $ctrl = $_GET['ctrl'];
    if (in_array($ctrl, ARR_CONTROLLER) == false) die("Không tồn tại địa chỉ");
    $pathFile = "controllers/$ctrl.php";
    if (file_exists($pathFile) == true) {
        require_once $pathFile;
        $controller = new $ctrl;
    } else echo "Controller $ctrl không tồn tại";
// } else {
//     header("location: ./nguoidung_login.php");
// }
