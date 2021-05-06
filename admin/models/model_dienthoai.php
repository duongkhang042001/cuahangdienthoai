<?php
require_once '../system/model_system.php';
class model_dienthoai extends model_system
{
    function store($name, $price, $hot, $trangthai, $mota, $nhasanxuat, $namefile)
    { //hàm lưu 1 record vào table
        $sql = "INSERT INTO dienthoai( TenDT, Gia, urlHinh, MoTa ,Hot , idNSX , AnHien) VALUES ('$name','$price','$namefile','$mota','$hot','$nhasanxuat','$trangthai')";
        $kq = $this->execute($sql);
        return $kq;
    }
    function update($name, $price, $hot, $trangthai, $mota, $nhasanxuat, $namefile, $iddt)
    { //hàm cập nhật 1 record vào table
        if ($namefile == "") {
            echo $sql = "UPDATE dienthoai SET TenDT='$name',Gia='$price', MoTa='$mota', Hot='$hot',idNSX='$nhasanxuat',AnHien='$trangthai' WHERE idDT=" . $iddt;
        } else {
            echo $sql = "UPDATE dienthoai SET TenDT='$name',Gia='$price', urlHinh='$namefile',MoTa='$mota', Hot='$hot',idNSX='$nhasanxuat',AnHien='$trangthai' WHERE idDT=" . $iddt;
        }
        $kq = $this->execute($sql);
        return  $kq;
    }
    function delete($id)
    {
        $sql = "DELETE FROM dienthoai WHERE idDT=" . $id;
        $kq = $this->execute($sql);
        return $kq;
    }
    function listrecords()
    { //hàm lấy các record trong table
        $sql = "SELECT * FROM dienthoai";
        $kq = $this->query($sql);
        return $kq;
    }
    function detailrecord($id)
    {
        $sql = "SELECT * FROM dienthoai WHERE idDT=" . $id;
        $kq = $this->queryOne($sql);
        return $kq;
    }
    function getNameNhaSanXuat($id)
    {
        $sql = "SELECT TenNSX FROM nhasanxuat WHERE idNSX=" . $id;
        $kq = $this->queryOne($sql);
        return $kq;
    }
    function listrecordsNSX()
    { //hàm lấy các record trong table
        $sql = "SELECT * FROM nhasanxuat";
        $kq = $this->query($sql);
        return $kq;
    }
}//class 