<?php
class doimatkhau
{
    public function __construct()
    {
    }
    function doimatkhau($makh,$mkm)
    {
        $db = new connect();
        $query = "UPDATE  khachhang1 SET matkhau='$mkm'  where makh='$makh'";
        $db->exec($query);

    }
}

?>