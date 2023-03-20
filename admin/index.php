<?php
    $urladmin ="http://localhost:/1640/admin/";
    $urluser = "http://localhost:/1640/";
    $home = "home.php";
    // $categories = "category.ph
    // $categoryEdit = "category_.php"; 
    // $categoryDelete = "categorlete.php"; 
    $post = "post.php";
    $postEdit = "post_edit.php";
    $postDelete = "post_delete.ph

    $urllogin = "http://localhost0/1640/login";

    //Connection
    $host = "localhost";
    $username="root";
    $password="";
    $db= "btwev";
    $conn = mysqli_connect($host,$username,$password,$db) or die("Can not connect database ".mysqli_connect_error());

    include('./theme.php');


?>
