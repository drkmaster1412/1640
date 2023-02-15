<?php
require_once('dbcon.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Registration | PHP</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div>
	<?php
	
	?>	
</div>

<div>
	<form action="#" method="post">
		<div class="container">
			<h3>Registration</h3>
			<p>Fill up the form with correct values.</p>
            <div class="form-items">
		    <input type="text" name="C_name" id="" placeholder="Name"></input>
            </div>  
            <div class="form-items">
		    <input type="date" name="C_birth" id="" placeholder="Date of Birth"></input>
            </div>  
            <div class="form-items">
		    <input type="number" name="C_phone" id = "" placeholder="Phone Number"></input>
            </div>  
            <div class="form-items">
		    <input type="text" name="mail" id="" placeholder="Email"></input>
            </div>   
            <div class="form-items">
		    <input type="password" name="pass" id = "" placeholder="Password"></input>
            </div>
            <div class="form-items">
		    <input type="password" name="cpass" id= "" placeholder="Confirm Password"></input>
            </div> 
            <div class="button-panel">
		    <input type="submit" class="button" title="Sign up" name="btnsignup" value="signup"></input>
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
