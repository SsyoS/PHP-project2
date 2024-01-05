<?php

$act = 'home';
if (isset($_GET['act'])) {
  $act = $_GET['act'];
}
switch ($act) {
  case 'home':
    include "./View/hanghoa.php";
    break;
  case 'add':
    $a = new validate();
    $b = $a->checksanpham();
    if ($b == 1) {
      $mahh = $_POST['mahh'];
      $tenhh = $_POST['tenhh'];
      $dongia = $_POST['dongia'];
      $giamgia = $_POST['giamgia'];
      $image = $_FILES['image']['name'];
      $maloai = $_POST['maloai'];
      $soluotxem = 0;
      $date = getdate();
      $ngaylap = $date['year'] . "-" . $date['mon'] . "-" . $date['mday'];
      $mota = $_POST['mota'];
      $qlsp = new qlsp();
      $qlsp->Insertsanpham($tenhh, $dongia, $giamgia, $image, $maloai, $soluotxem, $ngaylap, $mota);
      uploadimage();
      include "./View/hanghoa.php";
      break;
    } else {
      include "./View/hanghoa.php";
      break;
    }
  case 'delete':
    $mahh = $_GET['ma'];
    $qlsp = new qlsp();
    $qlsp->deletesanpham0($mahh);
    $qlsp->deletesanpham1($mahh);
    $qlsp->deletesanpham($mahh);
    include "./View/hanghoa.php";
    break;
  case 'add1':
    if (isset($_POST['submit_file_sanpham'])) {
      $file = $_FILES['file_sanpham']['tmp_name'];
      file_put_contents($file, str_replace("\xBB\xEF\xBF", "", file_get_contents($file)));
      $file_open = fopen($file, "r");
      while (($csv = fgetcsv($file_open, 1000, ",")) !== false) {
        $mahh = $csv[0];
        $tenhh = $csv[1];
        $dongia = $csv[2];
        $giamgia = $csv[3];
        $hinh = $csv[4];
        $Nhom = $csv[5];
        $soluotxem = $csv[6];
        $ngaylap = $csv[7];
        $mota = $csv[8];
        $db = new connect();
        $query = "insert into hanghoa(mahh,tenhh,dongia,giamgia,hinh,Nhom,soluotxem,ngaylap,mota)
          values($mahh,'$tenhh',$dongia,$giamgia,'$hinh',$Nhom,$soluotxem,'$ngaylap','$mota')";
        $db->exec($query);
      }
      echo ('<script> alert(" import thanh cong") </script>');

    }
    include "./View/hanghoa.php";
    break;
  case 'update':
    $a = new validate();
    $b = $a->checksanphamcatnhat();
    if ($b == 1) {
      $mahh = $_GET['ma'];
      $mahh = $_POST['mahh'];
      $tenhh = $_POST['tenhh'];
      $dongia = $_POST['dongia'];
      $giamgia = $_POST['giamgia'];
      if ($_FILES['image']['name'] != "") {
        $image = $_FILES['image']['name'];
      } else {
        $image = $_POST['imageanh'];
      }
      $maloai = $_POST['maloai'];
      $soluotxem = $_POST['soluotxem'];
      $ngaylap = $_POST['ngaylap'];
      $mota = $_POST['mota'];
      $qlsp = new qlsp();
      $qlsp->updatesanpham($mahh, $tenhh, $dongia, $giamgia, $image, $maloai, $soluotxem, $ngaylap, $mota);
      uploadimage();
      include "./View/hanghoa.php";
      break;
    } else {
      if ($_SESSION['tenhhErr'] != "") {
        echo ('<script> alert("' . $_SESSION['tenhhErr'] . '") </script>');
      } else if ($_SESSION['dongiaErr'] != "") {
        echo ('<script> alert("' . $_SESSION['dongiaErr'] . '") </script>');
      } else if ($_SESSION['giamgiaErr'] != "") {
        echo ('<script> alert("' . $_SESSION['giamgiaErr'] . '") </script>');
      } else if ($_SESSION['motaErr'] != "") {
        echo ('<script> alert("' . $_SESSION['motaErr'] . '") </script>');
      } else if ($_SESSION['soluotxemErr'] != "") {
        echo ('<script> alert("' . $_SESSION['soluotxemErr'] . '") </script>');
      }else if ($_SESSION['ngaylapErr'] != "") {
        echo ('<script> alert("' . $_SESSION['ngaylapErr'] . '") </script>');
      }
      include "./View/hanghoa.php";
      break;
    }
}



?>