<?php
session_start();
include('login/dbcon.php');
if (!isset($_SESSION['user_name']) && !isset($_SESSION['user_uni_no'])) {
    header('Location:login/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" type="text/css" href="asset/css/styles.css">
    <link rel="icon" type="image/jpg" href="./image/favicon.jpg"/>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php include './nav.php'; ?>
    </div>
    <div style="margin: 3% 24% 5% 26%; width: 50%; font-family: 'Ubuntu'">
        <h2 align="center">Update Your Information</h2>
        <hr>
        <form action="accountmanage.php" method="POST" enctype="multipart/form-data">
            <?php

            $token = $_SESSION['user_uni_no'];
            $sql = "SELECT * FROM users WHERE verify_token ='$token'";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        //print_r($row['user_name']);
            ?>
                        <div class="form-group">
                            <input type="email" name="mail" class="form-control" readonly="readonly" value="<?php echo $row['email']; ?>">
                        </div>
                        <div class="form-group">
                            <?php
                            if ($row['anonymous_status'] == 1) {
                                echo '<input type="text" name="name" class="form-control" readonly="readonly" value=' . $row['u_name'] . ' required>';
                            } else {
                                echo '<input type="text" name="name" class="form-control"  value=' . $row['u_name'] . ' required>';
                            }
                            ?>

                        </div>
                        <!-- <img src="#" alt="Avatar" class="img-thumbnail mb-3"> -->

                        <div class="form-group">
                            <input type="submit" name="update" class="btn btn-primary" value="Update">
                            <input type="submit" name="anonymous_button" class="btn btn-success" value="<?php
                                                                                                        if ($row['anonymous_status'] == 0) {
                                                                                                            echo "Turn On Anonymous";
                                                                                                        } else {
                                                                                                            echo "Turn Off Anonymous";
                                                                                                        }
                                                                                                        ?>">
                        </div>

                        <div class="form-group">
                            <label>Wanna Change Password?</label>
                            <a href="http://localhost:8080/1640/login/manage_password.php" class="signUp">Change Your Password</a>
                        </div>

            <?php
                    }
                }
            }
            ?>
            <?php
            if (isset($_POST["update"])) {
                $Name = $_POST["name"];
                $avatar = $_POST["img"];
                $sql = "Update users set u_name='$Name', u_img='$avatar' where verify_token = '$token'";
                mysqli_query($conn, $sql);
                header("Location: hompage.php");
            }
            ?>
            <?php
            if (isset($_POST["anonymous_button"])) {
                $Name = $_POST["name"];
                $token = $_SESSION['user_uni_no'];
                $select_status = "SELECT * FROM users WHERE verify_token ='$token'";
                $result = mysqli_query($conn, $select_status);
                $row = mysqli_fetch_array($result);
                $status = $row['anonymous_status'];
                $u_name = $row['u_name'];
                $a_name = $row['anonymous_name'];

                if ($status == 0) {
                    $switch_name = $row['u_name'];
                    $sql = "Update users set anonymous_status = 1, u_name =' $a_name', anonymous_name='$u_name' where verify_token = '$token'";
                    mysqli_query($conn, $sql);
                    echo '<script type="text/javascript"> window.onload = function () { alert("Anomyous have been turn on"); } </script>';
                    echo "<meta http-equiv='refresh' content='0'>";
                } else {
                    $sql = "Update users set anonymous_status = 0, u_name = ' $a_name', anonymous_name='$u_name' where verify_token = '$token'";
                    mysqli_query($conn, $sql);
                    echo '<script type="text/javascript"> window.onload = function () { alert("Anomyous have been turn off"); } </script>';
                    echo "<meta http-equiv='refresh' content='0'>";
                }
            }
            ?>
        </form>
    </div>
    </div>
    <script type="text/javascript" src="assets/js/ajaxWork.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

</body>
<?php include './footer.php'; ?>
</html>