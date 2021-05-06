
<form enctype="multipart/form-data" action="?ctrl=dienthoai&act=update" method="POST">
    <div class="row">
        <div class="col-lg-6 mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên điện thoại:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="<?=$detail['TenDT']?>">
        </div>
        <div class="col-lg-6 mb-3">
            <label for="exampleInputEmail1" class="form-label">Giá:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="price" value="<?=$detail['Gia']?>">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mb-3">
            <label for="exampleInputEmail1" class="form-label">Trạng thái đặc biệt:</label>
            <select class="form-select" aria-label="Default select example" name="hot">
                <option value="0" <?php if($detail['Hot'] == 0) echo "selected"; else echo "" ?> >Thường</option>
                <option value="1" <?php if($detail['Hot'] == 1) echo "selected"; else echo "" ?> >Đặc biệt</option>
            </select>
        </div>
        <div class="col-lg-6 mb-3">
            <label for="exampleInputEmail1" class="form-label">Trạng thái:</label>
            <select class="form-select" aria-label="Default select example" name="anhien">
                <option value="0" <?php if($detail['AnHien'] == 0) echo "selected"; else echo "" ?>>Ẩn</option>
                <option value="1" <?php if($detail['Hot'] == 1) echo "selected"; else echo "" ?>>Hiện</option>
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="form-label">Mô tả điện thoại:</label>
        <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="textare" rows="50" name="mota"><?=$detail['MoTa']?></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mb-3">
            <label for="exampleInputEmail1" class="form-label">Hình ảnh:</label>
            <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="imgfile">
            <div class="card mt-4" style="width: 15rem;">
                <img src="<?=$detail['urlHinh']?>" class="card-img-top" alt="...">
            </div>
        </div>
        <div class="col-lg-6 mb-3">
            <label for="exampleInputEmail1" class="form-label">Hãng điện thoại:</label>
            <select class="form-select" aria-label="Default select example" name="nhasanxuat">
                <option selected>Mời bạn chọn hãng điện thoại</option>
                <?php
                    foreach($listNSX as $row){
                        if($row['idNSX'] == $detail['idNSX']){
                            echo '<option value="',$row['idNSX'].'" selected>'.$row['TenNSX'].'</option>';
                        } else {
                            echo '<option value="',$row['idNSX'].'">'.$row['TenNSX'].'</option>'; 
                        }
                    }
                ?>
                <option value="<?=$row['idNSX']?>"><?=$row['TenNSX']?></option>
            </select>
        </div>
    </div>
    <input type="hidden" name="iddt" value="<?=$_GET['iddt']?>">
    <button type="submit" class="btn btn-primary mt-3" name="SuaDT">Sửa sản phẩm</button>
</form>