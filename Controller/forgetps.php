<?php
$act = "forgetps";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'forgetps':
        include "./View/forgetpassword.php";
        break;
    case 'forgetps_action':
        if (isset($_POST['submit_email'])) {
            $email = $_POST['email'];
            $_SESSION['email'] = array();
            $usr = new user();
            $checkemail = $usr->getEmail($email);
            if ($checkemail != false) {
                $code = random_int(10000, 99999);
                $item = array(
                    'code' => $code,
                    'email' => $email
                );
                $_SESSION['email'][] = $item;
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
                $mail->Subject = 'Quen mat khau'; //Sets the Subject of the message
                $mail->Body = 'Ma code : ' . $code; //An HTML or plain text message body
                if ($mail->Send()) //Send an Email. Return true on success or false on error
                {
                    echo '<script> alert("Gui mail thanh cong")</script>';
                    include "./View/resetpw.php";
                } else {
                    echo '<script> alert("Gui mail khong thanh cong")</script>';
                    include "./View/forgetpassword.php";
                }
            } else {
                echo '<script> alert("Dia chi khong ton tai")</script>';
                include "./View/forgetpassword.php";
            }
        }

        break;
    case 'resetps':
        if (isset($_POST['submit_password'])) {
            $codeold = $_POST['password'];
            $flag = false;
            foreach ($_SESSION['email'] as $key => $item) {
                if ($item['code'] == $codeold) {
                    $flag = true;
                    $cdau = 'GFR5%';
                    $csau = '!2*GH';
                    echo $codeold;
                    $codenew = md5($cdau . $codeold . $csau);
                    $emailold=$item['email'];
                    $usr=new user();
                    $usr->getupdateEmail($emailold,$codenew);
                    include "./View/login.php";
                }
            }
            if ($flag==false) {
                echo '<script> alert("Code khong dung")</script>';
                include "./View/resetpw.php";
            }
        }
        break;

}
?>