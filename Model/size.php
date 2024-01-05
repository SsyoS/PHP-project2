<?php
class size
{

    function add($maSize, $Size, $dongia)
    {
        $db = new connect();
        $query = "insert into size(maSize,Size,dongia)
        values(null,'$Size',$dongia)";
        $db->exec($query);
    }

    function updatesize($maSize, $Size, $dongia)
    {
        $db = new connect();
        $query = "UPDATE  size SET Size='$Size'  where maSize='$maSize'";
        $query1 = "UPDATE  size SET dongia='$dongia'  where maSize='$maSize'";
        $db->exec($query);
        $db->exec($query1);
    }
    function deletesize($masize)
    {
        $db = new connect();
         $hh = new hanghoa();
        $size = $hh->getSize2($masize);
        $result = $hh->getcthd1($size);
        while ($set = $result->fetch()):
            $masohd= $set['masohd'];       
            $query1 = "delete from cthoadon1 where masohd='$masohd'";  
            $query = "delete from hoadon1 where masohd='$masohd'";
            $db->exec($query1);
            $db->exec($query);
        endwhile;
        $query2 = "delete from size where maSize='$masize'";
        $db->exec($query2);
    }
}
?>