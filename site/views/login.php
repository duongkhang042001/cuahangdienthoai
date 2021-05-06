<div class="row my-4">
    <div class="m-auto col-4">
    <?php
        if(isset($err)) echo $err;
    ?>
        <form action="?act=user&what=login" method="POST" autocomplete="off">
        <h4>Đăng nhập</h4>
        <hr>
            <div class="form-group">
                <label for="">Tài khoản:</label>
                <input type="text" class="form-control" id="" aria-describedby="emailHelpId" placeholder="" name="username">
            </div>
            <div class="form-group">
                <label for="">Mật khẩu:</label>
                <input type="password" class="form-control" id="" aria-describedby="emailHelpId" placeholder="" name="password">
            </div>
            <div class="form-group">
                <a href="<?=ROOT_URL?>/quen-mat-khau/">Quên mật khẩu</a>
            </div>
            <button type="submit" class="btn btn-success" name="login">Đăng nhập</button>
            <hr>
            <p><a href="<?=ROOT_URL?>/dang-ky/">Đăng ký</a> nếu bạn chưa có tài khoản./</p>
        </form>
    </div>

</div>
