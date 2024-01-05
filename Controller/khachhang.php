<?php
$act = 'home';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'home':
        include "./View/khachhang.php";
        break;
    case 'update':
        $a = new validate();
        $b = $a->checkkhachhang();
        if ($b == 1) {
            $makh = $_POST['makh'];
            $tenkh = $_POST['tenkh'];
            $username = $_POST['username'];
            $matkhau = $_POST['matkhau'];
            $email = $_POST['email'];
            $diachi = $_POST['diachi'];
            $sodienthoai = $_POST['sodienthoai'];
            $vaitro = $_POST['vaitro'];
            $kh = new khachhang();
            $kh->updatekhachhang($makh, $tenkh, $username, $matkhau, $email, $diachi, $sodienthoai, $vaitro);
            include "./View/khachhang.php";
            break;
        } else {
            if ($_SESSION['tenkhErr'] != "") {
                echo ('<script> alert("' . $_SESSION['tenkhErr'] . '") </script>');
            } else if ($_SESSION['emailkhErr'] != "") {
                echo ('<script> alert("' . $_SESSION['emailkhErr'] . '") </script>');
            } else if ($_SESSION['diachikhErr'] != "") {
                echo ('<script> alert("' . $_SESSION['diachikhErr'] . '") </script>');
            } else if ($_SESSION['phonekhErr'] != "") {
                echo ('<script> alert("' . $_SESSION['phonekhErr'] . '") </script>');
            }
            include "./View/khachhang.php";
            break;
        }
    case 'delete':
        $makh = $_GET['ma'];
        $kh = new khachhang();
        $kh->deletekhachhang($makh);
        include "./View/khachhang.php";
        break;

}

?>