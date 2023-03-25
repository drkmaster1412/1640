<?php
$urladmin = "http://localhost:8080/1640/qa/";
$urluser = "http://localhost:8080/1640/";

$user_agreement = "user_agreement.php";
$policy = "policy.php";
$POST = "http://localhost:8080/1640/COMMENT/post.php";
$postView = "post_view.php";
$logout = "http://localhost:8080/1640/login/logout.php";
$urllogin = "http://localhost:8080/1640/login";
$post = "post.php";
//Connection
$host = "localhost";
$username = "root";
$password = "";
$db = "btwev";
$conn = mysqli_connect($host, $username, $password, $db) or die("Can not connect database " . mysqli_connect_error());

include('./theme.php');