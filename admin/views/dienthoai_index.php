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
                                <th>Tên điện thoại</th>
                                <th>Giá</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($list as $stt => $list) {
                            ?>
                                <tr>
                                    <td><?= $stt + 1 ?></td>
                                    <td><a href="?ctrl=dienthoai&act=detail&iddt=<?=$list['idDT']?>"><?= $list['TenDT'] ?></a></td>
                                    <td><?= number_format($list['Gia'], 0, ',', '.') ?>đ</td>
                                    <td>
                                        <?php
                                        if ($list['AnHien'] == 1)
                                            echo '<div class="switch-button switch-button-xs">
                                                        <input type="checkbox" checked="" name="switch12" id="switch12"><span>
                                                    <label for="switch12"></label></span>
                                                    </div>';
                                        else
                                            echo '<div class="switch-button switch-button-xs">
                                        <input type="checkbox" name="switch12" id="switch12"><span>
                                    <label for="switch12"></label></span>
                                    </div>';
                                        ?>
                                    </td>
                                    <td>
                                        <a href="?ctrl=dienthoai&act=edit&iddt=<?= $list['idDT'] ?>" id="" class="btn btn-primary" href="#" role="button">Sửa</a>
                                        <a href="?ctrl=dienthoai&act=delete&iddt=<?= $list['idDT'] ?>" id="" class="btn btn-danger" href="#" role="button" onclick="return confirm('Bạn có đồng ý xóa hay không???')">Xóa</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Tên điện thoại</th>
                                <th>Giá</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end basic table  -->
    <!-- ============================================================== -->
</div>