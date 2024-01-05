<?php
class validate
{
    public function checkRegister($password)
    {
        $name = $email = $diachi = $phone = $tendn = $pass = $ten = $pas = "";
        $pass = $password;
        $_SESSION['nameErr'] = $_SESSION['emailErr'] = $_SESSION['diachiErr'] = $_SESSION['phoneErr'] = $_SESSION['passErr'] = $_SESSION['tenErr'] = $_SESSION['pasErr'] = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['txtdiachi'])) {
                $_SESSION['diachiErr'] = "hãy nhập địa chỉ !";
            } else {
                $diachi = $_POST['txtdiachi'];
                $_SESSION['diachiErr'] = "";
            }
            //kiểm tra name
            if (empty($_POST['txttenkh'])) {
                $_SESSION['nameErr'] = "hãy nhập tên !";
            } else { //mss12345
                $name = $_POST['txttenkh'];
                if (!preg_match("/[^0-9]$/", $name)) {
                    $_SESSION['nameErr'] = "tên phải là ký tự !";
                } else {
                    $_SESSION['nameErr'] = "";
                }

            }
            //kiểm tra email
            if (empty($_POST['txtemail'])) {
                $_SESSION['emailErr'] = "hãy nhập email !";
                $email = $_POST['txtemail'];
                if (!preg_match(" /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/", $email)) {
                    $_SESSION['emailErr'] = "định dạng email không hợp lệ";
                } else {
                    $_SESSION['emailErr'] = "";
                }

            } else { //mss12345
                $email = $_POST['txtemail'];
                $_SESSION['emailErr'] = "";
            }
            // kiểm tra số đt
            if (empty($_POST['txtsodt'])) {
                $_SESSION['phoneErr'] = "hãy nhập số điện thoại !";
            } else { //mss12345
                $phone = $_POST['txtsodt'];
                if (!preg_match("/^[0]{1}\d{9,10}$/", $phone)) {
                    $_SESSION['phoneErr'] = "Phone phải có số 0 và từ 10-11 số";
                } else {
                    $_SESSION['phoneErr'] = "";
                }
            }
            //kiểm tra pass;Tqwety4$
            if (empty($_POST['txtpass'])) {
                $_SESSION['passErr'] = "Pass không được rỗng !";
            } else { //mss12345
                $pass = $_POST['txtpass'];
                if (!preg_match(" /^.{5,15}$/", $pass)) {
                    $_SESSION['passErr'] = "pass phải từ 5 ký tự chở lên";
                } else {
                    $_SESSION['passErr'] == "";
                }

            }
            if (empty($_POST['retypepassword'])) {
                $_SESSION['pasErr'] = "hãy nhập mật khẩu !";
            } else { //mss12345
                $pas = $_POST['retypepassword'];
                if ($_POST['txtpass'] != $_POST['retypepassword']) {
                    $_SESSION['pasErr'] = "Pass không trùng khớp";
                } else {
                    $_SESSION['pasErr'] = "";
                }
            }
            if (empty($_POST['txtusername'])) {
                $_SESSION['tendErr'] = "hãy nhập tên !";
            } else { //mss12345
                $ten = $_POST['txtusername'];
                $_SESSION['tenErr'] = "";
            }
        }

        if ($_SESSION['nameErr'] == "" && $_SESSION['emailErr'] == "" && $_SESSION['diachiErr'] == "" && $_SESSION['phoneErr'] == "" && $_SESSION['passErr'] == "" && $_SESSION['pasErr'] == "" && $_SESSION['tenErr'] == "") {
            return 1;
        }
    }
    public function checkloai()
    {
        $_SESSION['loaiErr'] = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($_POST['tenloai'])) {
                $_SESSION['loaiErr'] = "tên loại không được rỗng !";
            } else { //mss12345
                $maloai = $_POST['tenloai'];
                $hh = new hanghoa();
                $result = $hh->getnhom();
                while ($set = $result->fetch()) {
                    if ($set['tenloai'] == $maloai && $set['maloai'] != $_GET['ma']) {
                        $_SESSION['loaiErr'] = "tên loại đã tồn tại";
                    }
                }
                if (!preg_match(" /^.{3,15}$/", $maloai)) {
                    $_SESSION['loaiErr'] = "tên loại phải từ 3 ký tự chở lên";
                } else {
                    $_SESSION['loaiErr'] == "";
                }
            }

            if ($_SESSION['loaiErr'] == "") {
                return 1;
            }
        }
    }
    public function checkdoimatkhau()
    {
        $_SESSION['mkmErr'] = $_SESSION['mkcErr'] = $_SESSION['mklErr'] = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['mkm'])) {
                $_SESSION['mkmErr'] = "mật khẩu không được rỗng !";
            } else {
                $mkm = $_POST['mkm'];
                if (!preg_match(" /^.{5,15}$/", $mkm)) {
                    $_SESSION['mkmErr'] = "mật khẩu phải từ 5 ký tự chở lên";
                } else {
                    $_SESSION['mkmErr'] == "";
                }
            }
            if (empty($_POST['mkl'])) {
                $_SESSION['mklErr'] = "hãy nhập mật khẩu !";
            } else { //mss12345
                $mkl = $_POST['mkl'];
                if ($mkl != $_POST['mkm']) {
                    $_SESSION['mklErr'] = "Pass không trùng khớp";
                } else {
                    $_SESSION['mklErr'] = "";
                }
            }
            if (empty($_POST['mkc'])) {
                $_SESSION['mkcErr'] = "hãy nhập mật khẩu !";
            } else { //mss12345
                $mkc = $_POST['mkc'];
                $cdau = "GFR5%";
                $csau = "!2*GH";
                $pass = md5($cdau . $mkc . $csau);
                if ($pass != $_POST['mkc1']) {
                    $_SESSION['mkcErr'] = " Pass không đúng";
                } else {
                    $_SESSION['mkcErr'] = "";
                }
            }
            if ($_SESSION['mkmErr'] == "" && $_SESSION['mklErr'] == "" && $_SESSION['mkcErr'] == "") {
                return 1;
            }
        }
    }
    public function checksanpham()
    {
        $_SESSION['tenhhErr'] = $_SESSION['dongiaErr'] = $_SESSION['giamgiaErr'] = $_SESSION['motaErr'] = $_SESSION['hinhErr'] =   "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($_POST['tenhh'])) {
                $_SESSION['tenhhErr'] = "tên hàng hóa không được rỗng !";
            } else {
                $tenhh = $_POST['tenhh'];
                $hh = new hanghoa();
                $result = $hh->getsanpham();
                while ($set = $result->fetch()) {
                    if ($set['tenhh'] == $tenhh) {
                        $_SESSION['tenhhErr'] = "tên hàng hóa đã tồn tại";
                    }
                }
                if (!preg_match(" /^.{3,15}$/", $tenhh)) {
                    $_SESSION['tenhhErr'] = "tên hàng hóa phải từ 3 ký tự chở lên";
                } else {
                    $_SESSION['tenhhErr'] == "";
                }
            } 
            if (empty($_POST['dongia'])) {
                $_SESSION['dongiaErr'] = "đơn giá không được rỗng !";
            } else {
                $dongia = $_POST['dongia'];
                if ($dongia < 0) {
                    $_SESSION['dongiaErr'] = "đơn giá không thể là số âm";
                } else if (!preg_match("/\d{4,10}$/", $dongia)) {
                    $_SESSION['dongiaErr'] = "đơn giá không hợp lệ ít nhất là 1000đ";
                } else {
                    $_SESSION['dongiaErr'] == "";
                }
            }
            if ($_POST['giamgia'] == null) {
                $_SESSION['giamgiaErr'] = "giảm giá ít nhất phải bằng 0đ !";
            } else {
                if ($_POST['giamgia'] < 0) {
                    $_SESSION['giamgiaErr'] = "giảm giá không thể là số âm";
                } else {
                    $_SESSION['giamgiaErr'] == "";
                }
            }
            if (empty($_POST['mota'])) {
                $_SESSION['motaErr'] = " mô tả không được rỗng !";
            } else {
                $mota = $_POST['mota'];
                if (!preg_match(" /^.{10,200}$/", $mota)) {
                    $_SESSION['motaErr'] = "mô tả phải có ít nhất 10 chữ cái trở lên ";
                } else {
                    $_SESSION['motaErr'] == "";
                }
            }
            if ($_FILES['image']['name'] == "") {
                $_SESSION['hinhErr'] = "chưa chọn hình  !";
            } else {
                $_SESSION['hinhErr'] == "";
            }
            if ($_SESSION['tenhhErr'] == "" && $_SESSION['dongiaErr'] == "" && $_SESSION['giamgiaErr'] == "" && $_SESSION['motaErr'] == "" && $_SESSION['hinhErr'] == "" ) {
                return 1;
            }
        }
    }
    public function checksanphamcatnhat()
    {
        $_SESSION['tenhhErr'] = $_SESSION['dongiaErr'] = $_SESSION['giamgiaErr'] = $_SESSION['motaErr']  = $_SESSION['soluotxemErr'] =  $_SESSION['ngaylapErr']  = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($_POST['tenhh'])) {
                $_SESSION['tenhhErr'] = "tên hàng hóa không được rỗng !";
            } else {
                $tenhh = $_POST['tenhh'];
                $hh = new hanghoa();
                $result = $hh->getsanpham();
                while ($set = $result->fetch()) {
                    if ($set['tenhh'] == $tenhh && $set['mahh'] != $_GET['ma']) {
                        $_SESSION['tenhhErr'] = "tên hàng hóa đã tồn tại";
                    }
                }
                if (!preg_match(" /^.{3,15}$/", $tenhh)) {
                    $_SESSION['tenhhErr'] = "tên hàng hóa phải từ 3 ký tự chở lên";
                } else {
                    $_SESSION['tenhhErr'] == "";
                }
            }
            if (empty($_POST['ngaylap'])) {
                $_SESSION['ngaylapErr'] = "ngày lặp không được rỗng !";
            } else {
                $ngaylap = $_POST['ngaylap'];              
                if (!preg_match("/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$/", $ngaylap)) {
                    $_SESSION['ngaylapErr']  = "không đúng định dạng ngày tháng (YYYY-MM-DD)";
                } else {
                    $_SESSION['ngaylapErr']  == "";
                }
            }
            if (empty($_POST['dongia'])) {
                $_SESSION['dongiaErr'] = "đơn giá không được rỗng !";
            } else {
                $dongia = $_POST['dongia'];
                if ($dongia < 0) {
                    $_SESSION['dongiaErr'] = "đơn giá không thể là số âm";
                } else if (!preg_match("/\d{4,10}$/", $dongia)) {
                    $_SESSION['dongiaErr'] = "đơn giá không hợp lệ ít nhất là 1000đ";
                } else {
                    $_SESSION['dongiaErr'] == "";
                }
            }
            if ($_POST['giamgia'] == null) {
                $_SESSION['giamgiaErr'] = "giảm giá ít nhất phải bằng 0đ !";
            } else {
                if ($_POST['giamgia'] < 0) {
                    $_SESSION['giamgiaErr'] = "giảm giá không thể là số âm";
                } else {
                    $_SESSION['giamgiaErr'] == "";
                }
            }
            if (empty($_POST['mota'])) {
                $_SESSION['motaErr'] = " mô tả không được rỗng !";
            } else {
                $mota = $_POST['mota'];
                if (!preg_match(" /^.{10,200}$/", $mota)) {
                    $_SESSION['motaErr'] = "mô tả phải có ít nhất 10 chữ cái trở lên ";
                } else {
                    $_SESSION['motaErr'] == "";
                }
            }
            if (empty($_POST['soluotxem'])) {
                $_SESSION['soluotxemErr'] = "số lượt xem ít nhất phải bằng 0 !";
            } else {
                $soluotxem = $_POST['soluotxem'];
                if (!preg_match("/\d{1,10}$/", $soluotxem)) {
                    $_SESSION['soluotxemErr'] = "số lượt xem không hợp lệ ";
                } else {
                    $_SESSION['soluotxemErr'] == "";
                }
            }
            if ($_SESSION['tenhhErr'] == "" && $_SESSION['dongiaErr'] == "" && $_SESSION['giamgiaErr'] == "" && $_SESSION['motaErr'] == "" && $_SESSION['soluotxemErr'] == "" && $_SESSION['ngaylapErr']  =="") {
                return 1;
            }
        }
    }
    public function checkvoucher()
    {
        $_SESSION['tenvoucherErr'] = $_SESSION['giamgiavcErr'] = $_SESSION['conlaiErr'] = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($_POST['tenvoucher'])) {
                $_SESSION['tenvoucherErr'] = "tên voucher không được rỗng !";
            } else {
                $tenvoucher = $_POST['tenvoucher'];
                $hh = new hanghoa();
                $result = $hh->getvoucher();
                while ($set = $result->fetch()) {
                    if ($set['tenvoucher'] == $tenvoucher && $set['masovoucher'] != $_GET['ma']) {
                        $_SESSION['tenvoucherErr'] = "tên voucher đã tồn tại";
                    }
                }
                if (!preg_match(" /^.{3,50}$/", $tenvoucher)) {
                    $_SESSION['tenvoucherErr'] = "tên voucher phải từ 3 ký tự chở lên";
                } else {
                    $_SESSION['tenvoucherErr'] == "";
                }
            }
            if (empty($_POST['giamgia'])) {
                $_SESSION['giamgiavcErr'] = "giảm giá ít nhất là 1000đ !";
            } else {
                $giamgia = $_POST['giamgia'];
                if ($giamgia < 0) {
                    $_SESSION['giamgiavcErr'] = "giam gia phải lớn hơn 0 ";
                } else if (!preg_match("/\d{4,10}$/", $giamgia)) {
                    $_SESSION['giamgiavcErr'] = "giam gia ít nhất là 1000đ ";
                } else {
                    $_SESSION['giamgiavcErr'] == "";
                }
            }
            if (empty($_POST['conlai'])) {
                $_SESSION['conlaiErr'] = "số lượng voucher không được rỗng !";
            } else {
                $dongia = $_POST['conlai'];
                if ($dongia < 0) {
                    $_SESSION['conlaiErr'] = "đơn giá phải lớn hơn 0 ";
                } else if (!preg_match("/\d{1,10}$/", $dongia)) {
                    $_SESSION['conlaiErr'] = "số lượng voucher không hợp lệ ít nhất là 1";
                } else {
                    $_SESSION['conlaiErr'] == "";
                }
            }
            if ($_SESSION['tenvoucherErr'] == "" && $_SESSION['giamgiavcErr'] == "" && $_SESSION['conlaiErr'] == "") {
                return 1;
            }
        }
    }
    public function checkkhachhang()
    {
        $_SESSION['tenkhErr'] = $_SESSION['emailkhErr'] = $_SESSION['diachikhErr'] = $_SESSION['phonekhErr'] = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($_POST['tenkh'])) {
                $_SESSION['tenkhErr'] = "tên khách hàng không được rỗng !";
            } else {
                $tenkh = $_POST['tenkh'];
                if (!preg_match("/[^0-9]$/", $tenkh)) {
                    $_SESSION['tenkhErr'] = "tên khách hàng phải là ký tự !";
                } else {
                    $_SESSION['tenkhErr'] == "";
                }
            }
            if (empty($_POST['email'])) {
                $_SESSION['emailkhErr'] = "email không được rỗng !";
            } else {
                $_SESSION['emailkhErr'] == "";
            }
            if (empty($_POST['diachi'])) {
                $_SESSION['diachikhErr'] = "tên hàng hóa không được rỗng !";
            } else {
                $tenhh = $_POST['diachi'];

                if (!preg_match(" /^.{3,50}$/", $tenhh)) {
                    $_SESSION['diachikhErr'] = "địa chỉ hải từ 3 ký tự chở lên";
                } else {
                    $_SESSION['diachikhErr'] == "";
                }
            }
            if (empty($_POST['sodienthoai'])) {
                $_SESSION['phonekhErr'] = "hãy nhập số điện thoại !";
            } else {
                $phone1 = $_POST['sodienthoai'];
                if (!preg_match("/^[0]{1}\d{9,10}$/", $phone1)) {
                    $_SESSION['phonekhErr'] = "Phone phải có số 0 và từ 10-11 số";
                } else {
                    $_SESSION['phonekhErr'] == "";
                }
            }

            if ($_SESSION['tenkhErr'] == "" && $_SESSION['emailkhErr'] == "" && $_SESSION['diachikhErr'] == "" && $_SESSION['phonekhErr'] == "") {
                return 1;
            }
        }
    }
    public function checkhoso()
    {
        $_SESSION['tenhsErr'] = $_SESSION['emailhsErr'] = $_SESSION['diachihsErr'] = $_SESSION['phonehsErr'] = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($_POST['tenkh'])) {
                $_SESSION['tenhsErr'] = "tên khách hàng không được rỗng !";
            } else {
                $tenkh1 = $_POST['tenkh'];
                if (!preg_match("/[^0-9]$/", $tenkh1)) {
                    $_SESSION['tenhsErr'] = "tên khách hàng phải là ký tự !";
                } else {
                    $_SESSION['tenhsErr'] == "";
                }
            }
            if (empty($_POST['email'])) {
                $_SESSION['emailhsErr'] = "email không được rỗng !";
            } else {
                $_SESSION['emailhsErr'] == "";
            }
            if (empty($_POST['dc'])) {
                $_SESSION['diachihsErr'] = "tên địa chỉ không được rỗng !";
            } else {
                $dc = $_POST['dc'];

                if (!preg_match(" /^.{3,50}$/", $dc)) {
                    $_SESSION['diachihsErr'] = "địa chỉ hải từ 3 ký tự chở lên";
                } else {
                    $_SESSION['diachihsErr'] == "";
                }
            }
            if (empty($_POST['sdt'])) {
                $_SESSION['phonehsErr'] = "hãy nhập số điện thoại !";
            } else {
                $phone2 = $_POST['sdt'];
                if (!preg_match("/^[0]{1}\d{9,10}$/", $phone2)) {
                    $_SESSION['phonehsErr'] = "Phone phải có số 0 và từ 10-11 số";
                } else {
                    $_SESSION['phonehsErr'] == "";
                }
            }

            if ($_SESSION['tenhsErr'] == "" && $_SESSION['emailhsErr'] == "" && $_SESSION['diachihsErr'] == "" && $_SESSION['phonehsErr'] == "") {
                return 1;
            }
        }
    }
    public function checkhoadon()
    {
        $_SESSION['soluongmuaErr'] =    $_SESSION['ngaydatErr'] = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($_POST['soluongmua'])) {
                $_SESSION['soluongmuaErr'] = "số lượng mua không được rỗng !";
            } else if ($_POST['soluongmua'] <= 0) { {
                    $_SESSION['soluongmuaErr'] = "số lượng mua phải lớn hơn 0 !";
                }
            } else {
                $_SESSION['soluongmuaErr'] == "";
            }
            if (empty($_POST['ngaydat'])) {
                $_SESSION['ngaydatErr'] = "ngày lặp không được rỗng !";
            } else {
                $ngaydat = $_POST['ngaydat'];              
                if (!preg_match("/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$/", $ngaydat)) {
                    $_SESSION['ngaydatErr']  = "không đúng định dạng ngày tháng (YYYY-MM-DD)";
                } else {
                    $_SESSION['ngaydatErr']  == "";
                }
            }
            if ($_SESSION['soluongmuaErr'] == "" &&   $_SESSION['ngaydatErr'] =="") {
                return 1;
            }
            
        }

    }
    public function checksize()
    {
        $_SESSION['sizeErr'] = $_SESSION['banggiaErr'] = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($_POST['tensize'])) {
                $_SESSION['sizeErr'] = "tên size không được rỗng !";
            } else {
                $tensize = $_POST['tensize'];
                $hh = new hanghoa();
                $result = $hh->getSize();
                while ($set = $result->fetch()) {
                    if ($set['Size'] == $tensize && $set['maSize'] != $_GET['ma']) {
                        $_SESSION['sizeErr'] = "tên size đã tồn tại";
                    }
                }
                if (!preg_match("/[^0-9]$/", $tensize)) {
                    $_SESSION['sizeErr'] = "tên size phải là ký tự !";
                } else {
                    $_SESSION['sizeErr'] == "";
                }
            }
            if (empty($_POST['dongia'])) {
                $_SESSION['banggiaErr'] = "bảng giá không được rỗng !";
            } else {
                $bangia = $_POST['dongia'];
                if ($bangia < 0) {
                    $_SESSION['banggiaErr'] = "bảng giá phải lớn hơn 0 !";
                } else if (!preg_match("/\d{3,12}$/", $bangia)) {
                    $_SESSION['banggiaErr'] = "bảng giá phải từ 3 số 0 trở lên !";
                } else {
                    $_SESSION['banggiaErr'] == "";
                }
            }

            if ($_SESSION['sizeErr'] == "" && $_SESSION['banggiaErr'] == "") {
                return 1;
            }
        }
    }
}