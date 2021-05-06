<?php
require_once "models/model_home.php"; //nạp model để có các hàm tương tác db
class home
{
    function __construct()
    {
        $this->model = new model_home();
        $act = "home"; //chức năng mặc định
        if (isset($_GET["act"]) == true) $act = $_GET["act"]; //chức năng user request
        switch ($act) {
            case "home":
                $this->home();
                break;
            case "product":
                $this->product();
                break;
            case "detail":
                $this->detail();
                break;
            case "cat":
                $this->cat();
                break;
            case "comment":
                $this->comment();
                break;
            case "cartview":
                $this->cartview();
                break;
            case "cart":
                $this->cart();
                break;
            case "luudonhang":
                $this->luudonhang();
                break;
            case "thanhtoan":
                $this->thanhtoan();
                break;
            case "camon":
                $this->camon();
                break;
            case "user":
                $this->user();
                break;
            case "search":
                $this->search();
                break;
        }
        //$this->$act;
    }
    function search()
    {
        if (isset($_POST['timkiem'])) {
            $query = $_POST['query'];
            $list = $this->model->search($query);
            // var_dump($list);
            if (sizeof($list) == 0) {
                $err = '<p class="py-4">Không tìm thấy sản phẩm liên quan.</p>';
            }
        }
        $listNSX = $this->model->dsNSX();
        $page_name = "Tìm kiếm sản phẩm";
        $viewFile = "views/search.php";
        require_once "layout.php";
    }
    function home()
    {
        $productNew = $this->model->sanphamMoi(4);
        $productView = $this->model->sanphamXemNhieu(4);
        $listNSX = $this->model->dsNSX();
        $page_name = "Trang chủ";
        $viewFile = "views/home.php";
        require_once "layout.php";
    }
    function product()
    {
        $product = $this->model->dsSanPham();
        $listNSX = $this->model->dsNSX();
        $page_name = "Danh sách sản phẩm";
        $viewFile = "views/product.php";
        require_once "layout.php";
    }
    function detail()
    {
        $listNSX = $this->model->dsNSX();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $detail = $this->model->detailSP($id);
            $comments = $this->model->getComments($id);
            $thuoctinh = $this->model->thuoctinhdt($id);
            $SoLanXem = $detail['SoLanXem'] + 1;
            $this->model->updateView($id, $SoLanXem);
            $page_name = "Chi tiết sản phẩm";
            $viewFile = "views/detail.php";
            require_once "layout.php";
        }
    }
    function cat()
    {
        if (isset($_GET['idcat'])) {
            $idcat = $_GET['idcat'];
            $list = $this->model->sanphamTheoLoai($idcat);
            if (sizeof($list) == 0) {
                $err = '<p class="py-4">Không có sản phẩm nào thuộc nhà sản suất này.</p>';
            }
            $listNSX = $this->model->dsNSX();
            $page_name = "Sản phẩm theo loại: " . $this->model->getNameNhaSanXuat($idcat);
            $viewFile = "views/cat.php";
            require_once "layout.php";
        }
    }
    function comment()
    {
        if (isset($_POST['cmt'])) {
            $name = $_POST['Name'];
            $comment = $_POST['Comment'];
            $id = $_GET['iddt'];
            $mydate = getdate(date("U"));
            $date = "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
            $this->model->addComment($name, $comment, $id, $date);
            header("location: ?act=detail&id=" . $id);
        }
    }
    function cartview()
    {
        $listNSX = $this->model->dsNSX();
        $page_name = "Giỏ hàng";

        // $_SESSION['giohang'] = [
        //     1 => ['TenDT' => 'OPPO A93', 'Amount' => 3, 'Gia' => 7300000, "img" => 'https://salt.tikicdn.com/cache/200x200/ts/product/0e/03/6e/1e82e11419bd4aae424b10a5457eb932.jpeg'],
        //     2 => ['TenDT' => 'Vsmart Aris', 'Amount' => 4, 'Gia' => 6300000, "img" => 'https://salt.tikicdn.com/cache/200x200/ts/product/0e/03/6e/1e82e11419bd4aae424b10a5457eb932.jpeg'],
        //     3 => ['TenDT' => 'Realme 7 Pro', 'Amount' => 5, 'Gia' => 8300000, "img" => 'https://salt.tikicdn.com/cache/200x200/ts/product/0e/03/6e/1e82e11419bd4aae424b10a5457eb932.jpeg']
        // ];
        $viewFile = "views/cartview.php";
        require_once "layout.php";
    }
    function cart()
    {
        $listNSX = $this->model->dsNSX();
        $page_name = "Giỏ hàng";

        //Tiếp nhậtn biến id (mã sản phẩm) và what (để biết thêm/xóa sp)
        $id = $_GET['id'];
        settype($id, "int");
        $what = "add";
        if (isset($_GET['what'])) $what = $_GET['what'];
        if ($what == "add") {
            if (isset($_SESSION['giohang']) == false) $_SESSION['giohang'] = []; //tạo mảng rổng nếu chưa có
            $spFromDB = $this->model->detailSP($id);  //if ($spFromDB==null) ...
            $spInCart = $_SESSION['giohang'][$id]; //['TenDT'=>'A','Amount'=>2]
            if ($spInCart != null) $soluong = $spInCart['Amount'] + 1;
            else $soluong = 1;
            if ($soluong > $spFromDB['SoLuongTonKho']) {
                $soluong =  $spFromDB['SoLuongTonKho'];
            }
            $_SESSION['giohang'][$id] = [
                'TenDT' => $spFromDB['TenDT'],
                'Gia' => $spFromDB['Gia'],
                'Amount' => $soluong,
                'img' => $spFromDB['urlHinh']
            ];
            // echo "<pre>";
            // print_r($_SESSION['giohang']);
            // exit();
        } //if what=="add"
        if ($what == "remove") {
            if (count($_SESSION['giohang']) == 1) {
                unset($_SESSION['giohang']);
            }

            unset($_SESSION['giohang'][$id]);
            // echo "<pre>";
            // print_r($_SESSION['giohang']);
        } //$what=="remove"
        if ($what == "removeone") {
            if (isset($_SESSION['giohang']) == false) $_SESSION['giohang'] = []; //tạo mảng rổng nếu chưa có
            $spFromDB = $this->model->detailSP($id);  //if ($spFromDB==null) ...
            $spInCart = $_SESSION['giohang'][$id]; //['TenDT'=>'A','Amount'=>2]
            if ($spInCart != null) $soluong = $spInCart['Amount'] - 1;
            else $soluong = 1;
            if ($soluong == 0) {
                if (count($_SESSION['giohang']) == 1) {
                    unset($_SESSION['giohang']);
                }
                unset($_SESSION['giohang'][$id]);
            } else {
                $_SESSION['giohang'][$id] = [
                    'TenDT' => $spFromDB['TenDT'],
                    'Gia' => $spFromDB['Gia'],
                    'Amount' => $soluong,
                    'img' => $spFromDB['urlHinh']

                ];
            }
        }
        if ($what == "removeall") {
            unset($_SESSION['giohang']);
            // echo "<pre>";
            // print_r($_SESSION['giohang']);
        } //$what=="remove"    
        header("location:" . SITE_URL . "/?act=cartview");
    } //function cart
    function thanhtoan()
    {
        $page_name = "Thanh toán";
        $listNSX = $this->model->dsNSX();

        $viewFile = "views/thanhtoan.php";
        require_once "layout.php";
    }
    function camon()
    {
        $page_name = "Cảm ơn";
        $listNSX = $this->model->dsNSX();

        $viewFile = "views/camon.php";
        require_once "layout.php";
    }
    function luudonhang()
    {
        $page_name = "Lưu đơn hàng";
        $hoten = trim(strip_tags($_POST['HoTen']));
        $email = trim(strip_tags($_POST['email']));
        $dienthoai = trim(strip_tags($_POST['DienThoai']));
        $diachi = trim(strip_tags($_POST['diachigiaohang']));
        $ghichu = trim(strip_tags($_POST['ghichu']));
        $thanhtoan = trim(strip_tags($_POST['phuongthuctt']));
        $giaohang = trim(strip_tags($_POST['phuongthucgh']));
        if (isset($_SESSION['idDH'])) $idDH = $_SESSION['idDH'];
        else $idDH = "-1";
        $idDH = $this->model->luudonhangnhe($idDH, $hoten, $email, $dienthoai, $diachi, $ghichu, $thanhtoan, $giaohang);
        if ($idDH) {
            $_SESSION['idDH'] = $idDH;
            $giohang = $_SESSION['giohang'];
            $this->model->luugiohangnhe($idDH, $giohang);
            header("location:" . SITE_URL . "/?act=camon");
            unset($_SESSION['idDH']);
        } //if ($idDH)
        unset($_SESSION['giohang']);
    }
    function user()
    {
        $page_name = "User";
        $listNSX = $this->model->dsNSX();
        if (isset($_GET['what'])) {
            $what = $_GET['what'];
            $what;
            if ($what == 'login') {
                if (isset($_POST['login'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $kq  = $this->model->checkuser($username, $password);
                    if (is_array($kq)) {
                        if ($kq['KichHoat'] == 0) {
                            $err = '<div class="alert alert-primary" role="alert">
                        Tài khoản chưa được mời bạn kiểm tra mail đăng ký để kích hoạt tài khoản./
                      </div>';
                            $viewFile = "views/checkotp.php";
                            require_once "layout.php";
                        } else {
                            if ($kq['VaiTro'] == 0) {
                                $_SESSION['sid'] = $kq['idUser'];
                                $_SESSION['sUserName'] = $kq['UserName'];
                                $_SESSION['sHoTen'] = $kq['HoTen'];
                                $_SESSION['surlHinh'] = $kq['urlHinh'];
                                header('location: ?act=home');
                            } else {
                                $err = '<div class="alert alert-danger" role="alert">
                                Sai mật khẩu hoặc tài khoản.
                            </div>';
                                $viewFile = "views/login.php";
                                require_once "layout.php";
                            }
                        }
                    } else {
                        $err = '<div class="alert alert-danger" role="alert">
                                Sai mật khẩu hoặc tài khoản.
                            </div>';
                    }
                }
                $viewFile = "views/login.php";
                require_once "layout.php";
            }
            if ($what == 'logout') {
                unset($_SESSION['sid']);
                unset($_SESSION['sUserName']);
                unset($_SESSION['sHoTen']);
                unset($_SESSION['surlHinh']);
                header('location: ?act=home');
            }
            if ($what == "changepass") {
                if (isset($_POST['changePass'])) {
                    $pass = $_POST['password'];
                    $pass1 = $_POST['passwordNew1'];
                    $pass2 = $_POST['passwordNew2'];
                    $checkpass = $this->model->checkpass($_SESSION['sid']);
                    if ($pass1 != $pass2 || $checkpass['Password'] == $pass1) {
                        $err = '<div class="alert alert-danger" role="alert">
                        Mật khẩu xác nhận không đúng./
                      </div>';
                    } else {
                        $change = $this->model->changePass($pass1, $_SESSION['sid']);
                        if ($change) {
                            unset($_SESSION['sid']);
                            unset($_SESSION['sUserName']);
                            unset($_SESSION['sHoTen']);
                            unset($_SESSION['surlHinh']);
                            $err = '<div class="alert alert-primary" role="alert">
                        Thay đổi mật khẩu thành công. Mời bạn đăng nhập lại./
                      </div>';
                            $viewFile = "views/login.php";
                            require_once "layout.php";
                        }
                    }
                }
                $viewFile = "views/changepass.php";
                require_once "layout.php";
            }
            if ($what == 'register') {
                if (isset($_POST['register'])) {
                    $username = $_POST['username'];
                    $HoTen = $_POST['HoTen'];
                    $email1 = $_POST['email'];
                    $pass = $_POST['passwordNew'];
                    $check = 0;
                    $otp = rand(100000, 999999);
                    $checkusernamemail = $this->model->checkusernamemail($username, $email1);
                    if ($checkusernamemail['UserName'] == $username) {
                        $err_user = 'Tài khoản đã tồn tại!!';
                        $check = 1;
                    }
                    if ($checkusernamemail['Email'] == $email1) {
                        $err_email = 'Email đã tồn tại!!';
                        $check = 1;
                    }
                    if ($check ==  0) {
                        $register = $this->model->register($username, $HoTen, $email1, $pass, $otp);
                        if ($register) {
                            require "PHPMailer-master/src/PHPMailer.php";  //nhúng thư viện vào để dùng, sửa lại đường dẫn cho đúng nếu bạn lưu vào chỗ khác
                            require "PHPMailer-master/src/SMTP.php"; //nhúng thư viện vào để dùng
                            require 'PHPMailer-master/src/Exception.php'; //nhúng thư viện vào để dùng
                            $mail = new PHPMailer\PHPMailer\PHPMailer(true);  //true: enables exceptions
                            try {
                                $mail->SMTPDebug = 0;  // 0,1,2: chế độ debug. khi mọi cấu hình đều tớt thì chỉnh lại 0 nhé
                                $mail->isSMTP();
                                $mail->CharSet  = "utf-8";
                                $mail->Host = 'smtp.gmail.com';  //SMTP servers
                                $mail->SMTPAuth = true; // Enable authentication
                                $nguoigui = 'duongkhang0401@gmail.com';
                                $matkhau = 'chochochocho';
                                $tennguoigui = 'Cửa hàng điện thoại TechZone';
                                $mail->Username = $nguoigui; // SMTP username
                                $mail->Password = $matkhau;   // SMTP password
                                $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
                                $mail->Port = 465;  // port to connect to                
                                $mail->setFrom($nguoigui, $tennguoigui);
                                $to = $email1;
                                $to_name = $HoTen;

                                $mail->addAddress($to, $to_name); //mail và tên người nhận  
                                $mail->isHTML(true);  // Set email format to HTML
                                $mail->Subject = 'Cửa hàng điện thoại';
                                $noidungthu = "Mã OTP: " . $otp;
                                $mail->Body = $noidungthu;
                                $mail->smtpConnect(array(
                                    "ssl" => array(
                                        "verify_peer" => false,
                                        "verify_peer_name" => false,
                                        "allow_self_signed" => true
                                    )
                                ));
                                $mail->send();
                                // echo 'Đã gửi mail xong';
                            } catch (Exception $e) {
                                // echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
                            }
                        }
                        header('location: ?act=user&what=checkotp');
                    }
                }
                $viewFile = "views/register.php";
                require_once "layout.php";
            }
            if ($what == 'checkotp') {
                if (isset($_POST['checkotp'])) {
                    $Otp = $_POST['otp'];
                    $check = $this->model->checkotp($Otp);
                    if (is_array($check)) {
                        $id = $check['idUser'];
                        $active = $this->model->active($id);
                        if ($active) {
                            $err = '<div class="alert alert-primary" role="alert">
                        Kích hoạt tài khoản thành công. Mời bạn đăng nhập lại./
                      </div>';
                            $viewFile = "views/login.php";
                            require_once "layout.php";
                        }
                    } else {
                        $err = '<div class="alert alert-primary" role="alert">
                        Sai mã kích hoạt./
                      </div>';
                    }
                }
                $viewFile = "views/checkotp.php";
                require_once "layout.php";
            }
            if ($what == 'resetpass') {
                if (isset($_POST['resetpass'])) {
                    $mail1 = $_POST['email'];
                    $pass = rand(222222, 999999);
                    $resetpass = $this->model->resetpass($mail1, $pass);
                    $getPass = $this->model->getpass($mail1);
                    if (is_array($getPass)) {
                        require "PHPMailer-master/src/PHPMailer.php";  //nhúng thư viện vào để dùng, sửa lại đường dẫn cho đúng nếu bạn lưu vào chỗ khác
                        require "PHPMailer-master/src/SMTP.php"; //nhúng thư viện vào để dùng
                        require 'PHPMailer-master/src/Exception.php'; //nhúng thư viện vào để dùng
                        $mail = new PHPMailer\PHPMailer\PHPMailer(true);  //true: enables exceptions
                        try {
                            $mail->SMTPDebug = 0;  // 0,1,2: chế độ debug. khi mọi cấu hình đều tớt thì chỉnh lại 0 nhé
                            $mail->isSMTP();
                            $mail->CharSet  = "utf-8";
                            $mail->Host = 'smtp.gmail.com';  //SMTP servers
                            $mail->SMTPAuth = true; // Enable authentication
                            $nguoigui = 'duongkhang0401@gmail.com';
                            $matkhau = 'chochochocho';
                            $tennguoigui = 'Cửa hàng điện thoại TechZone';
                            $mail->Username = $nguoigui; // SMTP username
                            $mail->Password = $matkhau;   // SMTP password
                            $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
                            $mail->Port = 465;  // port to connect to                
                            $mail->setFrom($nguoigui, $tennguoigui);
                            $to = $mail1;
                            $to_name = $HoTen;

                            $mail->addAddress($to, $to_name); //mail và tên người nhận  
                            $mail->isHTML(true);  // Set email format to HTML
                            $mail->Subject = 'Cửa hàng điện thoại';
                            $noidungthu = "Mật khẩu mới: " . $getPass['Password'];
                            $mail->Body = $noidungthu;
                            $mail->smtpConnect(array(
                                "ssl" => array(
                                    "verify_peer" => false,
                                    "verify_peer_name" => false,
                                    "allow_self_signed" => true
                                )
                            ));
                            $mail->send();
                            // echo 'Đã gửi mail xong';
                        } catch (Exception $e) {
                            // echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
                        }
                        $err = '<div class="alert alert-primary" role="alert">
                        Mật khẩu mới đã được gửi đến email của bạn, mời bạn đăng nhập lại./
                      </div>';
                        $viewFile = "views/login.php";
                        require_once "layout.php";
                    } else {
                        $err = '<div class="alert alert-primary" role="alert">
                        Email hiện tại chưa đăng ký tài khoản, mời bạn tạo tài khoản để sử dụng dịch vụ./
                      </div>';
                        $viewFile = "views/register.php";
                        require_once "layout.php";
                    }
                }
                $viewFile = "views/resetpass.php";
                require_once "layout.php";
            }
        }
    }
} //class home