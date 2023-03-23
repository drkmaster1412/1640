<!-- Navigation-->

<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="container px-4 px-lg-5">

        <a class="navbar-brand" href="<?php echo " ?page=" . $homepage; ?>">Bt Shop</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">

                <li class="nav-item"><a class="nav-link active" aria-current="page"
                        href="<?php echo " ?page=" . $homepage; ?>">Home</a></li>

                <li class="nav-item"><a class="nav-link" href="<?php echo " ?page=" . $about; ?>">About</a></li>



            </ul>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item dropdown">
                    <!-- <div class="user-area">
                        <img src="Images/User/<?php echo $sel_user_img['u_image']; ?>" alt="User Image">
                    </div> -->
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">Welcome <?php
                        if (isset($_SESSION['user']) != "")
                            echo $_SESSION['u_name'];
                        else
                            echo "guest";
                        ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                        if (isset($_SESSION['user']) == "") {
                            ?>
                            <li class="dropdown-item"><a class="nav-link" href="<?php echo "login/login.php"; ?>">Login</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href=" <?php echo $urllogin . "/" . $signup; ?>">Register</a></li>
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
            </ul>



        </div>
    </div>
</nav>