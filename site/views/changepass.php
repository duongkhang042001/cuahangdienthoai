<div class="row my-4">
    <div class="m-auto col-4">
        <?php
        if (isset($err)) echo $err;
        ?>
        <form action="?act=user&what=changepass" method="POST" autocomplete="off">
            <h4>Đổi mật khẩu</h4>
            <hr>
            <div class="form-group">
                <label for="">Mật khẩu cũ:</label>
                <input type="password" class="form-control" id="password" aria-describedby="emailHelpId" placeholder="" name="password">
            </div>
            <div class="form-group">
                <label for="">Mật khẩu mới:</label>
                <input type="password" class="form-control" id="passwordNew1" aria-describedby="emailHelpId" placeholder="" name="passwordNew1">
            </div>
            <div class="form-group">
                <label for="">Nhập lại mật khẩu mới:</label>
                <input type="password" class="form-control" id="passwordNew2" aria-describedby="emailHelpId" placeholder="" name="passwordNew2">
            </div>
            <button type="submit" class="btn btn-success" name="changePass">Đổi mật khẩu</button>
            <hr>
        </form>
    </div>

</div>