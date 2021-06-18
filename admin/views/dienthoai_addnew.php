<form enctype="multipart/form-data" action="?ctrl=dienthoai&act=store" method="POST">
    <div class="row">
        <div class="col-lg-6 mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên điện thoại:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
        </div>
        <div class="col-lg-6 mb-3">
            <label for="exampleInputEmail1" class="form-label">Giá:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="price">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mb-3">
            <div class="form-group">
                <label for="input-select">Loại:</label>
                <select class="form-control" id="input-select" name="hot">
                    <option value="0" selected>Thường</option>
                    <option value="1">Đặc biệt</option>
                </select>
            </div>
        </div>
        <div class="col-lg-6 mb-3">
            <div class="form-group">
                <label for="input-select">Trạng thái:</label>
                <select class="form-control" id="input-select" name="anhien">
                    <option value="0">Ẩn</option>
                    <option value="1" selected>Hiện</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Mô tả điện thoại:</label>
                <textarea class="form-control" id="textare" rows="50" name="mota"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mb-3">
            <label for="exampleInputEmail1" class="form-label">Hình ảnh:</label>
            <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="imgfile">
        </div>
        <div class="col-lg-6 mb-3">
            <div class="form-group">
                <label for="input-select">Thương hiệu</label>
                <select class="form-control" id="input-select" name="nhasanxuat">
                    <option selected>Mời bạn chọn hãng điện thoại</option>

                    <?php
                    foreach ($listNSX as $row) {
                    ?>
                        <option value="<?= $row['idNSX'] ?>"><?= $row['TenNSX'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-3 mb-3">
            <label for="exampleInputEmail1" class="form-label">Hệ điều hành:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="hedieuhanh">
        </div>
        <div class="col-lg-3 mb-3">
            <label for="exampleInputEmail1" class="form-label">Màn hình:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="manhinh">
        </div>
        <div class="col-lg-3 mb-3">
            <label for="exampleInputEmail1" class="form-label">Camera Trước:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="cameratruoc">
        </div>
        <div class="col-lg-3 mb-3">
            <label for="exampleInputEmail1" class="form-label">Camera Sau:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="camerasau">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 mb-3">
            <label for="exampleInputEmail1" class="form-label">CPU:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="cpu">
        </div>
        <div class="col-lg-3 mb-3">
            <label for="exampleInputEmail1" class="form-label">RAM:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="ram">
        </div>
        <div class="col-lg-3 mb-3">
            <label for="exampleInputEmail1" class="form-label">Bộ nhớ trong:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="bonhotrong">
        </div>
        <div class="col-lg-3 mb-3">
            <label for="exampleInputEmail1" class="form-label">Dung lượng pin:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="dungluongpin">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mb-3">
            <label for="exampleInputEmail1" class="form-label">Thẻ nhớ:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="thenho">
        </div>
        <div class="col-lg-6 mb-3">
            <label for="exampleInputEmail1" class="form-label">Thẻ sim:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="thesim">
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3" name="ThemDT">Thêm sản phẩm</button>
</form>