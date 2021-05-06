<div class="row my-4">
    <div class="m-auto col-4">
        <form action="?act=user&what=register" method="POST" autocomplete="off">
            <?php
            if (isset($err)) echo $err;
            ?>
            <h4>Đăng ký tài khoản</h4>
            <hr>
            <div class="form-group">
                <label for="">Tài khoản:</label>
                <input type="text" class="form-control" id="" aria-describedby="emailHelpId" placeholder="" name="username">
                <small class="text-danger"><?php if (isset($err_user)) echo $err_user ?></small>
            </div>
            <div class="form-group">
                <label for="">Họ và tên:</label>
                <input type="text" class="form-control" id="" aria-describedby="emailHelpId" placeholder="" name="HoTen">
            </div>
            <div class="form-group">
                <label for="">Email:</label>
                <input type="email" class="form-control" id="" aria-describedby="emailHelpId" placeholder="" name="email">
                <small class="text-danger"><?php if (isset($err_email)) echo $err_email ?></small>

            </div>
            <div class="form-group">
                <label for="">Mật khẩu:</label>
                <input type="password" class="form-control" id="passwordNew1" aria-describedby="emailHelpId" placeholder="" name="passwordNew">
            </div>
            <button type="submit" class="btn btn-success" name="register">Đăng ký</button>
            <hr>
            <p><a href="<?=ROOT_URL?>/dang-nhap/">Đăng nhập</a> nếu bạn đã có tài khoản./</p>
        </form>
    </div>

</div>