<?php

$act = 'edit';
if (isset($_GET['act'])) {
  $act = $_GET['act'];
}
switch ($act) {
  case 'edit':
  
    include "./View/editloaisanpham.php";
    break;
  case 'add':
    $a = new validate();
    $b = $a->checkloai();
    if ($b == 1) {
      $tenloai = $_POST['tenloai'];
      $l = new loaisanpham();
      $l->insertloai($tenloai);
      include "./View/editloaisanpham.php";
      break;
    } else {
      include "./View/editloaisanpham.php";
      break;
    }
  case 'delete':
    $maloai = $_GET['ma'];
    $l = new loaisanpham();
    $l->deleteloai($maloai);
    $l->deleteloai1($maloai);
    $l->deleteloai2($maloai);
    $l->deleteloai3($maloai);

    include "./View/editloaisanpham.php";
    break;
  case 'update':
    $a = new validate();
    $b = $a->checkloai();
    if ($b == 1) {
    $maloaicu = $_GET['ma'];
    $maloaimoi = $_POST['ml'];
    $tenloai = $_POST['tenloai'];
    $l = new loaisanpham();
    $l->upadteloai($maloaimoi, $tenloai, $maloaicu);
    include "./View/editloaisanpham.php";
    break;
    }else {
      echo '<script> alert("'.$_SESSION['loaiErr'] .'");</script>';
      include "./View/editloaisanpham.php";
      break;
    }
  case 'chon':
    $_SESSION['check'] = 1;
    include "./View/editloaisanpham.php";
    break;
  case 'huychon':
    $_SESSION['check'] = 0;
    include "./View/editloaisanpham.php";
    break;
  case 'xoa':
    $hh = new hanghoa();
    $l = new loaisanpham();
    $result = $hh->getmaloai();
    while ($set = $result->fetch()) {
      $ma = $set['maloai'];
      if (isset($_POST[$ma])) {
        $maloai = $_POST[$ma];
        $l->deleteloai($maloai);
        $l->deleteloai1($maloai);
        $l->deleteloai2($maloai);
        $l->deleteloai3($maloai);
      }
    }

    include "./View/editloaisanpham.php";
    break;
  case 'loai':
    if (isset($_POST['submit_file'])) {
      $file = $_FILES['file']['tmp_name'];
      file_put_contents($file, str_replace("\xBB\xEF\xBF", "", file_get_contents($file)));
      $file_open = fopen($file, "r");
      while (($csv = fgetcsv($file_open, 1000, ",")) !== false) {
        $maloai = $csv[0];
        $tenloai = $csv[1];
        $db = new connect();
        $query = "insert into loai(maloai,tenloai) values('$maloai','$tenloai')";
        $db->exec($query);
      }
      echo ('<script> alert(" import thanh cong") </script>');
    }
    include "./View/editloaisanpham.php";
    break;
}
?>