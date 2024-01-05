<?php
class hoso
{
    public function __construct()
    {
    }
    function updatehoso($makh, $tenkh, $email, $diachi, $sodienthoai)
    {
        $db = new connect();
        $query = "UPDATE  khachhang1 SET tenkh='$tenkh'  where makh='$makh'";

        $query3 = "UPDATE  khachhang1 SET email='$email'  where makh='$makh'";
        $query4 = "UPDATE  khachhang1 SET diachi='$diachi'  where makh='$makh'";
        $query5 = "UPDATE  khachhang1 SET sodienthoai='$sodienthoai'  where makh='$makh'";
        $db->exec($query);

        $db->exec($query3);
        $db->exec($query4);
        $db->exec($query5);

    }
}

?>