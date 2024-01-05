<?php
$act = 'home';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'home':
        include "./View/voucher.php";
        break;
    case 'delete':
        $masovoucher = $_GET['ma'];
        $v = new voucher();
        $v->deletevoucher($masovoucher);
        include "./View/voucher.php";
        break;
    case 'them':
        $a = new validate();
        $b = $a->checkvoucher();
        if ($b == 1) {
            $masovoucher = $_POST['masovoucher'];
            $tenvoucher = $_POST['tenvoucher'];
            $giamgia = $_POST['giamgia'];
            $conlai = $_POST['conlai'];
            $v = new voucher();
            $v->themvoucher($masovoucher, $tenvoucher, $giamgia, $conlai);
            include "./View/voucher.php";
            break;
        } else {
            include "./View/voucher.php";
            break;
        }
    case 'update':
        $a = new validate();
        $b = $a->checkvoucher();
        if ($b == 1) {
            $masovoucher = $_POST['masovoucher'];
            $tenvoucher = $_POST['tenvoucher'];
            $giamgia = $_POST['giamgia'];
            $conlai = $_POST['conlai'];
            $v = new voucher();
            $v->updatevoucher($masovoucher, $tenvoucher, $giamgia, $conlai);
            include "./View/voucher.php";
            break;
        } else {
            if ($_SESSION['tenvoucherErr'] != "") {
                echo ('<script> alert("' . $_SESSION['tenvoucherErr'] . '") </script>');
              }else  if ($_SESSION['giamgiavcErr'] != "") {
                echo ('<script> alert("' . $_SESSION['giamgiavcErr'] . '") </script>');
              }else   if ($_SESSION['conlaiErr'] != "") {
                echo ('<script> alert("' . $_SESSION['conlaiErr'] . '") </script>');
              }
            include "./View/voucher.php";
            break;
        }

}

?>