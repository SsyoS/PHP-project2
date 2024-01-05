<?php
$_SESSION['phivanchuyen']=30000;
if (!isset($_SESSION['giohang'])) {
    $_SESSION['giohang'] = array();
}
$act = "giohang";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'giohang':
        if (isset($_POST['mahh'])) {
            $mahh = $_POST['mahh'];
            $soluong = $_POST['soluong'];
            $size = $_POST['SIZE'];
            $gh = new giohang();        
            $gh->add_items($mahh, $soluong, $size);
        }
        include "./View/sanpham.php";
        break;

    case 'delete_item':
        if (isset($_GET['id'])) {
            $indexs = $_GET['id'];
            $gh = new giohang();
            $gh->delete_items($indexs);
        }
        include "./View/sanpham.php";
        break;
    case 'update_item':
        if (isset($_POST['newqty'])) {
            $new_list = $_POST['newqty'];
            foreach ($new_list as $vitri => $qty) {
                if ($_SESSION['giohang'][$vitri]['quanty'] != $qty) {
                    $gh = new giohang();
                    $gh->update_items($vitri, $qty);
                }
            }
        }
        include "./View/sanpham.php";
        break;
}
