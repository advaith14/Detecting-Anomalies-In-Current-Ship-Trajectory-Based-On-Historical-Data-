<?php
if(isset($_POST['submit'])) {
  $to = $_POST['to'];
  $subject = $_POST['subject'];
  $body = $_POST['body'];

require 'PHPMailer-5.2-stable/class.phpmailer.php'; // path to the PHPMailer class
require 'PHPMailer-5.2-stable/class.smtp.php';
require 'PHPMailer-5.2-stable/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'swapnilshindeid3@gmail.com';                 // SMTP username
$mail->Password = 'admin@sihmail.com';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('no-reply@gmail.com', 'Mailer_Shore');
$mail->addAddress($to);     // Add a recipient
//$mail->addAddress('adi9773435959@gmail.com','Aditya');               // Name is optional
/*$mail->addReplyTo('info@example.com', 'Information');
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');

$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name*/
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $subject;
$mail->Body    = $body;
$mail->AltBody = 'Cannot display message.';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    //echo "<script>window.open('email-compose.html','_self')</script> ";
    //echo "<script>document.getElementById('emailfail').style.display = 'block'</script>";
} else {
    echo 'Message has been sent';
    //echo "<script>window.open('email-compose.html','_self')</script> ";
    //echo "<script>document.getElementById('emailsuccess').style.display = 'block'</script>";
}
}
