<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon-->
    <!-- Bootstrap icons-->
    <link rel="icon" type="image/x-icon" href="asset/images/favicon.ico" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../admin/assets/css/style.css">

    <title>Admin</title>
</head>

<body>

    <div class="sidebar" id="mySidebar" style="width: 250px;">
        <a class="logo" href=" ?page=home.php">
            <img src="../image/Logo.png" align="center" width="95%" height="auto" alt="logo">
        </a>
        <div class="side-header">
            <h5 style="margin-top:10px;">Hello, QA</h5>
        </div>

        <hr style="border:1px solid; background-color:#8a7b6d; border-color:#3B3131;">
        <!-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a> -->
        <a href="?page=post.php"><i class="fa fa-th-large"></i> Post</a>
        <a href="?page=statistic.php"><i class="fa fa-users"></i> Statistic</a>

        <!---->
    </div>
    <!--Footer-->
    <!-- Bootstrap core JS-->
    <script type="text/javascript" src="assets/js/ajaxWork.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>