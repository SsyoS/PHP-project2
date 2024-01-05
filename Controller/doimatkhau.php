<?php
$act = 'home';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'home':
        include "./View/doimatkhau.php";
        break;
    case 'update':  
        $a = new validate();
        $b = $a->checkdoimatkhau();
       if ($b == 1) {    
        $makh = $_POST['makh'];
        $mkc = $_POST['mkc'];
        $mkm = $_POST['mkm'];
        $mkl = $_POST['mkl'];
        $cdau = "GFR5%";
        $csau = "!2*GH";
        $pass = md5($cdau . $mkm . $csau);
        $dmk = new doimatkhau();
        $dmk ->doimatkhau($makh,$pass);
        echo '<script>alert("đổi mật khẩu thành công")</script>';
        include "./View/hoso.php";
        break;
    } else {
        include "./View/doimatkhau.php";
        break;
    }

}

?>