<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Ship Anomaly Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">

        <div class="unix-login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-content card">
                            <div class="login-form">
                                <h4>Register</h4>
                                <form method="post" action="page-register.php" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Full Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" placeholder="User Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email address <span class="text-danger">*</span></label>
                                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password <span class="text-danger">*</span></label>
                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                    </div>
                                    <!--div class="form-group">
                                        <label>Mobile <span class="text-danger">*</span></label>
                                        <input type="number" name="phone" class="form-control" placeholder="Password" required>
                                    </div-->
                                    <div class="checkbox">
                                        <label>
										                    <input type="checkbox"> Agree the terms and policy
									                      </label>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
                                    <div class="register-link m-t-15 text-center">
                                        <p>Already have account ? <a href="page-login.html"> Sign in</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>

</body>

</html>

<?php
  include ("connectdbshore.php");
  if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    //$phone = $_POST['phone'];
    $code = substr(md5(mt_rand()),0,15);

    $password = sha1($password);

    //$sql = "INSERT INTO user (name, password, email, phone) VALUES ('$name', '$password', '$email', $phone)";
    //$result = mysql_query($sql);

    $insert=mysqli_query($conn,"insert into user(name, password, email, activation_code) values('$name','$password','$email','$code')");
	  $db_id=mysqli_insert_id($conn);

    /*if ($conn->query($sql) === TRUE)
    {
      $message = "Updated successfully";
      echo "<script type='text/javascript'>alert('$message');</script>";
      echo "<script>window.open('page-login.html','_self')</script> ";
    }
    else
    {
      echo "Error updating record";
    }
    $conn->close;
  }*/

    $message = "Your Activation Code is ".$code."";
    $to=$email;
    $subject="Activation Code For AVASTS";
    $from = 'admin@sihmail.com';
    $link = 'http://localhost/ship/verification.php?id=' . $db_id . '&code=' . $code;
    $body='Your Activation Code is '.$code.' Please Click On This link <a href="'. $link .'">Verify.php?id='.$db_id.'&code='.$code.'</a>to activate your account.';
    $altbody = 'Your Activation Code is '.$code.' Please Copy and Paste this link: http://localhost/ship/verification.php?id='.$db_id.'&code='.$code.' to activate your account.';
    //$headers = "From:".$from;
    //$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    //mail($to,$subject,$body,$headers);

    require 'PHPMailer-5.2-stable/class.phpmailer.php'; // path to the PHPMailer class
    require 'PHPMailer-5.2-stable/class.smtp.php';
    require 'PHPMailer-5.2-stable/PHPMailerAutoload.php';

    $mail = new PHPMailer;

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'swapnilshindeid3@gmail.com';                 // SMTP username
    $mail->Password = 'admin@sihmail.com';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;

    $mail->setFrom($from, 'Mailer');
    $mail->addAddress($to);     // Add a recipient

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $subject;
    $mail->Body    = $body;
    $mail->AltBody = $altbody;

    if(!$mail->send()) {
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
      echo 'Message has been sent';
    }

	//echo "An Activation Code Is Sent To You Check You Emails";
}
?>
