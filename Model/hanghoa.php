<?php
    class hanghoa
    {
        public function __construct(){}
        public function getHangHoa($nhom)
        {
            $db=new connect();
            $select="SELECT * FROM hanghoa ,loai  where loai.tenloai = '$nhom' AND loai.maloai = hanghoa.Nhom";
            $result=$db->getList($select);
            return $result;
        }
        public function getHangHoaall()
        {
            $db=new connect();
            $select="SELECT tenloai FROM hanghoa ,loai  where  loai.maloai = hanghoa.Nhom";
            $result = $db->getinstance($select);
            return $result[0];
        }
        public function getHangHoa1($nhom)
        {
            $db=new connect();
            $select="SELECT * FROM hanghoa ,loai  where loai.maloai = '$nhom' AND loai.maloai = hanghoa.Nhom";
            $result=$db->getList($select);
            return $result;
        }
        public function gethanghoaid($id)
        {
            $db=new connect();
            $select="SELECT * FROM hanghoa WHERE mahh=$id";
            $result=$db->getInstance($select);
            return $result;
        } 
        public function getSize()
        {
            $db=new connect();
            $select="SELECT * FROM Size  ";
            $result=$db->getList($select);
            return $result;
        }
        public function getSize1($masize)
        {
            $db=new connect();
            $select="SELECT * FROM Size where maSize = '$masize' ";
            $result=$db->getList($select);
            return $result;
        }
        public function getSize3($size)
        {
            $db=new connect();
            $select="SELECT * FROM Size where Size = '$size' ";
            $result=$db->getList($select);
            return $result;
        }
        public function getSize2($masize)
        {
            $db=new connect();
            $select="SELECT Size FROM Size where maSize = '$masize' ";
            $result=$db->getInstance($select);
            return $result[0];
        }
        public function getcthd1($size)
        {
            $db=new connect();
            $select="SELECT masohd FROM cthoadon1 where size = '$size' ";
            $result=$db->getList($select);
            return $result;
        }
        function getlistsize($start,$limit){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT * FROM Size limit ".$start.",".$limit;
            $result=$db->getList($select);
            return $result;
        } 
        function getCountHH(){
            //kết nối db
            $db = new connect();
            // viết truy vấn
            $select = "SELECT count(*) from`hanghoa ";
            $result = $db->getinstance($select);
            return $result[0];
        }
        function getlistpage($start,$limit,$nhom){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT * from hanghoa,loai where loai.tenloai = '$nhom' AND loai.maloai = hanghoa.Nhom limit ".$start.",".$limit;
            $result = $db->getList($select);
            return $result;
        }   
        function getlistbinhluan($start,$limit,$id){
            $db = new connect();
            // viết truy vấn
            $select="SELECT  mabl,tenkh ,mahh,username,ngaybl,noidung, solike,sodislike FROM binhluan1 bl ,khachhang1 kh WHERE  bl.makh=kh.makh and mahh='$id' limit ".$start.",".$limit;
            $result = $db->getList($select);
            return $result;
        }   
        public function getbl($id)
        {
            $db=new connect();
            $select="SELECT  mabl ,tenkh,mahh,username,ngaybl,noidung ,solike,sodislike FROM binhluan1 bl ,khachhang1 kh WHERE  bl.makh=kh.makh and mahh='$id'";
            $result=$db->getList($select);
            return $result;
        }
        public function getyt($makh)
        {
            $db=new connect();
            $select="SELECT  makh,hinh,tenhh,dongia,hh.mahh FROM yeuthich yt ,hanghoa hh  WHERE yt.mahh = hh.mahh and makh = '$makh'";
            $result=$db->getList($select);
            return $result;
        }
        
        public function getvoucher()
        {
            $db=new connect();
            $select="SELECT * FROM `voucher` ";
            $result=$db->getList($select);
            return $result;
        }
        public function getvoucher1($masovoucher)
        {
            $db=new connect();
            $select="SELECT * FROM `voucher` where masovoucher = '$masovoucher'";
            $result=$db->getList($select);
            return $result;
        }
        public function getctvoucher($masovoucher)
        {
            $db=new connect();
            $select="SELECT * FROM `ctvoucher` where masovoucher = '$masovoucher'";
            $result=$db->getList($select);
            return $result;
        }
        function getlistvoucher($start,$limit){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT masovoucher,tenvoucher,giamgia,conlai FROM `voucher` limit ".$start.",".$limit;
            $result = $db->getList($select);
            return $result;
        }   
        public function getsotiengiam($masohd)
        {
            $db=new connect();
            $select="SELECT  * FROM ctvoucher where masohd='$masohd'";
            $result=$db->getList($select);
            return $result;
        }
        public function getnhom()
        {
            $db=new connect();
            $select="SELECT * FROM loai  ";
            $result=$db->getList($select);
            return $result;
        }
        function getlistnhom($start,$limit){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT tenloai  FROM loai limit ".$start.",".$limit;
            $result = $db->getList($select);
            return $result;
        }  
        public function getmaloai()
        {
            $db=new connect();
            $select="SELECT maloai,tenloai FROM loai ";
            $result=$db->getList($select);
            return $result;
        }
        public function getmaloai1($maloai)
        {
            $db=new connect();
            $select="SELECT maloai,tenloai FROM loai where maloai = '$maloai'";
            $result=$db->getList($select);
            return $result;
        }
        function getlist($start,$limit){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT * from hanghoa  limit ".$start.",".$limit;
            $result = $db->getList($select);
            return $result;
        } 
        
        function getsanpham(){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT * from hanghoa   ";
            $result = $db->getList($select);
            return $result;
        } 
        function geteditsanpham($mahh){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT * from hanghoa Where mahh='$mahh'  ";
            $result = $db->getList($select);
            return $result;
        } 
        public function getlistmaloai($start,$limit)
        {
            $db=new connect();
            $select="SELECT maloai,tenloai FROM loai limit ".$start.",".$limit;
            $result=$db->getList($select);
            return $result;
        }
        function getdangnhap($makh){
            //kết nối db
            $db = new connect();
            // viết truy vấn
            $select = "SELECT vaitro from`khachhang1` where makh='$makh'";
            $result=$db->getInstance($select);
            return $result[0];
        }
        function getkhachhang($makh){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT * from khachhang1 Where makh='$makh'";
            $result = $db->getList($select);
            return $result;
        } 
        public function getmasohd($mahh)
        {
            $db=new connect();
            $select="SELECT * FROM cthoadon1  where mahh=$mahh";
            $result=$db->getList($select);
            return $result;
        }
        function gethoadon(){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT * from hoadon1 ";
            $result = $db->getList($select);
            return $result;
        } 
        public function getlisthoadon($start,$limit)
        {
            $db=new connect();
            $select="SELECT * FROM hoadon1 limit ".$start.",".$limit;
            $result=$db->getList($select);
            return $result;
        }
        function gethoadon1($masohd){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT * from hoadon1 where masohd = $masohd";
            $result = $db->getList($select);
            return $result;
        } 
        function getcthoadon($masohd){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT * from cthoadon1 where masohd = $masohd";
            $result = $db->getList($select);
            return $result;
        } 
        function getcthoadon1($masohd,$mahh){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT * from cthoadon1 where masohd = $masohd and  mahh=$mahh";
            $result = $db->getList($select);
            return $result;
        } 
        public function getlistcthoadon($start,$limit,$masohd)
        {
            $db=new connect();
            $select="SELECT * FROM cthoadon1 where masohd=$masohd limit ".$start.",".$limit;
            $result=$db->getList($select);
            return $result;
        }
        function getskhachhang1(){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT * from khachhang1   ";
            $result = $db->getList($select);
            return $result;
        } 
        public function getlistkhachhang($start,$limit)
        {
            $db=new connect();
            $select="SELECT * FROM khachhang1  limit ".$start.",".$limit;
            $result=$db->getList($select);
            return $result;
        }
        function getkhachhang1(){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT DISTINCT vaitro from khachhang1   ";
            $result = $db->getList($select);
            return $result;
        } 
        function getbinhluan1($makh){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT * from binhluan1 where makh = $makh";
            $result = $db->getList($select);
            return $result;
        } 
        function getctvoucher1($makh){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT * from ctvoucher where makh = $makh";
            $result = $db->getList($select);
            return $result;
        } 
        function getyt1($makh){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT * from yeuthich where makh = $makh";
            $result = $db->getList($select);
            return $result;
        } 
        function gethd1($makh){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT  cthoadon1.masohd FROM hoadon1 ,cthoadon1 WHERE hoadon1.masohd = cthoadon1.masohd and makh =$makh";
            $result = $db->getList($select);
            return $result;
        } 
        function getsl($masovoucher){
            //kết nối db
            $db = new connect();
            // viết truy vấn
            $select = "SELECT conlai from`voucher` where masovoucher='$masovoucher'";
            $result=$db->getInstance($select);
            return $result[0];
        }
        function getThongKeHangHoa(){
            $db = new connect();
            // viết truy vấn
            $select = "SELECT a.tenhh,sum(b.soluongmua) as soluong from hanghoa a, cthoadon1  b where a.mahh=b.mahh group by a.tenhh";
            $result = $db->getList($select);
            return $result;
        } 
        function getThongKeHangHoa1($soluong){
            $db = new connect();
            // viết truy vấn
            $date = getdate();
            $ngaylap =$date['year']."-".$date['mon']."-".$date['mday']; 
            $ngaylap1 =$date['year']."-".$date['mon']."-".$date['mday']-$soluong;      
            $select = "SELECT a.tenhh,sum(b.soluongmua) as soluong from hanghoa a, cthoadon1  b, hoadon1 C where a.mahh=b.mahh AND b.masohd = c.masohd AND C.ngaydat  BETWEEN '$ngaylap1' AND ' $ngaylap'  group by a.tenhh";
            $result = $db->getList($select);
            return $result;
        } 
        function getThongKeHangHoa2($soluong){
            $db = new connect();
            // viết truy vấn
            $date = getdate();
            $ngaylap =$date['year']."-".$date['mon']."-".$date['mday']; 
            $ngaylap1 =$date['year']."-".$date['mon']-$soluong."-".$date['mday'];      
            $select = "SELECT a.tenhh,sum(b.soluongmua) as soluong from hanghoa a, cthoadon1  b, hoadon1 C where a.mahh=b.mahh AND b.masohd = c.masohd AND C.ngaydat  BETWEEN '$ngaylap1' AND ' $ngaylap'  group by a.tenhh";
            $result = $db->getList($select);
            return $result;
        } 
        function getThongKeHangHoa3($soluong){
            $db = new connect();
            // viết truy vấn
            $date = getdate();
            $ngaylap =$date['year']."-".$date['mon']."-".$date['mday']; 
            $ngaylap1 =$date['year']-$soluong."-".$date['mon']."-".$date['mday'];      
            $select = "SELECT a.tenhh,sum(b.soluongmua) as soluong from hanghoa a, cthoadon1  b, hoadon1 C where a.mahh=b.mahh AND b.masohd = c.masohd AND C.ngaydat  BETWEEN '$ngaylap1' AND ' $ngaylap'  group by a.tenhh";
            $result = $db->getList($select);
            return $result;
        } 
        public function getgiasize($mahh,$size)
        {
            $db=new connect();
            $select="SELECT DISTINCT hanghoa.dongia as gia , size.dongia  FROM hanghoa ,size WHERE hanghoa.mahh ='$mahh' AND size = '$size'";
            $result = $db->getList($select);
            return $result;
        
        }
        function gettien($masohd){
            //kết nối db
            $db = new connect();
            // viết truy vấn
            $select = "SELECT sum(thanhtien) FROM `cthoadon1` WHERE masohd = $masohd";
            $result=$db->getInstance($select);
            return $result[0];
        }
        
    }
   
?>