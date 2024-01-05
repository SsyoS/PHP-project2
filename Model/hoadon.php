<?php
class hoadon
{
    public function __construct()
    {
    }
    function updatehoadon($masohd, $makh, $ngaydat, $tongtien)
    {
        $db = new connect();
        $query = "UPDATE  hoadon1 SET makh='$makh'  where masohd='$masohd'";
        $query1 = "UPDATE  hoadon1 SET ngaydat='$ngaydat'  where masohd='$masohd'";
        $query2 = "UPDATE  hoadon1 SET tongtien='$tongtien'  where masohd='$masohd'";
        $db->exec($query);
        $db->exec($query1);
        $db->exec($query2);

    }
    function deletehoadon($masohd)
    {
        $db = new connect();
        $hh = new hanghoa();
        $result = $hh->getcthoadon($masohd);
        while ($set = $result->fetch()):
            $sohd = $set['masohd'];
            $query = "delete from cthoadon1 where masohd='$sohd'";
            $db->exec($query);
        endwhile;
        $query1 = "delete from ctvoucher where masohd='$masohd'";
        $db->exec($query1);
        $query2 = "delete from hoadon1 where masohd='$masohd'";
        $db->exec($query2);
    }
}

?>