<?php
require_once '../system/model_system.php';
class model_nhasanxuat extends model_system
{
    function store($tenNSX, $ThuTu, $AnHien)
    { //hàm lưu 1 record vào table
        $sql = "INSERT INTO nhasanxuat(`TenNSX`, `ThuTu`, `AnHien`) VALUES ('$tenNSX','$ThuTu','$AnHien')";
        $kq = $this->execute($sql);
        return $kq;
    }
    function update($tenNSX, $ThuTu, $AnHien, $idnsx)
    { //hàm cập nhật 1 record vào table
        $sql = "UPDATE nhasanxuat SET TenNSX='$tenNSX', ThuTu='$ThuTu', AnHien='$AnHien' WHERE idNSX='$idnsx'";
        $kq = $this->execute($sql);
        return $kq;
    }
    function delete($id)
    {
        $sql = "DELETE FROM nhasanxuat WHERE idNSX=" . $id;
        $kq = $this->execute($sql);
        return $kq;
    }
    function listrecords()
    { //hàm lấy các record trong table
        $sql = "SELECT * FROM nhasanxuat";
        $kq = $this->query($sql);
        return $kq;
    }
    function detailrecord($id)
    { //hàm lấy chi tiết 1 record trong table
        $sql = "SELECT * FROM nhasanxuat WHERE idNSX=" . $id;
        $kq = $this->queryOne($sql);
        return $kq;
    }
}//class 