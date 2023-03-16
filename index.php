<?php
$urladmin = "http://localhost/1640/admin";
$homepage = "homepage.php";
// $about = "about.php";
$footer = "";
$urluser = "http://localhost/1640/";
$urllogin = "http://localhost/1640/login";
$signup = "signup.php";
$logout = "logout.php";
$amanage = "accountmanage.php";
$search = "search.php";
$post = "COMMENT/post.php";

session_start();
include('./theme.php');
?>
<?php echo file_get_contents("header.php"); ?>
<?php echo file_get_contents("footer.php"); ?>
