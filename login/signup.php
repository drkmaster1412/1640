<?php
require_once('dbcon.php');
?>


<head>
<title>User Registration | PHP</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Noto+Sans+Mono:wght@500&family=Plus+Jakarta+Sans:wght@300&family=Poppins:ital,wght@0,200;0,300;0,500;0,800;1,300&family=Volkhov:wght@700&display=swap" rel="stylesheet">
    <title>User Registration | PHP</title>
</head>


<img src="./img/bg.png">

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
            <h3>Registration</h3>
            <!-- <p>Fill up the form with correct values.</p> -->
            <div class="form-items">
                <input type="text" name="C_name" id="name" placeholder="Name"></input>
            </div>
            <div class="form-items">
                <input type="number" name="C_phone" id="phone" placeholder="Phone Number"></input>
            </div>
            <div class="form-items">
                <input type="text" name="mail" id="mail" placeholder="Email"></input>
            </div>
            <div class="form-items">
                <input type="password" name="pass" id="pass" placeholder="Password"></input>
            </div>
            <div class="form-items">
                <input type="password" name="cpass" id="password" placeholder="Confirm Password"></input>
            </div>
            <div class="button-panel">
                <input type="submit" class="button" title="Sign up" name="btnsignup" value="Sign Up"></input>
            </div>
    </form>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
    <?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';


    function sendemail_verify($Username, $email, $verify_token)
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
        $mail->Subject = 'Here is the subject';

        $email_template = "
        <h2> You have registered from web </h2>
        <h5> To verifed click the link below to verifed your email</h5>
        <br/><br/>
        <a href='http://localhost/1640/login/verify_email.phptoken=$verify_token'>Verified Your Email</a>
        ";
        // $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    }




    $err = "";
    $Username = "";
    $Phone = "";
    $email = "";
    $pass = "";
    $cpass = "";

    if (isset($_POST["btnsignup"])) {

        //Check email exist or not
        $check_email_query = "SELECT email FROM users WHERE email='$email' LIMIT 1";
        $check_email_query_run = mysqli_query($conn, $check_email_query);
        if (mysqli_num_rows($check_email_query_run) > 0) {
            $_SESSION['status'] = "Email id already exist";
            header("Location: signup.php");
        } else {
            $Username = isset($_POST["C_name"]) ? $_POST["C_name"] : "";
            $Phone = isset($_POST["C_phone"]) ? $_POST["C_phone"] : "";
            $email = isset($_POST["email"]) ? $_POST["email"] : "";
            $pass = md5($_POST["pass"]);
            $cpass = md5($_POST["cpass"]);
            if ($Username == "") {
                $err .= "<li> Enter Your Name Please <li>";
            }
            if ($Phone == "") {
                $err .= "<li> Enter Your Phone Number Please <li>";
            }
            if ($email == "") {
                $err .= "<li> Enter Your Mail Please <li>";
            }
            if ($pass == "") {
                $err .= "<li> Enter Your Name Password <li>";
            }
            if ($pass != $cpass) {
                $err .= "<li> Your password not match <li>";
            }
            if (empty($err)) {
                $Cus_id = rand(1000, 999999);
                $verify_token = md5(rand());
                $sql = "Select * from users where Phone ='$Phone'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) == 0) {
                    $sql = "INSERT into users (Customer_ID,Username,Phone,email,pass,verify_token) values('$Cus_id','$Username','$Phone','$email','$pass', $verify_token)";
                    $sql_run = mysqli_query($conn, $sql);

                    if ($sql_run) {
                        sendemail_verify("$Username", "$email", "$verify_token");

                        $_SESSION['status'] = "Registration Sucessful!! Please check your Email to verify your Address";
                        header("Location: signup.php");
                    } else {
                        $_SESSION['status'] = "Registration fail for some error!! Please try again";
                        header("Location: signup.php");
                    }
                }
            } else {
                $err .= "<li>Your phone have been used before please use different phone number</li>";
            }
        }
    }

    ?>