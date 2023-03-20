<?php
session_start();
    //Connection
    $host = "localhost";
    $username="root";
    $password="";
    $db= "btwev";
    $conn = mysqli_connect($host,$username,$password,$db) or die("Can not connect database ".mysqli_connect_error());



    $token = $_SESSION['user_uni_no'];
    $role = "SELECT roles FROM users WHERE verify_token='$token'";
    $role_run = mysqli_query($conn,$role);
    if(mysqli_fetch_array($role_run) == "3"){
        $urladmin ="http://localhost:/1640/admin/";
        $urluser = "http://localhost:/1640/";
        $home = "home.php";
        // $categories = "category.php";
        // $categoryEdit = "category_edit.php"; 
        // $categoryDelete = "category_delete.php"; 
        $post = "post.php";
        $postEdit = "post_edit.php"; 
        $postDelete = "post_delete.php";
        $urllogin = "http://localhost:/1640/login";
        include('./theme.php');
    }
    else
    {
        echo '<script type="text/javascript"> window.onload = function () { alert("You Not Allow To access to this Page!!!"); } </script>';
        header('Location:../homepage.php');
    }






?>
