<table class="table">
    <thead>
        <tr>
            <th scope="col" style="width: 5%;">#</th>
            <th scope="col" style="width: 25%;">Thông tin điện thoại</th>
            <th scope="col" style="width: 20%;">Hình ảnh</th>
            <th scope="col" style="width: 20%;">Mô tả</th>
            <th scope="col" style="width: 10%;">Ẩn hiện</th>
            <th scope="col" style="width: 20%;">Hành động</th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach($list as $stt => $row){
            $hot = $row['Hot'];
            if($hot == 1){
                $hot = '<span class="text-success">Có</span>';
            } else {
                $hot = '<span class="text-danger">Không</span>';
            }
    ?>
        <tr>
            <th scope="row"><?=$stt + 1?></th>
            <td>
                <div style="font-size: 14px;">
                    Tên điện thoại: <span class="fw-bold"><?=$row['TenDT']?></span><br>
                    Giá: <span class="fw-bold"><?=number_format($row['Gia'], 0, ',', '.')?>đ</span> <br>
                    Ngày nhập: <?=date("d-m-Y", strtotime($row['ThoiDiemNhap']))?> <br>
                    Sản phẩm đặc biệt: <?=$hot?><br>
                    Nhà sản xuất: <span class="fw-bold"><?=$this->model->getNameNhaSanXuat($row['idNSX'])['TenNSX']?></span><br>
                    Lượt xem: <?=$row['SoLanXem']?> | Lượt mua: <?=$row['SoLanMua']?> <br>
                    Tồn kho: <span class="badge bg-danger"><?=$row['SoLuongTonKho']?></span>
                </div>
            </td>
            <td class="align-items-center">
                <img src="<?=$row['urlHinh']?>" alt="" width="100px">
            </td>
            <td>
                <?=substr($row['MoTa'], 0, 150); //Cắt 100 kí tự đầu?>...
            </td>
            <td>
                <?php
                if ($row['AnHien'] == 1) echo ' <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked disabled>
                                                        <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                                                    </div>';
                else echo '<div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                </div>';
                ?>
            </td>
            <td>
                <a href="?ctrl=dienthoai&act=edit&iddt=<?= $row['idDT'] ?>" id="" class="btn btn-primary" href="#" role="button">Sửa</a>
                <a href="?ctrl=dienthoai&act=delete&iddt=<?= $row['idDT'] ?>" id="" class="btn btn-danger" href="#" role="button" onclick="return confirm('Bạn có đồng ý xóa hay không???')">Xóa</a>
            </td>
        </tr>
    <?php }?>
    </tbody>

</table>