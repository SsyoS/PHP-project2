<?php 
class voucher{
    
    function giamgia($masovoucher,$makh,$masohd,$sotiengiam)
    {
        $db = new connect();
        $query="insert into ctvoucher(masovoucher,makh,masohd,sotiengiam)
        values($masovoucher,$makh,$masohd,$sotiengiam)";
        $db->exec($query);
        $hh = new hanghoa();
         $soluong = $hh->getsl($masovoucher);
         $soluong = $soluong-1 ;
         $query1="UPDATE voucher SET conlai=' $soluong' where masovoucher = $masovoucher";
         $db->exec($query1);
        //  if($soluong == 0){
        //     $query2 = "delete from voucher where masovoucher='$masovoucher'";
        //     $db->exec($query2);  
        //  }
    }   
    
    function themvoucher($masovoucher,$tenvoucher,$giamgia,$conlai)
    {
        $db = new connect();
        $query="insert into voucher(masovoucher,tenvoucher,giamgia,conlai)
        values(null,'$tenvoucher',$giamgia,$conlai)";
        $db->exec($query);
    }   
    function updatevoucher($masovoucher,$tenvoucher,$giamgia,$conlai)
    {
        $db = new connect();
        $query = "UPDATE  voucher SET tenvoucher='$tenvoucher'  where masovoucher='$masovoucher'";
        $query1 = "UPDATE  voucher SET giamgia='$giamgia'  where masovoucher='$masovoucher'";
        $query2 = "UPDATE  voucher SET conlai='$conlai'  where masovoucher='$masovoucher'";
        $db->exec($query);
        $db->exec($query1);
        $db->exec($query2);
    }
    function deletevoucher($masovoucher)
    {
        $db = new connect();
        $hh = new hanghoa();
        $result = $hh->getctvoucher($masovoucher);
        while ($set = $result->fetch()):
            $maso = $set['masovoucher'];
            $query = "delete from ctvouhcer where masohd='$maso'";
            $db->exec($query);
        endwhile;
        $query1 = "delete from voucher where masovoucher='$masovoucher'";
        $db->exec($query1);
    }
}
?>  