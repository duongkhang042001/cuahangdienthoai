<div class="row mt-4">
    <div class="container p-0">
        <nav aria-label="breadcrumb p-0" style="background-color: white !important;" class="row">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tìm kiếm</li>
            </ol>
        </nav>
        <div class="row d-flex justify-content-between">
            <h3 class="title"><span class="title-navy">Từ khóa</span> tìm kiếm: "<?=$query?>"</h3>
        </div>
        <?php if(isset($err)) echo $err?>
        <div class="card-columns">
        <?php
            foreach ($list as $product) {
            ?>
                <div class="card mt-4 rounded shadow-sm card-product position-relative">
                    <img class="card-img-top" src="<?= $product['urlHinh'] ?>" alt="Card image cap">
                    <?php if ($product['Hot'] == 1) { ?>
                        <div class="hot position-absolute font-italic">Sản phẩm hot</div>
                    <?php } ?>
                    <div class="card-body">
                        <a href="?act=detail&id=<?=$product['idDT']?>">
                            <h5 class="card-title"><?= $product['TenDT'] ?> 
                                <?php if ($product['Hot'] == 1) { ?>
                                    <span class="badge badge-danger"> New</span>
                                <?php } ?>
                            </h5>
                        </a>
                        <div class="row">
                            <div class="col-6">
                                <span class="font-weight-bold"><?=number_format($product['Gia'], 0, ',', '.') ?>đ</span>
                            </div>
                            <div class="col-6">
                                <a href="?act=cart&what=add&id=<?=$product['idDT']?>" class="btn bg-navy text-white btn-addcart">
                                    Mua ngay
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <hr>
    </div>
</div>