<?php
require_once '../system/model_system.php';
class model_dienthoai extends model_system
{
    function store($name, $slug, $price, $hot, $trangthai, $mota, $nhasanxuat, $namefile)
    { //hàm lưu 1 record vào table
        $sql = "INSERT INTO dienthoai( TenDT, slug, Gia, urlHinh, MoTa ,Hot , idNSX , AnHien) VALUES ('$name','$slug','$price','$namefile','$mota','$hot','$nhasanxuat','$trangthai')";
        $kq = $this->execute($sql);
        $id = $this->conn->lastInsertId();
        return $id;
    }
    function storethuoctinh($hedieuhanh, $manhinh, $camerasau, $cameratruoc, $cpu, $ram, $bonhotrong, $dungluongpin, $thenho, $thesim, $iddt)
    {
        echo $sql = "INSERT INTO thuoctinhdt(idDT, ManHinh, HeDieuHanh, CameraSau, CameraTruoc, CPU ,RAM , BoNhoTrong , TheNho, TheSim, DungLuongPin) VALUES ('$iddt','$manhinh','$hedieuhanh','$camerasau','$cameratruoc','$cpu','$ram','$bonhotrong','$thenho','$thesim','$dungluongpin')";
        $kq = $this->execute($sql);
        return $kq;
    }
    function update($name, $slug, $price, $hot, $trangthai, $mota, $nhasanxuat, $namefile, $iddt)
    { //hàm cập nhật 1 record vào table
        if ($namefile == "") {
            $sql = "UPDATE dienthoai SET TenDT='$name', slug = '$slug',Gia='$price', MoTa='$mota', Hot='$hot',idNSX='$nhasanxuat',AnHien='$trangthai' WHERE idDT=" . $iddt;
        } else {
            $sql = "UPDATE dienthoai SET TenDT='$name', slug = '$slug',Gia='$price', urlHinh='$namefile',MoTa='$mota', Hot='$hot',idNSX='$nhasanxuat',AnHien='$trangthai' WHERE idDT=" . $iddt;
        }
        $kq = $this->execute($sql);
        return  $kq;
    }
    function updatethuoctinh($hedieuhanh, $manhinh, $camerasau, $cameratruoc, $cpu, $ram, $bonhotrong, $dungluongpin, $thenho, $thesim, $iddt)
    {
        $sql = "UPDATE thuoctinhdt SET ManHinh='$manhinh', HeDieuHanh = '$hedieuhanh', CameraSau='$camerasau', CameraTruoc='$cameratruoc', CPU='$cpu', RAM ='$ram', BoNhoTrong='$bonhotrong', TheNho='$thenho', TheSim='$thesim', DungLuongPin = '$dungluongpin' WHERE idDT=" . $iddt;
        $kq = $this->execute($sql);
        return  $kq;
    }
    function delete($id)
    {
        $sql = "DELETE FROM dienthoai WHERE idDT=" . $id;
        $kq = $this->execute($sql);
        return $kq;
    }
    function thuoctinhdt($id)
    {
        $sql = "SELECT * FROM thuoctinhdt WHERE idDT=" . $id;
        $kq = $this->queryOne($sql);
        return $kq;
    }
    function deletett($id)
    {
        $sql = "DELETE FROM thuoctinhdt WHERE idDT=" . $id;
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