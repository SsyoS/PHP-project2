<?php

// Insert vào bảng hóa đơn xog mới insert vào bảng chi tiết háo đơn
if (isset($_SESSION['giohang']) && !empty($_SESSION['giohang'])) {
    if ($_SESSION['makh']) {
        $makh = $_SESSION['makh'];
        $order = new order();
        $masohd = $order->InsertOrder($makh);
        // Insert vào bảng chi tiết hóa đơn
        // Duyệt qua $_session['giohang']
        $total = 0;
        // $vc=new voucher();
        // $giamgia=$vc->getgiamgia($makh);
        foreach ($_SESSION['giohang'] as $key => $item) {
            $order->insertOrderDetail($masohd, $item['mahh'], $item['quanty'], $item['size'], ($item['total']));
            $total += $item['total'];
        }
        if (isset($_SESSION['tiengiamgia'])) {
            $total = $total - $_SESSION['tiengiamgia'];
            $total += $_SESSION['phivanchuyen'];
        } else {
            $total += $_SESSION['phivanchuyen'];
        }
        // $tiencuoi=$total-$giamgia+ $_SESSION['phivanchuyen'];
        // echo "giam gia".$tiencuoi;
        // echo $_SESSION['phivanchuyen'];
        $order->updateTotal($masohd, $total);
        $orderDetail = $order->getInfoOrder($masohd);
        $khDetail = $order->getInfoKhachhang($masohd);

        if (isset($_SESSION['magiamgia'])) {
            $gg = new voucher();
            $gg->giamgia($_SESSION['magiamgia'], $makh, $masohd, $_SESSION['tiengiamgia']);
        }
        if (isset($_SESSION['magiamgia'])) {
            unset($_SESSION['magiamgia']);
            unset($_SESSION['tiengiamgia']);
        }
        $usr = new user();
        $email=$khDetail['email'];
        $date = getdate();
        $ngay =$date['year']."-".$date['mon']."-".$date['mday'];
        
                $code = random_int(10000, 99999);
                $item = array(
                    'code' => $code,
                    'email' => $email
                );
            $mess='Masohd: '.$masohd.' - Tong tien : '. $total.'<br> don hang duoc xac nhan vao  luc ' . $ngay;
                $mail = new PHPMailer;
                $mail->IsSMTP(); //Sets Mailer to send message using SMTP
                $mail->Host = 'smtp.gmail.com'; //Sets the SMTP hosts of your Email hosting, this for Godaddy
                $mail->Port = 587; //Sets the default SMTP server port
                $mail->SMTPAuth = true; //Sets SMTP authentication. Utilizes the Username and Password variables
                $mail->Username = '0919677898long@gmail.com'; //Sets SMTP username
                $mail->Password = 'ahxbhylbxwxnwiat'; //Phplytest20@php					//Sets SMTP password
                $mail->SMTPSecure = 'tls'; //Sets connection prefix. Options are "", "ssl" or "tls"
                $mail->From = '0919677898long@gmail.com'; //Sets the From email address for the message
                $mail->FromName = 'long'; //Sets the From name of the message
                $mail->AddAddress($email, 'User'); //Adds a "To" address
                //$mail->AddCC($_POST["email"], $_POST["name"]);	//Adds a "Cc" address
                $mail->WordWrap = 50; //Sets word wrapping on the body of the message to a given number of characters
                $mail->IsHTML(true); //Sets message type to HTML				
                $mail->Subject = 'hoa don'; //Sets the Subject of the message
                $mail->Body = $mess; //An HTML or plain text message body
                $mail->Send() ;//Send an Email. Return true on success or false on error
              
            
    }
    include_once "./View/order.php";
} else {
    echo '<script>alert("giỏ hàng rỗng vui lòng chọn sản phẩm trước khi thanh toán ")</script>';
    include_once "./View/sanpham.php";
}