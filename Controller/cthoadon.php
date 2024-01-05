<?php

$act = 'home';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'home':
        include "./view/cthoadon.php";
        break;
    case 'delete':
        $masohd = $_GET['ma'];
        $mahh = $_GET['mahh'];
        $cthd = new cthoadon();
        $cthd->deletecthoadon($masohd, $mahh);
        include "./view/cthoadon.php";
        break;
    case 'update':
        $a = new validate();
        $b = $a->checkhoadon();
        if ($b == 1) {
            $masohd = $_GET['ma'];
            $mahh = $_GET['mahh'];
            $soluongmua = $_POST['soluongmua'];
            $size = $_POST['size'];
            $hh = new hanghoa();
            $result = $hh->getgiasize($mahh, $size);
            while ($set = $result->fetch()) {
                $gia = $set['gia'];
            }
            $result = $hh->getSize3($size);
            while ($set = $result->fetch()) {
                $dongia = $set['dongia'];
                ;
            }
            $thanhtien = ($gia + $dongia) * $soluongmua;
            $cthd = new cthoadon();
            $cthd->updatecthoadon($masohd, $mahh, $soluongmua, $size, $thanhtien);
            $hh = new hanghoa();
            $db = new connect();
            $gia = $hh->gettien($masohd);
            $query3 = "UPDATE  hoadon1 SET tongtien ='$gia'  where masohd='$masohd' ";
            $db->exec($query3);
            include "./view/cthoadon.php";
            break;
        } else {
            if ($_SESSION['soluongmuaErr'] != "") {
                echo ('<script> alert("' . $_SESSION['soluongmuaErr'] . '") </script>');
              }
            include "./view/cthoadon.php";
            break;
        }
}

?>