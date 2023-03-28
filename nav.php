<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f124118c9b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="1640/COMMENT/CSS/Stylesheet.css">
</head>

<style>
    .nav-list {
        list-style: none;
        display: flex;
    }

    .strong {

        font-weight: 500;
        color: #00bcd4;
        margin: 5%;
    }

    .size {
        font-size: 20;
    }
</style>


<div class="container mt-2 mb-2 " style="background-color:#e9ecef">
    <nav class="navbar navbar-expand-lg  ">
        <a class=" text" href="#" style="color:#00bcd4"><b><img src="image/Logo.png" align="center" width="25%"
                    height="auto" alt="logo"></b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="nav-list strong">
                <li class="nav-item" style="margin-left: -15%;">
                    <a class="nav-link size" href="http://localhost:8080/1640/homepage.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link size" href="<?php echo "http://localhost:8080/1640/COMMENT/post.php?page=1" ?>">Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link size" href="<?php echo "http://localhost:8080/1640/accountmanage.php" ?>">Account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link size" href="<?php echo $logout; ?>"><i class="fas fa-power-off fa-2x"></i></a>
                </li>
            </ul>
            <!-- <form class=" " style="margin-right: 55px;">
                <div class="user-area">
                    <img src="/1640/image/<?php echo $sel_user_img['u_image']; ?>" alt="User Image">
                </div>
                <p href="logout.php" class="logout my-2 my-sm-0"><i class="fas fa-power-off fa-2x"></i></p>
            </form> -->
        </div>
    </nav>
</div>




<!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Welcome
            <?php
            if (isset($_SESSION['user']) != "")
                echo $_SESSION['name'];
            else
                echo "guest";
            ?>
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php
            if (isset($_SESSION['user']) == "") {
                ?>
                <li class="dropdown-item"><a class="nav-link" href="login/login.php">Login</a></li>
                <hr>
                <li class="dropdown-item"><a class="nav-link" href=" <?php echo $urllogin . "/" . $signup; ?>">Register</a>
                </li>
                <?php
            }
            ?>
            <?php
            if (isset($_SESSION['user']) != "" && isset($_SESSION['type']) != "admin") { ?>
                <li><a class="dropdown-item" href="<?php echo " ?page=" . $amanage; ?>">Account manage </a></li>
                <li><a class="dropdown-item" href=" <?php echo $urllogin . "/" . $logout; ?>">Logout</a></li>
                <?php
            }
            ?>
            <?php
            if (isset($_SESSION['user']) == "admin" && isset($_SESSION['type']) == "admin") { ?>
                <li><a class="dropdown-item" href="<?php echo $urladmin; ?>">Admin </a></li>
                <li><a class="dropdown-item" href=" <?php echo $urllogin . "/" . $logout; ?>">Logout</a></li>
                <?php
            }
            ?>
        </ul>
    </li>
</ul>
</ul> -->
</nav>
</body>

</html>