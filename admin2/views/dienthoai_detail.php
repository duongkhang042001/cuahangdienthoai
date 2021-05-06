<div class="row">
    <div class="container py-3">
        <div class="row mb-5">
            <div class="col">
                <h3 class="text-name"><?= $detail['TenDT'] ?></h3>
                <a href="?ctrl=dienthoai&act=edit&iddt=<?=$detail['idDT']?>" class="btn btn-primary mb-3">Sửa thông tin</a>
                <h6 class="brand-name"><?= $this->model->getNameNhaSanXuat($detail['idNSX'])['TenNSX'] ?> | <i class="fa fa-eye"></i> <?= $detail['SoLanXem'] ?></h6>
                <hr>
                <div class="tabs">
                    <h3 class="mb-2 navbar-brand p-0">Thông số kĩ thuật:</h3>
                    <ul class="list-group border-light mb-2">
                        <li class="list-group-item p-2 d-flex"><span class="col-4">Màn hình: </span><span class="col-8 font-weight-bold"><?= $thuoctinh['ManHinh'] ?></span></li>
                        <li class="list-group-item p-2 d-flex"><span class="col-4">Hệ điều hành: </span><span class="col-8 font-weight-bold"><?= $thuoctinh['HeDieuHanh'] ?></span></li>
                        <li class="list-group-item p-2 d-flex"><span class="col-4">Camera Sau: </span><span class="col-8 font-weight-bold"><?= $thuoctinh['CameraSau'] ?></span></li>
                        <li class="list-group-item p-2 d-flex"><span class="col-4">Camera Trước: </span><span class="col-8 font-weight-bold"><?= $thuoctinh['CameraTruoc'] ?></span></li>
                        <li class="list-group-item p-2 d-flex"><span class="col-4">CPU: </span><span class="col-8 font-weight-bold"><?= $thuoctinh['CPU'] ?></span></li>
                        <li class="list-group-item p-2 d-flex"><span class="col-4">RAM: </span><span class="col-8 font-weight-bold"><?= $thuoctinh['RAM'] ?></span></li>
                        <li class="list-group-item p-2 d-flex"><span class="col-4">Bộ nhớ trong: </span><span class="col-8 font-weight-bold"><?= $thuoctinh['BoNhoTrong'] ?></span></li>
                        <li class="list-group-item p-2 d-flex"><span class="col-4">Thẻ nhớ: </span><span class="col-8 font-weight-bold"><?= $thuoctinh['TheNho'] ?></span></li>
                        <li class="list-group-item p-2 d-flex"><span class="col-4">Thẻ sim: </span><span class="col-8 font-weight-bold"><?= $thuoctinh['TheSim'] ?></span></li>
                        <li class="list-group-item p-2 d-flex"><span class="col-4">Dung lượng pin: </span><span class="col-8 font-weight-bold"><?= $thuoctinh['DungLuongPin'] ?></span></li>
                    </ul>
                    <hr>
                    <h3 class="mb-2 navbar-brand p-0">Mô tả:</h3>
                    <?= $detail['MoTa'] ?>
                    <hr>
                    <h3 class="mb-2 navbar-brand p-0">Hình ảnh:</h3>
                    <br>
                    <img src="<?=$detail['urlHinh']?>" class="img-fluid" alt="">
                </div>
            </div>
            
        </div>
        <a href="?ctrl=dienthoai&act=edit&iddt=<?=$detail['idDT']?>" class="btn btn-primary mb-3">Sửa thông tin</a>

    </div>
</div>