<?php
$urladmin = "http://localhost:8080/1640/qa/";
$urluser = "http://localhost:8080/1640/";

$account = "accountmanage.php";
$policy = "policy.php";
$postView = "post_view.php";
$logout = "http://localhost:8080/1640/login/logout.php";
$urllogin = "http://localhost:8080/1640/login";
$POSTS = "COMMENT/?page=post.php";
$post = "post.php";
$postAdd = "post_add.php";
$homepage = "homepage.php";
//Connection
$host = "localhost";
$username = "root";
$password = "";
$db = "btwev";
$conn = mysqli_connect($host, $username, $password, $db) or die("Can not connect database " . mysqli_connect_error());

include('./theme.php');