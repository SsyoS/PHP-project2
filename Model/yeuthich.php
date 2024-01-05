<?php
    class yeuthich
    {
        public function __construct(){}
        function Insertyeuthich($mahh,$makh)
        {
        $db = new connect();
        $query="insert into yeuthich(mahh,makh)
        values('$mahh','$makh')";
        $db->exec($query);
        }
        function deleteyeuthich($mahh,$makh)
        {
        $db = new connect();
        $query="DELETE FROM yeuthich where mahh='$mahh'and makh='$makh'";
        $db->exec($query);
        }
    }
   
?>