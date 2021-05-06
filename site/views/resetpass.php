<div class="row my-4">
    <div class="m-auto col-4">
        <?php
        if (isset($err)) echo $err;
        ?>
        <form action="?act=user&what=resetpass" method="POST" autocomplete="off">
            <h4>Cấp lại mật khẩu</h4>
            <hr>
            <div class="form-group">
                <label for="">Email:</label>
                <input type="email" class="form-control" id="" aria-describedby="emailHelpId" placeholder="" name="email">
            </div>
            <button type="submit" class="btn btn-success" name="resetpass">Quên mật khẩu</button>
            <hr>
        </form>
    </div>

</div>