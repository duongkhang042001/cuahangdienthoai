<table class="table" id="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tên nhà sản xuất</th>
            <th scope="col">Thứ tự</th>
            <th scope="col">Ẩn hiện</th>
            <th scope="col">Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($list == NULL) echo "Chưa có dữ liệu";
        else foreach ($list as $stt => $row) {
        ?>
            <tr>
                <th scope="row"><?= $stt + 1 ?></th>
                <td><?= $row['TenNSX'] ?></td>
                <td><?= $row['ThuTu'] ?></td>
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
                    <a href="?ctrl=nhasanxuat&act=edit&idnsx=<?= $row['idNSX'] ?>" id="" class="btn btn-primary" href="#" role="button">Sửa</a>
                    <a href="?ctrl=nhasanxuat&act=delete&idnsx=<?= $row['idNSX'] ?>" id="" class="btn btn-danger" href="#" role="button" onclick="return confirm('Bạn có đồng ý xóa hay không???')">Xóa</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>