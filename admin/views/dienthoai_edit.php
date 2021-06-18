<form enctype="multipart/form-data" action="?ctrl=dienthoai&act=update" method="POST">
    <div class="row">
        <div class="col-lg-6 mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên điện thoại:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="<?= $detail['TenDT'] ?>">
        </div>
        <div class="col-lg-6 mb-3">
            <label for="exampleInputEmail1" class="form-label">Giá:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="price" value="<?= $detail['Gia'] ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mb-3">
            <div class="form-group">
                <label for="input-select">Loại:</label>
                <select class="form-control" id="input-select" name="hot">
                    <option value="0" <?php if ($detail['Hot'] == 0) echo "selected";
                                        else echo "" ?>>Thường</option>
                    <option value="1" <?php if ($detail['Hot'] == 1) echo "selected";
                                        else echo "" ?>>Đặc biệt</option>
                </select>
            </div>
        </div>
        <div class="col-lg-6 mb-3">
            <div class="form-group">
                <label for="input-select">Trạng thái:</label>
                <select class="form-control" id="input-select" name="anhien">
                    <option value="0" <?php if ($detail['AnHien'] == 0) echo "selected";
                                        else echo "" ?>>Ẩn</option>
                    <option value="1" <?php if ($detail['AnHien'] == 1) echo "selected";
                                        else echo "" ?>>Hiện</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Mô tả điện thoại:</label>
                <textarea class="form-control" id="textare" rows="50" name="mota"><?= $detail['MoTa'] ?></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mb-3">
            <label for="exampleInputEmail1" class="form-label">Hình ảnh:</label>
            <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="imgfile">
            <img src="<?= $detail['urlHinh'] ?>" width="30%" class="mt-2" alt="">
        </div>
        <div class="col-lg-6 mb-3">
            <div class="form-group">
                <label for="input-select">Thương hiệu</label>
                <select class="form-control" id="input-select" name="nhasanxuat">
                    <option selected>Mời bạn chọn hãng điện thoại</option>

                    <?php
                    foreach ($listNSX as $row) {
                        if ($row['idNSX'] == $detail['idNSX']) {
                            echo '<option value="', $row['idNSX'] . '" selected>' . $row['TenNSX'] . '</option>';
                        } else {
                            echo '<option value="', $row['idNSX'] . '">' . $row['TenNSX'] . '</option>';
                        }
                    } ?>
                </select>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-3 mb-3">
            <label for="exampleInputEmail1" class="form-label">Hệ điều hành:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="hedieuhanh" value="<?=$thuoctinh['HeDieuHanh']?>">
        </div>
        <div class="col-lg-3 mb-3">
            <label for="exampleInputEmail1" class="form-label">Màn hình:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="manhinh" value="<?=$thuoctinh['ManHinh']?>">
        </div>
        <div class="col-lg-3 mb-3">
            <label for="exampleInputEmail1" class="form-label">Camera Trước:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="cameratruoc" value="<?=$thuoctinh['CameraTruoc']?>">
        </div>
        <div class="col-lg-3 mb-3">
            <label for="exampleInputEmail1" class="form-label">Camera Sau:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="camerasau" value="<?=$thuoctinh['CameraSau']?>">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 mb-3">
            <label for="exampleInputEmail1" class="form-label">CPU:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="cpu" value="<?=$thuoctinh['CPU']?>">
        </div>
        <div class="col-lg-3 mb-3">
            <label for="exampleInputEmail1" class="form-label">RAM:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="ram" value="<?=$thuoctinh['RAM']?>">
        </div>
        <div class="col-lg-3 mb-3">
            <label for="exampleInputEmail1" class="form-label">Bộ nhớ trong:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="bonhotrong" value="<?=$thuoctinh['BoNhoTrong']?>">
        </div>
        <div class="col-lg-3 mb-3">
            <label for="exampleInputEmail1" class="form-label">Dung lượng pin:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="dungluongpin" value="<?=$thuoctinh['DungLuongPin']?>">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mb-3">
            <label for="exampleInputEmail1" class="form-label">Thẻ nhớ:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="thenho" value="<?=$thuoctinh['TheNho']?>">
        </div>
        <div class="col-lg-6 mb-3">
            <label for="exampleInputEmail1" class="form-label">Thẻ sim:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="thesim" value="<?=$thuoctinh['TheSim']?>">
        </div>
        <input type="hidden" name="iddt" value="<?=$_GET['iddt']?>">
    </div>
    <button type="submit" class="btn btn-primary mt-3" name="SuaDT">Sửa thông tin</button>
</form>