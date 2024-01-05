<?php

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
        
include "./View/yeuthich.php";


?>