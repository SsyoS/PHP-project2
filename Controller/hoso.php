<?php
$act = 'home';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'home':
        include "./View/hoso.php";
        break;
    case 'update':
    $v = new validate();
    $b = $v->checkhoso();
    if ($b == 1) {
     $makh = $_POST['makh'];
     $tenkh = $_POST['tenkh'];
     $email = $_POST['email'];
     $diachi = $_POST['dc'];
     $sodienthoai = $_POST['sdt'];
        $hs = new hoso();
        $hs->updatehoso($makh, $tenkh, $email, $diachi, $sodienthoai);
        include "./View/hoso.php";
        break;
    }else {
        include "./View/hoso.php";
        break;
      }

}

?>