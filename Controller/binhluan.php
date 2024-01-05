<?php

$nd ="";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
     $nd = $_POST['comment'];
    if (isset($_SESSION['makh'])) {
        $makh = $_SESSION['makh'];
        $date = getdate();
        $ngaybl =$date['year']."-".$date['mon']."-".$date['mday'];
        $bl = new binhluan();
        $bl->Insertbinhluan(null, $id, $makh, $ngaybl, $nd,0,0);
    }
    }

include "./view/sanphamchitiet.php";



?>