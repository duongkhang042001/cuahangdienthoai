<?php
require_once '../system/model_system.php';
class model_login extends model_system {
    function kiemtra($Username,$Password){
        $sql="SELECT * FROM user where Username='$Username' and Password='$Password'";
        $kq= $this->queryOne($sql);
        return $kq;
    }
    }
    ?>
