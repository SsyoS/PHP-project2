<?php 
class binhluan{
    
    function findbl($count,$limit)
    {
        $page = (($count % $limit) == 0) ? $count / $limit : floor($count / $limit) + 1;
        return $page;
    }
    function findStartbl($limit)
    {
    
        if(!isset($_GET['page'])|| $_GET['page']==1)
        {   
            $start = 0;
        }else
        {
            $start = ($_GET['page'] - 1) * $limit;
        }
        return $start;
    }
    function Insertbinhluan($mabl,$mahh,$makh,$ngaybl,$noidung,$solike,$sodislike)
    {
    $db = new connect();
    $query="insert into binhluan1(mabl,mahh,makh,ngaybl,noidung,solike,sodislike)
    values(null,'$mahh','$makh','$ngaybl','$noidung','$solike',$sodislike)";
    $db->exec($query);
    }
    function deletebinhluan($mabl,$makh)
    {
    $db = new connect();
        $query = "delete from binhluan1 where mabl='$mabl'";
     $db->exec($query);
    
    }
    function getCount($mahh)
    {
        $db = new connect();
        $select = "select count(mabl) from binhluan1 where mahh=$mahh ";
        $result = $db->getinstance($select);
        return $result[0];
    }
    // function like($mabl,$solike)
    // {
    // $db = new connect();
    // $query="UPDATE binhluan1 SET solike='$solike' where mabl ='$mabl'";
    // $db->exec($query);
    // }
    // function dislike($mabl,$sodislike)
    // {
    // $db = new connect();
    // $query="UPDATE binhluan1 SET solike='$sodislike' where mabl ='$mabl'";
    // $db->exec($query);
    // }
}
?>  