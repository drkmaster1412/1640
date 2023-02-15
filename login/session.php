<?php
//Start session
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['Customer_id']) || (trim($_SESSION['Customer_id']) == '')) {
    header("location: login.php");
    exit();
}


?>