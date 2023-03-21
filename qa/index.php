<?php
$urladmin = "http://localhost/1640/qa/";
$urluser = "http://localhost/1640/";
$home = "home.php";
$categories = "category.php";
$categoryEdit = "category_edip";
$categoryDelete = "category_de.php";
$post = "post.php";
$postEdit = "post_edit.php";
$postDelete = "post_delete.php";

$urllogin = "http://localhost/1640/login";

//Connection
$host = "localhost";
$host = "localhost";
$username = "root";
$password = "";
$db = "btwev";
$conn = mysqli_connect($host, $username, $password, $db) or die("Can not connect database " . mysqli_connect_error());

include('./theme.php');


?>