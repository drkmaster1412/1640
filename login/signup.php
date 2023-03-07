<?php
// require_once('dbcon.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Registration | PHP</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Noto+Sans+Mono:wght@500&family=Plus+Jakarta+Sans:wght@300&family=Poppins:ital,wght@0,200;0,300;0,500;0,800;1,300&family=Volkhov:wght@700&display=swap" rel="stylesheet">
</head>
<body>
<!-- <img src="./img/bg.png"> -->
<h3>Registration</h3>

<div class="form-wrapper">

	<form action="#" method="post">
		<div class="container">
			<!-- <p>Fill up the form with correct values.</p> -->
            <div class="form-items">
		    <input type="text" name="C_name" id="name" placeholder="Name"></input>
            </div>  
            <div class="form-items">
		    <input type="date" name="C_birth" id="date" placeholder="Date of Birth"></input>
            </div>  
            <div class="form-items">
		    <input type="number" name="C_phone" id = "phone" placeholder="Phone Number"></input>
            </div>  
            <div class="form-items">
		    <input type="text" name="mail" id="mail" placeholder="Email"></input>
            </div>   
            <div class="form-items">
		    <input type="password" name="pass" id = "pass" placeholder="Password"></input>
            </div>
            <div class="form-items">
		    <input type="password" name="cpass" id= "password" placeholder="Confirm Password"></input>
            </div> 
            <div class="button-panel">
		    <input type="submit" class="button" title="Sign up" name="btnsignup" value="Sign Up"></input>
            </div>
            </form>
			</div>
		</div>
</div>
	</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
</body>
<?php
$err="";
$Customer_Name="";
$Dateofbirth="";
$Phone="";
$mail="";
$pass="";
$cpass = "";
$usertype = "user";

if(isset($_POST["btnsignup"])){
    $Customer_Name=isset($_POST["C_name"])?$_POST["C_name"]:"";
    $Dateofbirth=isset($_POST["C_birth"])?$_POST["C_birth"]:"";
    $Phone=isset($_POST["C_phone"])?$_POST["C_phone"]:"";
    $mail=isset($_POST["mail"])?$_POST["mail"]:"";
    $pass= md5($_POST["pass"]) ;
    $cpass=md5($_POST["cpass"]);
    if($Customer_Name==""){
        $err .="<li> Enter Your Name Please <li>";
    }
    if($Dateofbirth==""){
        $err .="<li> Enter Your birthday Please <li>";
    }
    if($Phone==""){
        $err .="<li> Enter Your Phone Number Please <li>";
    }
    if($mail==""){
        $err .="<li> Enter Your Mail Please <li>";
    }
    if($pass==""){
        $err .="<li> Enter Your Name Password <li>";
    }
    if($pass!=$cpass){
        $err .="<li> Your password not match <li>"; 
    }
    if(empty($err)){
        $Cus_id = rand(1000,999999);
        $sql="Select * from customer where Phone ='$Phone' and mail = '$mail'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)==0){
            $sql="insert into customer (Customer_ID,Customer_Name,DoB,Phone,mail,pass,usertype) values('$Cus_id','$Customer_Name','$Dateofbirth','$Phone','$mail','$pass','$usertype')";
            mysqli_query($conn,$sql);  
            header("Location:$urllogin");        
        }         
            }else{
            $err .="<li>Duplicate</li>";
        }
    }
?>
