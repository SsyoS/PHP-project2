<?php
    class user{
        public function __construct(){}
        function InsertUser($tenkh,$user,$matkhau,$email,$diachi,$dt)
        {
        $db = new connect();
        $query="insert into khachhang1(makh,tenkh,username,matkhau,email,diachi,sodienthoai,vaitro)
        values(NULL,'$tenkh','$user','$matkhau','$email','$diachi','$dt',default)";
        $db->exec($query);
        }
        function loginUser($username,$password)
        {
            $db = new connect();
        $select = "select * from khachhang1 where username='$username' and matkhau='$password'";
        $result = $db->getList($select);
        $set = $result->fetch();
        return $set;    
        }
        function exitUser($tendn)
        {
            $db = new connect();
        $select = "select * from khachhang1 where username='$tendn'";
        $result = $db->getInstance($select);
        return $result;   
        }
        
        public function getEmail($email)
    {
        $db = new connect();
        $select = "select * from khachhang1 where email='$email'";
        $result = $db->getInstance($select);
        return $result;
    }
    public function getupdateEmail($emailold,$codenew)
    {
        $db = new connect();
        $query = "update khachhang1 set matkhau='$codenew' where email='$emailold'";
        $db->exec($query);
    }
    }
?>
