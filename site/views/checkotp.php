<div class="row my-4">
    <div class="m-auto col-4">
        <?php
        if (isset($err)) echo $err;
        ?>
        <form action="?act=user&what=checkotp" method="POST" autocomplete="off">
            <h4>Kích hoạt tài khoản</h4>
            <hr>
            <div class="form-group">
                <label for="">Mã xác nhận:</label>
                <input type="number" class="form-control" id="" aria-describedby="emailHelpId" placeholder="" name="otp">
            </div>
            <button type="submit" class="btn btn-success" name="checkotp">Kích hoạt tài khoản</button>
            <hr>
            <small><a href="">Gửi lại mã kích hoạt.</a></small>

        </form>
    </div>

</div>