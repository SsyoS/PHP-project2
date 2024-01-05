<?php
   
$act = 'dangnhap';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) { 
    case 'dangnhap':
        include "./View/login.php";
        break;

    case 'dangnhap_action':
        if (isset($_POST['txtusername']) && isset($_POST['txtpassword'])) {
            $user = $_POST['txtusername'];
            $cdau = "GFR5%";
            $csau = "!2*GH";
            $pass = md5($cdau . $_POST['txtpassword'] . $csau);
            $ur = new user();
            $urs = $ur->loginUser($user, $pass);
            if ($urs != false) {
                //dang nhap
                $_SESSION['makh'] = $urs['makh'];
                $_SESSION['tenkh'] = $urs['tenkh'];
                $_SESSION['username'] = $urs['username'];
                echo '<meta http-equiv="refresh" content="0; url=./index.php?action=home" />';
            } else {
                //dang nhap khong thanh cong
                echo '<script>alert("sai tên đâng nhập hoặc mật khẩu")</script>';
                include "./View/login.php";
            }
        }
        break;
        case 'logout':     
            unset($_SESSION['makh']);
            unset($_SESSION['tenkh']);
            unset($_SESSION['username']);
            unset($_SESSION['giohang']);
            echo '<meta http-equiv="refresh" content="0; url=./index.php?action=home" />';
            break;
         case 'chuadangnhap':
            echo '<script>alert("bạn chưa đăng nhập, vui lòng đăng nhập để sử dụng các tính năng như mua hàng , bình luận , thêm vào giỏ hàng yêu thích,...")</script>';
                include "./View/login.php";
                break;
          
  
}
?>