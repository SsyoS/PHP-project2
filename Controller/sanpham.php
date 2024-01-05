
<?php

$act = "sanpham";
if (isset($_GET["act"])) {
    $act = $_GET["act"];
}

switch ($act) {
    case "sanpham":
        include "./view/sanpham.php";
        break;
    case "khuyenmai":
        if (isset($_GET["ma"])) {
            $ma = $_GET['ma'];

            if (isset($_SESSION['makh'])) {
                $makh = $_SESSION['makh'];
                $_SESSION['magiamgia'] = $ma;
            }
        }
        include "./view/sanpham.php";
        break;
    case "detail":
        if (isset($_GET["them"]) == 'yt') {
            if (isset($_SESSION['makh'])) {
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $dulieu = "";
                    $kiemtrayt = 0;
                    $makh = $_SESSION['makh'];
                    $hh = new hanghoa();
                    $result = $hh->getyt($_SESSION['makh']);
                    while ($set = $result->fetch()):
                        $dulieu = $set['mahh'];
                        if ($dulieu == $id) {
                            $kiemtrayt = 1;
                        }
                    endwhile;
                    if ($kiemtrayt == 0) {
                        $yt = new yeuthich();
                        $yt->Insertyeuthich($id, $makh);

                    }
                    if ($kiemtrayt == 1) {
                        $yt = new yeuthich();
                        $yt->deleteyeuthich($id, $makh);

                    }
                }
            }
        }
        include "./view/sanphamchitiet.php";
        break;
    case "xoa":
        if (isset($_SESSION['magiamgia'])) {
            unset($_SESSION['magiamgia']);
            unset($_SESSION['tiengiamgia']);
        }
        include "./view/sanpham.php";
        break;
    case "tang":
        $hh = new hanghoa();
        $result1 = $hh->getnhom();
        $countnhom = $result1->rowCount();
        if($_SESSION['trang'] < $countnhom-4){
        $_SESSION['trang']++; 
        }
        include "./view/sanpham.php";
        break;
    case "giam":
        if($_SESSION['trang']>0){
            $_SESSION['trang']--; 
        }
        include "./view/sanpham.php";
        break;
    default:
        include "./view/sanpham.php";
        break;
}

?>