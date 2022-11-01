<?php

require("PHPMailer-master/src/PHPMailer.php");
require("PHPMailer-master/src/SMTP.php");
require("PHPMailer-master/src/Exception.php");


$getEmailJoinKS=$_POST['AddEmail'];

$getUsernameAddKS = $_POST['AddUsername'];
$getPasswordAddKS = $_POST['AddPassword'];
$getGiaTien=$_GET['Price'];
$linkJoinKS="http://localhost/XayDungUngDungWebAnToan/MergeCode/Bai%20tap%20so%206.%20Loc%20du%20lieu%20nguoi%20dung/index.php?click=THKS&Price=".$getGiaTien."&id=".$getMaKS;


$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->IsSMTP(); // enable SMTP

$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->CharSet = 'UTF-8';
$mail->Username = "testdc999@gmail.com";
$mail->Password = "sycsqsbabvrbmjed";
$mail->SetFrom("testdc999@gmail.com");
$mail->Subject = "Tham gia khảo sát";
$mail->Body = '<!doctype html>
<html lang="en-US">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Reset Password Email Template</title>
    <meta name="description" content="Reset Password Email Template.">
    <style type="text/css">
        a:hover {
            text-decoration: underline !important;
        }
    </style>
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
    <!--100% body table-->
    <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
        style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: sans-serif;">
        <tr>
            <td>
                <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0"
                    align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="padding:0 35px;">
                                        <h1
                                            style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:sans-serif;">
                                            Tham gia khảo sát</h1>
                                        <span
                                            style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                            
                                        <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                            Dùng thông tin sau để tham gia khảo sát, vui lòng đổi mật khẩu trước khi tham gia khảo sát:
                                        </p>
                                        <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                            Username: '.$getUsernameAddKS.'
                                        </p>
                                        <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                            Password: '.$getPasswordAddKS.'
                                        </p>
                                        <a href="'.$linkJoinKS.'"
                                            style="background:#20e277;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">Tham gia khảo sát</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <p
                                style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">
                                &copy; <strong>Đặng Tiến Thành - AT150252</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!--/100% body table-->
</body>

</html>';
$mail->AddAddress("$getEmailJoinKS");
if($mail->Send()){

}
// if (!$mail->Send()) {
//     echo "Mailer Error: " . $mail->ErrorInfo;
// } else {
//     echo "Message has been sent";
// }
?>