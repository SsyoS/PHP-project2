<?php
$act = 'home';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'home':
        include "./View/size.php";
        break;
    case 'delete':
        $masize= $_GET['ma'];
        $v = new size();
        $v->deletesize($masize);
        include "./View/size.php";
        break;
    case 'them':
        $a = new validate();
        $b = $a->checksize();
        if ($b == 1) {
            $maSize = $_POST['masize'];
            $Size= $_POST['tensize'];
            $dongia = $_POST['dongia'];
            $v = new size();
            $v->add($maSize,$Size,$dongia);
            include "./View/size.php";
            break;
        } else {
            include "./View/size.php";
            break;
        }
    case 'update':
        $a = new validate();
        $b = $a->checksize();
        if ($b == 1) {
            $maSize = $_POST['masize'];
            $Size= $_POST['tensize'];
            $dongia = $_POST['dongia'];
            $v = new size();
            $v->updatesize($maSize,$Size,$dongia);
            include "./View/size.php";
            break;
        } else {
            if ($_SESSION['sizeErr'] != "") {
                echo ('<script> alert("' . $_SESSION['sizeErr'] . '") </script>');
              }else  if ($_SESSION['banggiaErr'] != "") {
                echo ('<script> alert("' . $_SESSION['banggiaErr'] . '") </script>');
              }
            include "./View/size.php";
            break;
        }

}

?>