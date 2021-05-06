<div class="row">
    <div class="container py-3">
        <div class="row mb-3">
            <nav aria-label="">
                <ol class="breadcrumb bg-white">
                    <li class="breadcrumb-item"><a href="#">_Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">_<?= $detail['TenDT'] ?></li>
                </ol>
            </nav>
        </div>
        <div class="row mb-5">
            <div class="col-lg-6">
                <img src="<?= $detail['urlHinh'] ?>" class="rounded mx-auto d-block w-75" alt="...">
            </div>
            <div class="col-lg-6">
                <h3 class="text-name"><?= $detail['TenDT'] ?></h3>
                <h6 class="brand-name"><?= $this->model->getNameNhaSanXuat($detail['idNSX']) ?> | <i class="fa fa-eye"></i> <?= $detail['SoLanXem'] ?></h6>
                <hr>
                <div class="tabs">
                    <h3 class="mb-2 navbar-brand">Thông số kĩ thuật</h3>
                    <ul class="list-group border-light mb-2">
                        <li class="list-group-item p-2 d-flex"><span class="col-4">Màn hình: </span><span class="col-8 font-weight-bold"><?= $thuoctinh['ManHinh'] ?></span></li>
                        <li class="list-group-item p-2 d-flex"><span class="col-4">Hệ điều hành: </span><span class="col-8 font-weight-bold"><?= $thuoctinh['HeDieuHanh'] ?></span></li>
                        <li class="list-group-item p-2 d-flex"><span class="col-4">Camera Sau: </span><span class="col-8 font-weight-bold"><?= $thuoctinh['CameraSau'] ?></span></li>
                        <li class="list-group-item p-2 d-flex"><span class="col-4">Camera Trước: </span><span class="col-8 font-weight-bold"><?= $thuoctinh['CameraTruoc'] ?></span></li>
                        <li class="list-group-item p-2 d-flex"><span class="col-4">CPU: </span><span class="col-8 font-weight-bold"><?= $thuoctinh['CPU'] ?></span></li>
                        <li class="list-group-item p-2 d-flex"><span class="col-4">RAM: </span><span class="col-8 font-weight-bold"><?= $thuoctinh['RAM'] ?></span></li>
                        <li class="list-group-item p-2 d-flex"><span class="col-4">Bộ nhớ trong: </span><span class="col-8 font-weight-bold"><?= $thuoctinh['BoNhoTrong'] ?></span></li>
                        <li class="list-group-item p-2 d-flex"><span class="col-4">Thẻ nhớ: </span><span class="col-8 font-weight-bold"><?= $thuoctinh['TheNho'] ?></span></li>
                        <li class="list-group-item p-2 d-flex"><span class="col-4">Thẻ sim: </span><span class="col-8 font-weight-bold"><?= $thuoctinh['TheSim'] ?></span></li>
                        <li class="list-group-item p-2 d-flex"><span class="col-4">Dung lượng pin: </span><span class="col-8 font-weight-bold"><?= $thuoctinh['DungLuongPin'] ?></span></li>
                    </ul>
                    <div class="addcart mt-5">
                        <a href="?act=cart&what=add&id=<?=$detail['idDT']?>" type="button" class="btn btn-warning text-white">Thêm vào giỏ hàng</a>
                    </div>

                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="tab-content w-100">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Mô tả sản phẩm</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Bình luận</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="conten-des p-4">
                            <?= $detail['MoTa'] ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="comments p-4">
                            <div class="form-cmt">
                                <form action="?act=comment&iddt=<?=$_GET['id']?>" method="post">
                                    <div class="form-group">
                                        <label for="noidung">Họ và tên:</label>
                                        <input type="text" name="Name" id="noidung" class="form-control" placeholder="" aria-describedby="helpId" required value="<?php if(isset($_SESSION['sHoTen'])) echo $_SESSION['sHoTen'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nội dung bình luận:</label>
                                        <textarea class="form-control" name="Comment" id="" rows="2" required style="resize: none;"></textarea>
                                    </div>
                                    <input type="hidden" name="iddt" value="<?=$_GET['slug']?>">
                                    <button type="submit" class="btn btn-primary" name="cmt">Bình luận</button>
                                </form>
                            </div>
                            <hr>
                            <div class="show_cmt">
                                <div class="mess">
                                    <?php
                                        if(sizeof($comments) == 0){
                                            echo "<p>Chưa có bình luận nào cho sản phẩm này./</p>";
                                        }
                                    ?>
                                    <?php
                                        foreach($comments as $comment) {
                                    ?>
                                    <div class="d-flex">
                                        <div class="col-1">
                                            <img src="https://iupac.org/wp-content/uploads/2018/05/default-avatar.png" class="img-fluid" alt="">
                                        </div>
                                        <div class="col-11">
                                            <h6><?=$comment['Name']?></h6>
                                            <span class="brand-name d-block"><?=$comment['DateCmt']?></span>
                                            <p><?=$comment['NoiDungBL']?></p>
                                        </div>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <h4>Sản phẩm liên quan</h4>
            <div class="card-columns">
                <div class="card mt-4 rounded shadow-sm card-product position-relative">
                    <img class="card-img-top" src="https://www.xtmobile.vn/vnt_upload/product/Hinh_DT/Iphone/thumbs/(600x600)_crop_iphone-12-256-gb-xtmobile.jpg" alt="Card image cap">
                    <div class="card-body">
                        <a href="">
                            <h5 class="card-title">Dji Inspire-4</h5>
                        </a>
                        <div class="row">
                            <div class="col-6">
                                <span class="font-weight-bold">1,500,000đ</span>
                            </div>
                            <div class="col-6">
                                <button class="btn bg-navy text-white btn-addcart">
                                    Mua ngay
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-4 rounded shadow-sm card-product position-relative">
                    <img class="card-img-top" src="https://www.xtmobile.vn/vnt_upload/product/Hinh_DT/Iphone/thumbs/(600x600)_crop_iphone-12-256-gb-xtmobile.jpg" alt="Card image cap">
                    <div class="card-body">
                        <a href="">
                            <h5 class="card-title">Dji Inspire-4</h5>
                        </a>
                        <div class="row">
                            <div class="col-6">
                                <span class="font-weight-bold">1,500,000đ</span>
                            </div>
                            <div class="col-6">
                                <button class="btn bg-navy text-white btn-addcart">
                                    Mua ngay
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-4 rounded shadow-sm card-product position-relative">
                    <img class="card-img-top" src="https://www.xtmobile.vn/vnt_upload/product/Hinh_DT/Iphone/thumbs/(600x600)_crop_iphone-12-256-gb-xtmobile.jpg" alt="Card image cap">
                    <div class="card-body">
                        <a href="">
                            <h5 class="card-title">Dji Inspire-4</h5>
                        </a>
                        <div class="row">
                            <div class="col-6">
                                <span class="font-weight-bold">1,500,000đ</span>
                            </div>
                            <div class="col-6">
                                <button class="btn bg-navy text-white btn-addcart">
                                    Mua ngay
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-4 rounded shadow-sm card-product position-relative">
                    <img class="card-img-top" src="https://www.xtmobile.vn/vnt_upload/product/Hinh_DT/Iphone/thumbs/(600x600)_crop_iphone-12-256-gb-xtmobile.jpg" alt="Card image cap">
                    <div class="card-body">
                        <a href="">
                            <h5 class="card-title">Dji Inspire-4</h5>
                        </a>
                        <div class="row">
                            <div class="col-6">
                                <span class="font-weight-bold">1,500,000đ</span>
                            </div>
                            <div class="col-6">
                                <button class="btn bg-navy text-white btn-addcart">
                                    Mua ngay
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>