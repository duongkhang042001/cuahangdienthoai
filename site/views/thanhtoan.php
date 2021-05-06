<div class="row my-3">
    <div class="container">
        <h3 class="mb-3">Thanh toán</h3>
        <div class="row">
            <div class="col-8">
                <form method="POST" action="?act=luudonhang" id="form">
                    <div class="thongtinnguoinhan">
                        <p class="text-primary font-weight-bold">Thông tin người nhận</p>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Họ và tên:</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="HoTen">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Số điện thoại:</label>
                            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="" name="DienThoai">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Mail:</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="" name="email">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Địa chỉ giao hàng:</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="diachigiaohang"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Ghi chú:</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="ghichu"></textarea>
                        </div>
                    </div>
                    <div class="row thongtingiaohang">
                        <div class="col-6">
                            <p class="text-primary font-weight-bold">Phương thức giao hàng</p>
                            <div class="">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio1" name="phuongthucgh" class="custom-control-input" value="Giao hàng nhanh">
                                    <label class="custom-control-label" for="customRadio1">Giao hàng nhanh</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio2" name="phuongthucgh" class="custom-control-input" value="Giao hàng tiết kiệm">
                                    <label class="custom-control-label" for="customRadio2">Giao hàng tiết kiệm</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio3" name="phuongthucgh" class="custom-control-input" value="VN POST">
                                    <label class="custom-control-label" for="customRadio3">VN POST</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio4" name="phuongthucgh" class="custom-control-input" value="VIETTEL POST">
                                    <label class="custom-control-label" for="customRadio4">VIETTEL POST</label>
                                </div>

                            </div>
                        </div>
                        <div class="col-6">
                            <p class="text-primary font-weight-bold">Phương thức thanh toán</p>
                            <div class="">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio5" name="phuongthuctt" class="custom-control-input" value="Chuyển khoản">
                                    <label class="custom-control-label" for="customRadio5">Chuyển khoản</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio6" name="phuongthuctt" class="custom-control-input" value="Thanh toán khi nhận hàng">
                                    <label class="custom-control-label" for="customRadio6">Thanh toán khi nhận hàng</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio7" name="phuongthuctt" class="custom-control-input" value="Momo">
                                    <label class="custom-control-label" for="customRadio7">Momo</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio8" name="phuongthuctt" class="custom-control-input" value="VN PAY">
                                    <label class="custom-control-label" for="customRadio8">VN PAY</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-4">
                <p class="text-primary font-weight-bold">Danh sách đơn hàng</p>
                <?php
                foreach ($_SESSION['giohang'] as $idproduct => $product) {
                    $tongtien += ($product['Gia'] * $product['Amount']);
                ?>
                    <div class="cart_view d-flex">
                        <div class="col-6"><a href="?act=detail&id=<?= $idproduct ?>" class="text-dark"><?= $product['TenDT'] ?></a><br>
                        </div>
                        <div class="col-6">
                            <input type="number" disabled id="soluong" class="form-control text-center" min="1" max="100" value="<?= $product['Amount'] ?>">
                        </div>
                    </div>
                    <hr>
                <?php } ?>
                <p class="font-weight-bold text-right">Tổng tiền: <?= number_format($tongtien, 0, ',', ',') ?>đ</p>
                <button class="btn btn-primary float-right" id="submit">Tiến hành thanh toán</button>
            </div>
        </div>
    </div>
</div>
