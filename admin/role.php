<?php

include('connection.php');

?>

<?php

$msg="";
if(isset($_POST['submit']))
{
    $email = $_POST['mail'];
    $role = $_POST['roles'];
    $sql = "SELECT * FROM users WHERE email='{$email}'";

    $sql_run = mysqli_query($conn,$sql);

    if(mysqli_num_rows($sql_run)>0)
    {
        $update_role = "UPDATE users SET roles = '{$role}' WHERE email = '{$email}'";
        $update_role_run = mysqli_query($conn,$update_role);

        if($update_role_run)
        {
            $msg = "<div class='alert alert-info'>The role of $email have been setted.</div>";
        }
        else
        {
            $msg = "<div class='alert alert-info'>Can't Set the email: $email as $role.</div>";
        }
    }
    else
        {
            $msg = "<div class='alert alert-info'>Email Not Found.</div>";
        }
}




?>




<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Roles</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Login Form" />
    <!-- //Meta tag Keywords -->

    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!--/Style-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <!--//Style-CSS -->

    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>

</head>

<body>

    <!-- form section start -->
    <section class="w3l-mockup-form">
        <div class="container">
            <!-- /form -->
            <div class="content-wthree">
            <table class="table table-hover table-inverse table-responsive col-md-12">
            <thead class="thead-inverse">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>

            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM users";
        $results = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($results)) {
        ?>
            <tr>
                <td scope="row"><?php echo $row['u_name'] ?></td>
                <td scope="row"><?php echo $row['email'] ?></td>
                <td scope="row">
                <?php 
                switch($row['roles'])
                {
                    case "0":
                        echo "staff";
                        break;
                    case "1":
                        echo "admin";
                        break;
                    case "2":
                        echo "qa";
                        break;

                } 
                ?>
                </td>

                <td>
                    <a href="<?php echo $urladmin . '?page=role_edit.php&u_id=' . $row['u_id']; ?>">
                    <span class="material-icons">Edit</span>     
                  
            </a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
    <p>Back to! <a href="index.php">Admin Page</a>.</p>  
</table>
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
    </section>
    <!-- //form section start -->

    <script src="js/jquery.min.js"></script>
    <script>
        $(document).ready(function(c) {
            $('.alert-close').on('click', function(c) {
                $('.main-mockup').fadeOut('slow', function(c) {
                    $('.main-mockup').remove();
                });
            });
        });
    </script>

</body>

</html>