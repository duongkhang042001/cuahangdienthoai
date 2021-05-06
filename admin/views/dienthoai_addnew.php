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
            <label for="exampleInputEmail1" class="form-label">Trạng thái đặc biệt:</label>
            <select class="form-select" aria-label="Default select example" name="hot">
                <option value="0" selected>Thường</option>
                <option value="1">Đặc biệt</option>
            </select>
        </div>
        <div class="col-lg-6 mb-3">
            <label for="exampleInputEmail1" class="form-label">Trạng thái:</label>
            <select class="form-select" aria-label="Default select example" name="anhien">
                <option value="0">Ẩn</option>
                <option value="1" selected>Hiện</option>
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="form-label">Mô tả điện thoại:</label>
        <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="textare" rows="50" name="mota"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mb-3">
            <label for="exampleInputEmail1" class="form-label">Hình ảnh:</label>
            <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="imgfile">
        </div>
        <div class="col-lg-6 mb-3">
            <label for="exampleInputEmail1" class="form-label">Hãng điện thoại:</label>
            <select class="form-select" aria-label="Default select example" name="nhasanxuat">
                <option selected>Mời bạn chọn hãng điện thoại</option>
                <?php
                foreach ($listNSX as $row) {
                ?>
                    <option value="<?= $row['idNSX'] ?>"><?= $row['TenNSX'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3" name="ThemDT">Thêm sản phẩm</button>
</form>