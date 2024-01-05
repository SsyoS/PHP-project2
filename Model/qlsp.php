<?php
class qlsp
{
    public function __construct()
    {
    }
    function Insertsanpham($tenhh, $dongia, $giamgia, $hinh, $Nhom, $soluotxem, $ngaylap, $mota)
    {
        $db = new connect();
        $query = "insert into hanghoa(mahh,tenhh,dongia,giamgia,hinh,Nhom,soluotxem,ngaylap,mota)
        values(null,'$tenhh',$dongia,$giamgia,'$hinh',$Nhom,$soluotxem,'$ngaylap','$mota')";
        $db->exec($query);
    }
    function deletesanpham0($mahh)
    {
        $db = new connect();
        $query1 = "delete from cthoadon1 where mahh='$mahh'";
        $query2 = "delete from yeuthich where mahh='$mahh'";
        $query3 = "delete from binhluan1 where mahh='$mahh'";
        $db->exec($query1);
        $db->exec($query2);
        $db->exec($query3);
        $hh = new hanghoa();
        $result1 = $hh->getmasohd($mahh);
        while ($set1 = $result1->fetch()) {
            $masohd = $set1['masohd'];
            $item = array(
                'masohd' => $masohd,
            );
            $_SESSION['delete'][] = $item;
        }
    }
    function deletesanpham1($mahh)
    {
        if (isset($_SESSION['delete']) && !empty($_SESSION['delete'])) {
            foreach ($_SESSION['delete'] as $key => $item) {
                $masohd = $_SESSION['delete'][$key]["masohd"];
                $db = new connect();
                $query1 = "delete from cthoadon1 where masohd='$masohd'";
                $query4 = "delete from ctvoucher where masohd='$masohd'";
                $query5 = "delete from hoadon1 where masohd='$masohd'";
                $db->exec($query1);
                $db->exec($query4);
                $db->exec($query5);

            }
            unset($_SESSION['delete']);
        }
    }
    function deletesanpham($mahh)
    {
        $db = new connect();
        $query = "DELETE FROM hanghoa where mahh='$mahh'";
        $db->exec($query);
    }
    function updatesanpham($mahh,$tenhh, $dongia, $giamgia, $hinh, $Nhom, $soluotxem, $ngaylap, $mota)
    {
        $db = new connect();
        $query = "UPDATE  hanghoa SET tenhh='$tenhh'  where mahh='$mahh'";
        $query1 = "UPDATE  hanghoa SET  dongia='$dongia'  where mahh='$mahh'";
        $query2 = "UPDATE  hanghoa SET giamgia='$giamgia'  where mahh='$mahh'";
        $query3 = "UPDATE  hanghoa SET hinh='$hinh'  where mahh='$mahh'";
        $query4 = "UPDATE  hanghoa SET Nhom='$Nhom'  where mahh='$mahh'";
        $query5 = "UPDATE  hanghoa SET ngaylap='$ngaylap'  where mahh='$mahh'";
        $query6 = "UPDATE  hanghoa SET mota='$mota'  where mahh='$mahh'";
        $query7 = "UPDATE  hanghoa SET soluotxem='$soluotxem'  where mahh='$mahh'";
        $db->exec($query);
        $db->exec($query1);
        $db->exec($query2);
        $db->exec($query3);
        $db->exec($query4);
        $db->exec($query5);
        $db->exec($query6);
        $db->exec($query7);
    }
}

?>