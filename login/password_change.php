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
            <h3>Password Change</h3>
            <!-- <p>Fill up the form with correct values.</p> -->
            <div class="form-items">

                <input type="hidden" value="<?php if(isset($_GET['token'])){echo $_GET['token'];} ?>">
                <label>Email</label>
                <input type="text" name="email" id="email" value="<?php if(isset($_GET['email'])){echo $_GET['email'];} ?>"placeholder="Old Password"></input>
                <label>New Password</label>
                <input type="text" name="newpassword" id="newpassword" placeholder="New Password"></input>
                <label>Confirm Your Password</label>
                <input type="text" name="confirmpassword" id="confirmpassword" placeholder="Confirm Your Password"></input>


                <div class="button-panel">
                    <input type="submit" class="button" title="Password Update" name="password_update_btn" value="Password Update"></input>
                </div>
    </form>
</div>

<?php

if(isset($_POST['password_update_btn']))
{
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $newpassword = mysqli_real_escape_string($conn,$_POST['newpassword']);
    $confirmpassword = mysqli_real_escape_string($conn,$_POST['confirmpassword']);

    $token = mysqli_real_escape_string($conn,$_POST['password_token']);

    if(!empty($token))
    {
        if(!empty($email) && !empty($newpassword) && !empty($confirmpassword) )
        {
            $check_token = "SELECT verify_token FROM users WHERE verify_token='$token' LIMIT 1";
            $check_token_run = mysqli_query($conn, $check_token);
            if(mysqli_num_rows($check_token_run)>0)
            {
                if($newpassword==$confirmpassword)
                {
                    $update_password = "UPDATE users SET password='$newpassword' WHERE verify_token='$token' LIMIT 1";
                    $update_password_run = mysqli_query($conn,$update_password);

                    if($update_password_run)
                    {
                        $newtoken = md5(rand())."funda";
                        $update_newtoken = "UPDATE users SET verify_token='$newtoken' WHERE verify_token='$token' LIMIT 1";
                        $update_newtoken_run = mysqli_query($conn,$update_newtoken);
                        $_SESSION['status'] = "New Password Successfully updated";
                        header("location: login.php");
                        exit(0);
                    }
                    else
                    {
                        $_SESSION['status'] = "Couldn't Update Password!! Something went wrong!!";
                        header("location: password_change.php?token=$token&email=$email");
                        exit(0);
                    }
                }
                else
                {
                    $_SESSION['status'] = "Password Confirm does not match!!";
                    header("location: password_change.php?token=$token&email=$email");
                    exit(0);
                }
            }
            else
            {
                $_SESSION['status'] = "Invalid Token!!";
                header("location: password_change.php?token=$token&email=$email");
                exit(0);
            }
        }
        else
        {
            $_SESSION['status'] = "All data must be fulfill";
            header("location: password_change.php?token=$token&email=$email");
            exit(0);
        }
    }
    else
    {
        $_SESSION['status'] = "Could not find token";
        header("location: password_change.php");
        exit(0);
    }
}
?>