<?php
session_start();
//include('login/session.php');

include('login/dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">

<body>
    <div align="center">
        <hr>
        <h3>Update profile</h3>
        <hr>
        <form action="staff_profile.php" method="POST" enctype="multipart/form-data">
            <?php

            $currentname = $_SESSION['user_name'];
            $sql = "SELECT * FROM users WHERE u_name ='$currentname'";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        //print_r($row['user_name']);
            ?>
                        <div class="form-group col-sm-7">
                            <input type="text" name="u_name" class="form-control" value="<?php echo $row['u_name']; ?>"></br>
                        </div>
                        <div class="form-group col-sm-7">
                            <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>"></br>
                        </div>
                        <!-- <div class="form-group col-sm-7">
                                            <input type="text" name="Cus_Phone" class="form-control" value="<?php echo $row['Cus_Phone']; ?>"></br>
                                        </div>                   -->
                        <div class="form-group col-sm-7">
                            <input type="submit" name="update" class="btn btn-outline-dark mt-auto" value="Update">
                            <input type="button" name="cancel" class="btn btn-outline-dark mt-auto" value="Ignore" onclick="window.location='<?php echo $urluser; ?>'">
                        </div>

            <?php

                    }
                }
            }
            ?>
            <?php
            $err = "";
            if (isset($_POST["update"])) {
                $staff_name = $_POST["u_name"];
                $staff_email = $_POST["email"];
                // $staff_phone=$_POST["u_phone"];
                if ($staff_name == "") {
                    $err .= "<li> Enter  name </li>";
                }
                if ($staff_email == "") {
                    $err .= "<li> Enter email </li>";
                }
                // if($staff_phone==""){
                //     $err .="<li> Enter phone numbers </li>";
                // }

                if (empty($err)) {
                    $sql = "UPDATE users SET u_name='$staff_name',  email='$staff_email', where u_name = '$currentname'";
                    mysqli_query($conn, $sql);
                    header("Location: $urllogin/$logout");
                }
            }
            ?>
        </form>
    </div>
    </div>
    </div>
</body>

</html>