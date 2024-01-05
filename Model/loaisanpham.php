<?php
class loaisanpham
{

    function Insertloai($tenloai)
    {
        $db = new connect();
        $query = "insert into loai(maloai,tenloai)
    values(null,'$tenloai')";
        $db->exec($query);
    }
    function deleteloai($maloai)
    {
        $hh = new hanghoa();
        $mahh = 0;
        $masohd = 0;
        $result = $hh->getHangHoa1($maloai);

        while ($set = $result->fetch()) {
            $mahh = $set['mahh'];
            // echo ($mahh);
            $result1 = $hh->getmasohd($mahh);
            $db = new connect();
            $query1 = "delete from cthoadon1 where mahh='$mahh'";
            $query2 = "delete from yeuthich where mahh='$mahh'";
            $query3 = "delete from binhluan1 where mahh='$mahh'";
            $db->exec($query1);
            $db->exec($query2);
            $db->exec($query3);
            while ($set1 = $result1->fetch()) {
                $masohd = $set1['masohd'];
                $item = array(
                    'masohd' => $masohd,
                );
                $_SESSION['delete'][] = $item;
            }
        }
    }
    function deleteloai1($maloai)
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
    function deleteloai2($maloai)
    {
        $db = new connect();
        $query6 = "delete from hanghoa where Nhom='$maloai'";
        $db->exec($query6);
       
    }
    function deleteloai3($maloai)
    {
        $db = new connect();
        $query7 = "delete from loai where maloai='$maloai'";
        $db->exec($query7);
        unset($_SESSION['delete']);
    }
    function upadteloai($maloaimoi, $tenloai, $maloaicu)
    {
        $db = new connect();
        $query = "UPDATE loai SET tenloai='$tenloai' where maloai=$maloaicu";
        $query1 = "UPDATE loai SET maloai='$maloaimoi' where maloai=$maloaicu";
        $db->exec($query);
        $db->exec($query1);
    }


}
?>