<div class="row my-3">
    <div class="container">
        <h3 class="mb-3">Giỏ hàng</h3>
        <?php
        if (!isset($_SESSION['giohang'])) {
            echo '<div class="img_cart">
                <img src="https://salt.tikicdn.com/desktop/img/mascot@2x.png" alt="" class="">
                <p class="p-3">Hiện tại không có sản phẩm nào trong giỏ hàng./</p>
                <a href="?act=home" class="btn btn-primary">Tiếp tục mua sắm</a>
            </div>';
        } else { ?>

            <div class="row">
                <div class="col-9">
                    <?php
                    foreach ($_SESSION['giohang'] as $idproduct => $product) {
                        $tongtien += ($product['Gia'] * $product['Amount']);
                    ?>
                        <div class="cart_view d-flex">
                            <div class="col-2">
                                <img src="<?= $product['img'] ?>" class="img-fluid" alt="">
                            </div>
                            <div class="col-4"><a href="?act=detail&id=<?=$idproduct?>" class="text-dark"><?= $product['TenDT'] ?></a><br>
                                <a href="?act=cart&what=remove&id=<?= $idproduct ?>">Xóa khỏi giỏ hàng</a>
                            </div>
                            <div class="col-2"><?= number_format($product['Gia'], 0, ',', ',') ?>đ</div>
                            <div class="col-3">
                                <div class="input-group">
                                    <a href="<?=ROOT_URL?>/xoa-khoi-gio/<?= $idproduct ?>" class="input-group-text btn btn-danger" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"> - </a>
                                    <input type="number" id="soluong" class="form-control text-center" min="1" max="100" value="<?= $product['Amount'] ?>">
                                    <a href="<?=ROOT_URL?>/them-vao-gio/<?= $idproduct ?>" class="input-group-text btn btn-success" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"> + </a>
                                </div>
                            </div>
                        </div>
                        <hr>
                    <?php } ?>
                    <a href="<?=ROOT_URL?>/xoa-gio-hang/" class="btn btn-primary">Xóa giỏ hàng</a>
                </div>
                <div class="col-3">
                    <h5>Thành tiền</h5>
                    <span class="brand-name">Tạm tính: </span><span class="price"><?= number_format($tongtien, 0, ',', ',') ?>đ</span>
                    <hr>
                    Tổng tiền: <span class="price"><?= number_format($tongtien, 0, ',', ',') ?>đ</span>
                    <small class="d-block">(Đã bao gồm VAT nếu có)</small>
                    <a href="?act=thanhtoan" class="btn btn-danger mt-3">Tiến hành đặt hàng</a>
                </div>
            </div>
        <?php } ?>

    </div>
</div>