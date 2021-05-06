<form method="POST" action="?ctrl=nhasanxuat&act=update">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Tên nhà sản xuất:</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nameNSX" value="<?=$detail['TenNSX']?>">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Thứ tự:</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="ThuTu" value="<?=$detail['ThuTu']?>">
    </div>
    <div class="mb-3 d-flex w-25 justify-content-between">
        <span>Trạng thái:</span>
        <?php
            if($detail['Anhien']==1) echo '<div class="form-check">
            <input class="form-check-input" type="radio" name="AnHien" id="flexRadioDefault1" value="0">
            <label class="form-check-label" for="flexRadioDefault1">
                Ẩn
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="AnHien" id="flexRadioDefault2" value="1" checked>
            <label class="form-check-label" for="flexRadioDefault2">
                Hiện
            </label>
        </div>';
            else echo '<div class="form-check">
            <input class="form-check-input" type="radio" name="AnHien" id="flexRadioDefault1" value="0" checked>
            <label class="form-check-label" for="flexRadioDefault1">
                Ẩn
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="AnHien" id="flexRadioDefault2" value="1" >
            <label class="form-check-label" for="flexRadioDefault2">
                Hiện
            </label>
        </div>';
        ?>
        <!-- <div class="form-check">
            <input class="form-check-input" type="radio" name="AnHien" id="flexRadioDefault1" value="0">
            <label class="form-check-label" for="flexRadioDefault1">
                Ẩn
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="AnHien" id="flexRadioDefault2" value="1" checked>
            <label class="form-check-label" for="flexRadioDefault2">
                Hiện
            </label>
        </div> -->
        <input type="hidden" name="idnsx" value="<?=$_GET['idnsx']?>">
    </div>
    <button type="submit" class="btn btn-primary" name="updateNSX">Sửa nhà sản xuất</button>
</form>