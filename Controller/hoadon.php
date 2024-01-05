<?php

$act = 'home';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'home':
        include "./view/hoadon.php";
        break;
    case 'delete':
        $masohd = $_GET['ma'];
        $hd = new hoadon();
        $hd->deletehoadon($masohd);
        include "./view/hoadon.php";
        break;
    case 'update':
        $masohd = $_GET['ma'];
        $makh = $_POST['makh'];
        $ngaydat = $_POST['ngaydat'];
        $tongtien = $_POST['tongtien'];
        $hd = new hoadon();
        $hd->updatehoadon($masohd, $makh, $ngaydat, $tongtien);
        include "./view/hoadon.php";
        break;
      
}

?>