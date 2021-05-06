<!doctype html>
<html lang="en">

<head>
    <base href="<?=SITE_URL?>/">
    <title><?php if (isset($page_name)) echo $page_name;
            else echo "Trang chủ"; ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="views/asset/images/favicon.png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/asset/css/style.css" id="dynamic_css">
</head>

<body>
    <div class="container-fluid">
        <!-- Start header -->
        <header class="row">
            <div class="container">
                <div class="row">
                    <div class="col-6 col-sm-2 p-2">
                        <img src="views/asset/images/logo.png" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                    </div>
                    <div class="col-2"></div>
                    <div class="col-2"></div>
                    <div class="col-6 col-sm-2 p-2">
                        <div class="row contact">
                            <div class="col-2 d-flex justify-content-center align-items-center contact-logo">
                                <i class="fas fa-paper-plane"></i>
                            </div>
                            <div class="col-10">
                                <span class="contact-label">Email:</span>
                                <span class="contact-des">yourname@gmail.com</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-2 p-2">
                        <div class="row contact">
                            <div class="col-2 d-flex justify-content-center align-items-center contact-logo">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="col-10">
                                <span class="contact-label">Phone:</span>
                                <span class="contact-des">+84-99-09-09-01</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 p-2 w-sm-100 d-flex justify-content-center">
                        <?php
                        if ($_SESSION['sid']) {
                        ?>
                            <!-- Example single danger button -->
                            <div class="btn-group">
                                <button type="button" class="btn bg-navy text-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?= $_SESSION['sUserName'] ?>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Xem thông tin tài khoản</a>
                                    <a class="dropdown-item" href="<?=ROOT_URL?>/doi-mat-khau/">Đổi mật khẩu</a>
                                    <a class="dropdown-item" href="#">Theo dõi đơn hàng</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="?act=user&what=logout">Đăng xuất</a>
                                </div>
                            </div>
                        <?php
                        } else {
                        ?>
                            <a href="<?=ROOT_URL?>/dang-nhap/" class="btn bg-navy text-light">Đăng nhập</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </header>
        <nav class="row bg-navy">
            <div class="container">
                <nav class="row navbar navbar-expand-lg nav_cus px-sm-0">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon d-flex justify-content-center align-items-center"><i class="fad fa-bars cus_logo_reponsive"></i></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link nav-click" href="<?=ROOT_URL?>/site/tech-zone/">Trang chủ <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-click" href="#">Tin tức</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-click" href="<?=ROOT_URL?>/san-pham/">Sản phẩm</a>
                            </li>
                            <li class="nav-item dropdown" id="hover">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Thương hiệu
                                </a>
                                <div class="dropdown-menu bg-navy" id="menu_hover" aria-labelledby="nav">
                                    <?php
                                    foreach ($listNSX as $nsx) {
                                    ?>
                                        <a class="dropdown-item" href="<?=ROOT_URL?>/nsx/<?= $nsx['idNSX'] ?>"><?= $nsx['TenNSX'] ?></a>
                                    <?php } ?>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-click" href="#">Liên hệ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-click" href="#">Tuyển dụng</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-click" href="#">Giới thiệu</a>
                            </li>
                        </ul>
                        <form class="form-inline my-2 my-lg-0 form-search" method="POST" action="?act=search">
                            <input class="form-control mr-sm-2 w-100" name="query" id="search" type="search" placeholder="Tìm kiếm" aria-label="Search">
                            <button type="submit" class="btn-submit" name="timkiem"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                        <div class="cart ml-4">
                            <a href="<?=ROOT_URL?>/gio-hang/">
                                <i class="fas fa-cart-arrow-down text-light" style="font-size: 16pt;"></i><span style="font-size: 10pt;"><?= count($_SESSION['giohang']) ?></span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </nav>
        <!-- End header -->
        <?php if (file_exists($viewFile)) require_once "$viewFile"; ?>
        <!-- Content  -->
        <footer class="row bg-navy mt-5">
            <div class="container">
                <div class="row text-white py-5">
                    <div class="col-3">
                        <img src="views/asset/images/logo.png" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                    </div>
                    <div class="col-3">
                        <ul class="list-group">
                            <li class="">Cras justo odio</li>
                            <li class="">Dapibus ac facilisis in</li>
                            <li class="">Morbi leo risus</li>
                            <li class="">Porta ac consectetur ac</li>
                            <li class="">Vestibulum at eros</li>
                        </ul>
                    </div>
                    <div class="col-3">
                        <ul class="list-group">
                            <li class="">Cras justo odio</li>
                            <li class="">Dapibus ac facilisis in</li>
                            <li class="">Morbi leo risus</li>
                            <li class="">Porta ac consectetur ac</li>
                            <li class="">Vestibulum at eros</li>
                        </ul>
                    </div>
                    <div class="col-3">
                        <ul class="list-group">
                            <li class="">Cras justo odio</li>
                            <li class="">Dapibus ac facilisis in</li>
                            <li class="">Morbi leo risus</li>
                            <li class="">Porta ac consectetur ac</li>
                            <li class="">Vestibulum at eros</li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="views/asset/js/function.js"></script>
</body>

</html>

<script>
    $(document).ready(function() {
        $('#submit').click(function(e) {
            e.preventDefault();
            let form = $('#form').submit();
        });
    });
</script>