<?php
session_start();
include('./header.php');
include('./nav.php');
include('dbcon.php');
?>

<div class="form-wrapper">

    <form action="#" method="post">
        <div class="container">
            <div class="alert">
                <?php
                if (isset($_SESSION['status'])) {
                    echo "<h4>" . $_SESSION['status'] . "</h4>";
                    unset($_SESSION['status']);
                }
                ?>
            </div>
            <h3>Resend Email Verification</h3>
            <!-- <p>Fill up the form with correct values.</p> -->
            <div class="form-items">
                <label>Email Address</label>
                <input type="text" name="email" id="email" placeholder="Email"></input>
                <div class="button-panel">
                    <input type="submit" class="button" title="Send Password Reset Link" name="password_reset_btn" value="Send Password Reset Link"></input>
                </div>
    </form>
</div>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function send_password_reset($get_name,$get_email,$token)
{
    $mail = new PHPMailer(true);

    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                   //Debug might be the number

    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'hoangpnhtesting@gmail.com';                     //SMTP username
    $mail->Password   = 'huyhoang022002';                               //SMTP password

    $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('from@example.com', $get_name);
    $mail->addAddress($get_email);

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Reset Password Nofitication';

    $email_template = "
    <h2> You have send the reset password message from website</h2>
    <h5> To Change your passwprd click the link below</h5>
    <h5> If this not you, you should check for sercurity of your account</h5>
    <br/><br/>
    <a href='http://localhost/1640/login/password_change.php?token=$token&email=$get_email'>Verified Your Email</a>
    ";
    // $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
}







    if(isset($_POST['password_reset_btn']))
    {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $token = md5(rand());

        $check_email = "SELECT email FROM users WHERE email='$email LIMIT 1";
        $check_email_run = mysqli_query($conn,$check_email);

        if(mysqli_num_rows($check_email_run) > 0){
            $row =  mysqli_fetch_array($check_email_run);
            $get_name = $row['name'];
            $get_email = $row['email'];

            $update_token = "UPDATE users SET verify_token='$token' WHERE email='$get_email' LIMIT 1";
            $update_token_run = mysqli_query($conn, $update_token);

            if($update_token_run)
            {
                send_password_reset($get_name,$get_email,$token);
                $_SESSION['status'] = "The reset password link has been sent to your mail!!";
                header("location: password_reset.php");
                exit(0);
            }
            else
            {
                $_SESSION['status'] = "Something went wrong";
                header("location: password_reset.php");
                exit(0);
            }
        }
        else
        {
            $_SESSION['status'] = "No email found";
            header("location: password_reset.php");
            exit(0);
        }
    }
?>