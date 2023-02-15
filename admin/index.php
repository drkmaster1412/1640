<?php
    $urladmin ="http://localhost/Assignment1640/admin";
    $urluser = "http://localhost/Assignment1640/";
    $home = "home.php";
    $category = "category.php";
    $categoryEdit = "category_edit.php"; 
    $categoryDelete = "category_delete.php";
    $customer="customer.php";
    //Connection
    $host = "localhost";
    $username="root";
    $password="";
    $db= "as2";
    $conn = mysqli_connect($host,$username,$password,$db) or die("Can not connect database ".mysqli_connect_error());

    include('./theme.php');
?>

