<?php
$act = 'dangky';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'dangky':
        include "./View/registration.php";
        break;

    case 'inset_item':
        $a = new validate();
        $b = $a->checkRegister($_POST['txtpass']);
       
       if ($b == 1) {
            $tenkh = $_POST['txttenkh'];
            $diachi = $_POST['txtdiachi'];
            $sodt = $_POST['txtsodt'];
            $tendn = $_POST['txtusername'];
            $password = $_POST['txtpass'];
            $email = $_POST['txtemail'];
            $cdau = "GFR5%";
            $csau = "!2*GH";
            $cryt = md5($cdau . $password . $csau);
            $ur = new user();
            $test = $ur->exitUser($tendn);
            if ($test != false) {
                echo '<script>alert("Tai khoan da ton tai")</script>';
                include "./View/registration.php";
            } else {
                // $ur->InsertUser($tenkh, $tendn, $cryt, $email, $diachi, $sodt);
                if ($ur->InsertUser($tenkh, $tendn, $cryt, $email, $diachi, $sodt) != 'false') {
                    echo '<script>alert("Đăng ký thành công")</script>';
                    include "./View/login.php";
                } else {
                    echo '<script>alert("Đăng ký khong thành công")</script>';
                    include "./View/registration.php";
                }
            }

        } else {
            include "./View/registration.php";   
        }

        break;
}
?>