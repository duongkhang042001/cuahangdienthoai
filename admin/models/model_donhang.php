<?php
require_once '../system/model_system.php';
class model_donhang extends model_system
{
    function listrecords()
    { //hàm lấy các record trong table
        $sql = "SELECT * FROM donhang";
        $kq = $this->query($sql);
        return $kq;
    }
    function detail($id)
    {
        $sql = "SELECT * FROM donhang WHERE idDH =" . $id;
        $kq = $this->queryOne($sql);
        return $kq;
    }
    function detailDH($id)
    {
        $sql = "SELECT * FROM donhangchitiet WHERE idDH =" . $id;
        $kq = $this->queryOne($sql);
        return $kq;
    }
    function hoanthanh($trangthai, $id)
    {
        $sql = "UPDATE donhang SET TrangThai = '$trangthai' WHERE idDH=" . $id;
        $kq = $this->execute($sql);
        return $kq;
    }
    function delete($id)
    {
        $sql2 = "DELETE FROM donhangchitiet WHERE idDH=" . $id;
        $kq2 = $this->execute($sql2);
        $sql1 = "DELETE FROM donhang WHERE idDH=" . $id;
        $kq1 = $this->execute($sql1);
    }
}
