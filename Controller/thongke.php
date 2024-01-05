<?php
$act = 'thongke';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'thongke':
        include "./View/thongke.php";
        break;
    case 'thongke1':
        include "./View/thongke1.php";
        break;
    case 'thongke2':
        include "./View/thongke2.php";
        break;
    case 'thongke3':
        include "./View/thongke3.php";
        break;

}

?>