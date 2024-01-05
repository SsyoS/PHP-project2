<?php
class order
{
    public function InsertOrder($makh)
    {
        $db = new connect();
        $ngaydat = new DateTime('now');
        $ngaydat = $ngaydat->format('Y-m-d');
        $query = "insert into hoadon1(masohd, makh, ngaydat, tongtien) 
        values (NULL, $makh, '$ngaydat', 0)";
        $db->exec($query);
        $int = $db->getinstance("select masohd from hoadon1 order by masohd desc limit 1");
        return $int[0];
    }
    public function insertOrderDetail($masohd, $mahh, $soluong, $size, $thanhtien)
    {
        $db = new connect();
        $query = "insert into cthoadon1(masohd, mahh, soluongmua, size, thanhtien)  values ('$masohd', '$mahh', '$soluong', '$size',$thanhtien)";
        $db->exec($query);
    }   


    public function updateTotal($masohd, $total)
    {
        $db = new connect();
        $query = "update hoadon1 set tongtien = $total where masohd = '$masohd'";
        $db->exec($query);
    }

    public function getInfoOrder($masohd)
    {
        $db = new connect();
        $query = "SELECT ct.mahh, ct.soluongmua, ct.size, ct.thanhtien, hh.tenhh, hh.dongia FROM cthoadon1 ct, hoadon1 hd, hanghoa hh WHERE hd.masohd = $masohd AND ct.masohd=hd.masohd AND hh.mahh= ct.mahh";
        $result =  $db->getList($query);
        unset($_SESSION['giohang']);
        return $result;
    }
    public function getInfoKhachhang($masohd)
    {
        $db = new connect();
        $query = "SELECT * FROM hoadon1 hd, khachhang1 kh WHERE hd.makh= kh.makh and masohd=$masohd";
        $result = $db->getinstance($query);
        return $result;
    }
}
