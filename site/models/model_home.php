<?php
require_once "../system/model_system.php";
class model_home extends model_system
{
    function sanphamMoi($sosp)
    {
        $sql = "SELECT * FROM dienthoai WHERE AnHien=1 ORDER BY idDT DESC LIMIT 0, $sosp";
        $kq = $this->query($sql);
        return $kq;
    }
    function sanphamXemNhieu($sosp)
    {
        $sql = "SELECT * FROM dienthoai WHERE AnHien=1 ORDER BY SoLanXem DESC LIMIT 0, $sosp";
        $kq = $this->query($sql);
        return $kq;
    }
    function dsSanPham()
    {
        $sql = "SELECT * FROM dienthoai WHERE AnHien=1";
        $kq = $this->query($sql);
        return $kq;
    }
    function dsNSX()
    {
        $sql = "SELECT * FROM nhasanxuat";
        $kq = $this->query($sql);
        return $kq;
    }
    function detailSP($id)
    {
        $sql = "SELECT * FROM dienthoai WHERE idDT ='$id'";
        $kq = $this->queryOne($sql);
        return $kq;
    }
    function getNameNhaSanXuat($id)
    {
        $sql = "SELECT TenNSX FROM nhasanxuat WHERE idNSX=" . $id;
        $kq = $this->queryOne($sql);
        return $kq['TenNSX'];
    }
    function thuoctinhdt($id)
    {
        $sql = "SELECT * FROM thuoctinhdt WHERE idDT=" . $id;
        $kq = $this->queryOne($sql);
        return $kq;
    }
    function updateView($id, $SoLanXem)
    {
        $sql = "UPDATE dienthoai SET SoLanXem = '$SoLanXem'  WHERE idDT =" . $id;
        $kq = $this->execute($sql);
        // exit();
        return $kq;
    }
    function search($query){
        $sql = "SELECT * FROM dienthoai WHERE AnHien=1 AND TenDT like '%$query%' ";
        $kq = $this->queryAll($sql);
        return $kq;
    }
    function addComment($name, $comment, $id, $date)
    {
        $sql = "INSERT INTO binhluan(NoiDungBL, idDT, Name, DateCmt) VALUES ('$comment','$id','$name','$date')";
        $kq = $this->execute($sql);
        return $kq;
    }
    function getComments($id)
    {
        $sql = "SELECT * FROM binhluan WHERE idDT=" . $id;
        $kq = $this->queryAll($sql);
        return $kq;
    }
    function sanphamTheoLoai($idcat)
    {
        $sql = "SELECT * FROM dienthoai WHERE idNSX = '$idcat'";
        $kq = $this->queryAll($sql);
        return $kq;
    }
    function luudonhangnhe($idDH, $ht, $email, $diachi, $ghichu, $thanhtoan, $giaohang)
    {
        if ($idDH == -1) {
            $sql = "INSERT INTO donhang SET TenNguoiNhan='{$ht}', emailNguoiNhan='{$email}', DiaChiNguoiNhan='{$diachi}', GhiChuCuaKhach = '{$ghichu}', PhuongThucThanhToan = '{$thanhtoan}', PhuongThucGiaoHang = '{$giaohang}',"
                . "ThoiDiemDatHang=Now(), AnHien=1";
            $kq = $this->query($sql);
            if (!$kq) return false;
            else return $this->conn->lastInsertId();
        } else {
            $sql = "UPDATE donhang SET TenNguoiNhan='{$ht}', emailNguoiNhan='{$email}',  DiaChiNguoiNhan='{$diachi}', GhiChuCuaKhach = '{$ghichu}', PhuongThucThanhToan = '{$thanhtoan}', PhuongThucGiaoHang = '{$giaohang}',"
                . "ThoiDiemDatHang=Now(), AnHien=1 where idDH=$idDH";
            $kq = $this->query($sql);
            if (!$kq) return false;
            else return $idDH;
        }
    } //function luudonhangnh
    function luugiohangnhe($idDH, $giohang)
    {
        $sql = "DELETE FROM donhangchitiet WHERE idDH='$idDH'";
        $this->query($sql);
        foreach ($giohang as $idDT => $dt) {
            $tenDT = $dt['TenDT'];
            $gia = $dt['Gia'];
            $Amount = $dt['Amount'];
            $sql = "INSERT INTO donhangchitiet SET idDH='$idDH', idDT= '$idDT', " . "TenDT='{$tenDT}', Gia='{$gia}', SoLuong='$Amount'";
            $kq = $this->query($sql);
        } //foreach
    }
    function checkuser($user, $pass)
    {
        $sql = "SELECT * FROM user WHERE UserName = '$user' AND Password = '$pass'";
        $kq = $this->queryOne($sql);
        return $kq;
    }
    function checkpass($idUser)
    {
        $sql = "SELECT * FROM user WHERE idUser = '$idUser'";
        $kq = $this->queryOne($sql);
        return $kq;
    }
    function changePass($pass1, $id)
    {
        $sql = "UPDATE user SET Password = '$pass1'  WHERE idUser =" . $id;
        $kq = $this->execute($sql);
        return $kq;
    }
    function checkusernamemail($username, $email)
    {
        $sql = "SELECT * FROM user WHERE UserName = '$username' OR Email = '$email'";
        $kq = $this->queryOne($sql);
        return $kq;
    }
    function register($username, $HoTen, $email, $pass, $otp)
    {
        $sql = "INSERT INTO user(UserName, Password, HoTen, Email, Otp) VALUES ('$username','$pass','$HoTen','$email','$otp')";
        $kq = $this->execute($sql);
        return $kq;
    }
    function checkotp($Otp)
    {
        $sql = "SELECT * FROM user WHERE Otp = '$Otp'";
        $kq = $this->queryOne($sql);
        return $kq;
    }
    function active($id)
    {
        $sql = "UPDATE user SET KichHoat = 1  WHERE idUser =" . $id;
        $kq = $this->execute($sql);
        return $kq;
    }
    function resetpass($mail, $pass)
    {
        $sql = "UPDATE user SET Password = '$pass'  WHERE Email = '$mail'";
        $kq = $this->execute($sql);
        return $kq;
    }
    function getpass($mail){
        $sql = "SELECT * FROM user WHERE Email = '$mail'";
        $kq = $this->queryOne($sql);
        return $kq;
    }
}//class 
