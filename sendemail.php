<?php
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$title = 'Send Email';
$output = '';   
$error = '';   

// Chỉ xử lý khi có form gửi lên
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Lấy dữ liệu từ form
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    // (Có thể kiểm tra dữ liệu ở đây nếu muốn)

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = 0;
        $mail->isSMTP();                                           
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                 
        $mail->CharSet    = 'UTF-8';                              
        $mail->Username   = 'tdan0067@gmail.com';                
        $mail->Password   = 'zniayiajvkpxlxyi';  // App password Gmail      
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;        
        $mail->Port       = 465;

        // Recipients
        $mail->setFrom('tdan0067@gmail.com', 'Sinh Viên Greenwich');
        $mail->addAddress('huynqgcd220459@fpt.edu.vn', 'Quang Huy');
        $mail->addReplyTo('tdan0067@gmail.com', 'Sinh Viên');

        // Content
        $mail->isHTML(false);
        $mail->Subject = 'Contact Form Submission';
        $mail->Body    = "Name: $name\nEmail: $email\n\nMessage:\n$message";

        $mail->send();
        $output = 'Message has been sent';
    } catch (Exception $e) {
        $error = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// Hiển thị giao diện
ob_start();
include 'template/sendemail.html.php';
$output = ob_get_clean();
include 'template/layout.html.php';
?>
