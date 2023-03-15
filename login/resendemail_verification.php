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
                    <input type="submit" class="button" title="Resend" name="resendbtn" value="Resend"></input>
                </div>
    </form>
</div>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
function resend_email_verify($Username, $email, $verify_token)
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
        $mail->setFrom('from@example.com', $Username);
        $mail->addAddress($email);

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Resend email verification';

        $email_template = "
        <h2> You have registered from web </h2>
        <h5> To verifed click the link below to verifed your email</h5>
        <br/><br/>
        <a href='http://localhost/1640/login/verify_email.phptoken=$verify_token'>Verified Your Email</a>
        ";
        // $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
}





if(isset($_POST['resendbtn']))
{
    if(!empty(trim($_POST['email'])))
    {
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        $checkmail = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
        $checkmail_run = mysqli_query($conn, $checkmail);
        if(mysqli_num_rows($checkmail_run)>0)
        {
            $row = mysqli_fetch_array($checkmail_run);
            if($row['verify_status']==0)
            {
                $Username = $row['Username'];
                
                $email = $row['email'];
                
                $verify_token = $row['verify_token'];
                resend_email_verify($Username, $email, $verify_token);
                $_SESSION['status'] = "The verify email already sent to your Email!! Please Check.";
                header("location: login.php");
                exit(0); 
            }
            else
            {
                $_SESSION['status'] = "This email already verified!! Please login";
                header("location: login.php");
                exit(0); 
            }
        }
        else
        {
            $_SESSION['status'] = "This email is not registered yet!! Please register now";
            header("location: register.php");
            exit(0);
        }
    }
}
else
{
    $_SESSION['status'] = "Please enter your email";
    header("location: resendemail_verification.php");
    exit(0);
}


?>