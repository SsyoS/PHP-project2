<?php
class khachhang
{
    public function __construct()
    {
    }
    function updatekhachhang($makh, $tenkh, $username, $matkhau,$email,$diachi,$sodienthoai,$vaitro)
    {
        $db = new connect();
        $query = "UPDATE  khachhang1 SET tenkh='$tenkh'  where makh='$makh'";
        $query1 = "UPDATE  khachhang1 SET username='$username'  where makh='$makh'";
        $query2 = "UPDATE  khachhang1 SET  matkhau='$matkhau'  where makh='$makh'";
        $query3 = "UPDATE  khachhang1 SET email=' $email'  where makh='$makh'";
        $query4 = "UPDATE  khachhang1 SET  diachi='$diachi'  where makh='$makh'";
        $query5 = "UPDATE  khachhang1 SET sodienthoai='$sodienthoai'  where makh='$makh'";
        $query6 = "UPDATE  khachhang1 SET  vaitro='$vaitro'  where makh='$makh'";
        $db->exec($query);
        $db->exec($query1);
        $db->exec($query2);
        $db->exec($query3);
        $db->exec($query4);
        $db->exec($query5);
        $db->exec($query6);
    }
    function deletekhachhang($makh)
    {
        $db = new connect();
        $hh = new hanghoa();
        $result = $hh->getbinhluan1($makh);
        while ($set = $result->fetch()):
            $sokh = $set['makh'];
            $query = "delete from binhluan1 where makh='$sokh'";
            $db->exec($query);
        endwhile;
        $result1 = $hh->getctvoucher1($makh);
        while ($set = $result1->fetch()):
            $sovc = $set['makh'];
            $query = "delete from ctvoucher where makh='$sovc'";
            $db->exec($query);
        endwhile;
        $result2 = $hh->getyt1($makh);
        while ($set = $result2->fetch()):
            $soyt = $set['makh'];
            $query = "delete from yeuthich where makh='$soyt'";
            $db->exec($query);
        endwhile;
        $result3 = $hh->gethd1($makh);
        while ($set = $result3->fetch()):
            $sohd = $set['masohd'];
            $query = "delete from cthoadon1 where masohd='$sohd'";
            $db->exec($query);
        endwhile;
        $query = "delete from hoadon1 where makh='$makh'";
        $db->exec($query);
        $query1 = "delete from khachhang1 where makh='$makh'";
        $db->exec($query1);
    }
}

?>