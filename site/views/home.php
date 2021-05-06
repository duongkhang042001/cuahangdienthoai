<div class="row mt-3">
    <div class="container p-0">
        <div class="row">
            <div class="col-12 col-sm-9">
                <div id="carouselId" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselId" data-slide-to="1"></li>
                        <li data-target="#carouselId" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img src="views/asset/images/banner/5.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img src="views/asset/images/banner/6.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img src="views/asset/images/banner/6.png" alt="Second slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col col-sm-3">
                <div class="list-group h-100 d-flex flex-column justify-content-between ">
                    <a href="#" class="shadow rounded overflow-hidden h-25"><img class="h-100 w-100" src="views/asset/images/banner/5.jpg" alt=""></a>
                    <a href="#" class="shadow rounded overflow-hidden h-25 "><img class="h-100 w-100" src="views/asset/images/banner/5.jpg" alt=""></a>
                    <a href="#" class="shadow rounded overflow-hidden h-25"><img class="h-100 w-100" src="views/asset/images/banner/5.jpg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="container p-0">
        <h3 class="title"><span class="title-navy">Tin tức</span> mới nhất</h3>
        <div class="row mt-4">
            <div class="col-lg-4 p-0">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item border-b-0">
                        <a href="" class="title-news">Cras justo odioDapibus ac facilisis in aquaffina renne</a>
                        <div class="comment">
                            <i class="fa fa-calendar"></i> 2020-11-30 &nbsp;|&nbsp; <i class="fa fa-comments"></i> 3 bình luận
                        </div>
                        <span class="blockquote-footer">by Khang Duong</span>
                    </li>
                    <li class="list-group-item border-b-0">
                        <a href="" class="title-news">Cras justo odioDapibus ac facilisis in aquaffina renne</a>
                        <div class="comment">
                            <i class="fa fa-calendar"></i> 2020-11-30 &nbsp;|&nbsp; <i class="fa fa-comments"></i> 3 bình luận
                        </div>
                        <span class="blockquote-footer">by Khang Duong</span>
                    </li>
                    <li class="list-group-item border-b-0">
                        <a href="" class="title-news">Cras justo odioDapibus ac facilisis in aquaffina renne</a>
                        <div class="comment">
                            <i class="fa fa-calendar"></i> 2020-11-30 &nbsp;|&nbsp; <i class="fa fa-comments"></i> 3 bình luận
                        </div>
                        <span class="blockquote-footer">by Khang Duong</span>
                    </li>
                    <li class="list-group-item border-b-0">
                        <a href="" class="title-news">Cras justo odioDapibus ac facilisis in aquaffina renne</a>
                        <div class="comment">
                            <i class="fa fa-calendar"></i> 2020-11-30 &nbsp;|&nbsp; <i class="fa fa-comments"></i> 3 bình luận
                        </div>
                        <span class="blockquote-footer">by Khang Duong</span>
                    </li>


                </ul>
            </div>
            <div class="col-lg-8">
                <section class='tabs-content'>
                    <article id='tabs-1'>
                        <img class="img-fluid rounded mb-2" src='views/asset/images/banner/1.jpg'>
                        <a href="" class="title-news">
                            <h4>Cras justo odioDapibus ac facilisis in aquaffina renne</h4>
                        </a>

                        <p class="comment">
                            <i class="fa fa-user"></i> Khang Dương &nbsp;|&nbsp; <i class="fa fa-calendar"></i>
                            2020-11-30 &nbsp;|&nbsp; <i class="fa fa-comments"></i> 3 bình luận
                        </p>

                        <p>Trung tâm Triển lãm Novaland tọa lại tại 179 Hai Bà Trưng, P.6, Q3 (góc giao với
                            đường Điện Biên Phủ). Đây là điểm tiếp khách lớn nhất của Novaland với nhiều hạng
                            mục tiện ích mới lạ và đột phá.

                            Tiên...</p>
                        <div class="main-button">
                            <button class="btn text-white py-2 px-4 bg-navy">Đọc tiếp</button>
                        </div>
                    </article>
                </section>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="container p-0">
        <h3 class="title"><span class="title-navy">Sản phẩm</span> mới nhất</h3>
        <div class="card-columns">
            <?php
            foreach ($productNew as $product) {
            ?>
                <div class="card mt-4 rounded shadow-sm card-product position-relative">
                    <img class="card-img-top" src="<?= $product['urlHinh'] ?>" alt="Card image cap">
                    <?php if ($product['Hot'] == 1) { ?>
                        <div class="hot position-absolute font-italic">Sản phẩm hot</div>
                    <?php } ?>
                    <div class="card-body">
                        <a href="?act=detail&id=<?= $product['idDT'] ?>">
                            <h5 class="card-title"><?= $product['TenDT'] ?>
                                <?php if ($product['Hot'] == 1) { ?>
                                    <span class="badge badge-danger"> New</span>
                                <?php } ?>
                            </h5>
                        </a>
                        <div class="row">
                            <div class="col-6">
                                <span class="font-weight-bold"><?= number_format($product['Gia'], 0, ',', '.') ?>đ</span>
                            </div>
                            <div class="col-6">
                                <a href="<?= ROOT_URL ?>/them-vao-gio/<?= $product['idDT'] ?>" class="btn bg-navy text-white btn-addcart">
                                    Mua ngay
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="button-xemthem d-flex justify-content-center align-center">
            <a href="?act=product" class="btn bg-navy text-white px-4 mt-3" data-toggle="button" aria-pressed="false" autocomplete="off">
                Xem thêm
            </a>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="container p-0">
        <h3 class="title"><span class="title-navy">Sản phẩm</span> Xem nhiều</h3>
        <div class="card-columns">
            <?php
            foreach ($productView as $product) {
            ?>
                <div class="card mt-4 rounded shadow-sm card-product position-relative">
                    <img class="card-img-top" src="<?= $product['urlHinh'] ?>" alt="Card image cap">
                    <div class="card-body">
                        <a href="?act=detail&id=<?= $product['idDT'] ?>">
                            <h5 class="card-title"><?= $product['TenDT'] ?></h5>
                        </a>
                        <div class="row">
                            <div class="col-6">
                                <span class="font-weight-bold"><?= number_format($product['Gia'], 0, ',', '.') ?>đ</span>
                            </div>
                            <div class="col-6">
                                <a href="<?= ROOT_URL ?>/them-vao-gio/<?= $product['idDT'] ?>" class="btn bg-navy text-white btn-addcart">
                                    Mua ngay
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>