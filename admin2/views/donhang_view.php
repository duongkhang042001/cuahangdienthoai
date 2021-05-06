<div class="row">
    <!-- ============================================================== -->
    <!-- basic table  -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Đơn hàng chi tiết</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="?ctrl=donhang&act=hoanthanh&id=<?=$detail['idDH']?>" method="post">
                        <table class="table table-striped table-bordered first">
                            <thead>
                                <!-- <tr>
                                <th>Thông tin</th>
                                <th>Giá</th>
                                <th>
                                    <div class="form-group">
                                        <select class="form-control" id="input-select" name="">
                                            <option value="0" selected>Chưa xử lý</option>
                                            <option value="1">Đã xử lý</option>
                                        </select>
                                    </div>
                                </th>
                                <td>
                                    <a href="" class="btn btn-danger">Xóa đơn hàng</a>
                                </td>
                            </tr> -->
                                <tr>
                                    <th>Mã đơn hàng: <?= $detail['idDH'] ?></th>
                                    <th>Tên người nhận: <?= $detail['TenNguoiNhan'] ?></th>
                                    <th>Thông tin người nhận: <br>
                                        Email: <?= $detail['EmailNguoiNhan'] ?><br>
                                        SĐT: 0975412089<br>

                                    </th>
                                    <th>Ghi chú: <?= $detail['GhiChuCuaKhach'] ?><br></th>
                                </tr>
                                <tr>
                                    <th>Tên điện thoại: <?= $detailDH['TenDT'] ?></th>
                                    <th>Số lượng: <?= $detailDH['SoLuong'] ?></th>
                                    <th>Tổng tiền: <?= $detailDH['Gia'] ?></th>
                                    <th>
                                        <div class="form-group">
                                            <select class="form-control" id="input-select" name="trangthai">
                                                <option value="0" selected>Chưa xử lý</option>
                                                <option value="1">Đã xử lý</option>
                                            </select>
                                        </div>
                                    </th>
                                </tr>

                            </thead>

                        </table>
                        <button type="submit" class="btn btn-primary mt-3" name="hoanthanh">Cập nhập</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end basic table  -->
    <!-- ============================================================== -->
</div>