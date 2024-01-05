<?php
    function uploadimage()
    {
        // b1: tạo thư mục lấy hình về
        $target_dir="Content/imagetourdien/";
        //b2: lấy tên hình về gắn vô trong đường dẫn
        //Content/imagetourdien/giaythethao.jpg
        $target_file=$target_dir.basename($_FILES['image']['name']);
        // b3: lấy phần mở rộng về, và đổi về cùng 1 định dạng chữ hoa hoặc thường
        $targetFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // b4: kiểm tra xem hình đó có thật sự được đưa lên server ko?
        $uploadhinh=1;
        if(isset($_POST['submit']))
        {
            // lấy hình từ server về getimagesize
            $check=getimagesize($_FILES['image']['tmp_name']);
            if($check!==false)
            {
                $uploadhinh=1;
            }
            else
            {
                $uploadhinh=0;
                echo '<script> alert("hình ko có");</script>';
            }
        }
        // kiêm tra hình có tồn tại trong thư mục rồi thì báo lỗi
        if(file_exists($target_file))
        {
            $uploadhinh=0;
            // echo '<script> alert("thêm sản phẩm thành công");</script>';
        }
        // kiểm tra dung lượng hình up lên ko đc vượt quá 500kb
        if($_FILES['image']['size']>500000)
        {
            $uploadhinh=0;
            echo '<script> alert("hình vượt quá kích thước");</script>';
        }
        // kiểm tra có phải là hình hay không
        if($targetFileType !='jpg' && $targetFileType!='jpeg'
         && $targetFileType !='png' && $targetFileType!='gif')
        {
            $uploadhinh=0;
            // echo '<script> alert("Ko là hình");</script>';
        }
        // khi ko còn lỗi thì lấy hình từ server về thư mục
        if($uploadhinh==1)
        {
            if(move_uploaded_file($_FILES['image']['tmp_name'],$target_file))
            {
                echo '<script> alert("thêm sản phẩm thành công");</script>';
            }
            else
            {
                echo '<script> alert("Upload hình ko thành công");</script>';
            }
        }
    }
?>