<div class="row">
    <!-- ============================================================== -->
    <!-- basic table  -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Danh sách</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên người nhận</th>
                                <th>Thông tin người nhận</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php
                            foreach ($list as $stt => $list) {
                            ?>
                                <tr>
                                    <td>
                                        <?=$stt + 1?>
                                    </td>
                                    <td>
                                        <?=$list['TenNguoiNhan']?>
                                    </td>
                                    <td>
                                        Email: <?=$list['EmailNguoiNhan']?><br>
                                        SĐT: 0975412089<br>
                                        Ghi chú: <?=$list['GhiChuCuaKhach']?><br>
                                    </td>
                                    <td>
                                        <?php
                                            if($list['TrangThai'] == 0){
                                                echo '<span class="text-danger">Chưa xử lý</span>';
                                        
                                            }
                                            else
                                            {
                                                echo '<span class="text-cuccess">Đã xử lý</span>';
                                            }
                                        ?>
                                        
                                    </td>
                                    <td>
                                        <a href="?ctrl=donhang&act=viewdonhang&iddh=<?=$list['idDH']?>" class="btn btn-primary">Xem đơn hàng</a>
                                        <a href="?ctrl=donhang&act=delete&iddh=<?=$list['idDH']?>" class="btn btn-danger">Xóa đơn hàng</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end basic table  -->
    <!-- ============================================================== -->
</div>