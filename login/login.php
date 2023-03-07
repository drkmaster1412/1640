
<?php session_start(); ?>
<?php include_once('dbcon.php');
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Noto+Sans+Mono:wght@500&family=Plus+Jakarta+Sans:wght@300&family=Poppins:ital,wght@0,200;0,300;0,500;0,800;1,300&family=Volkhov:wght@700&display=swap" rel="stylesheet">
</head>
<body class="bg">
	<!-- <img src="./img/bg.png"> -->
	<h3>Login here</h3>

<div class="form-wrapper">
  
  <form action="#" method="post">
	
    <div class="form-item">
		<input type="text" name="email" required="required" placeholder="Email" autofocus required></input>
    </div>
    
    <div class="form-item">
		<input type="password" name="pass" required="required" placeholder="Password" required></input>
    </div>
    
    <div class="button-panel">
		<input type="submit" class="button" title="Log In" name="btnlogin" value="Login"></input>
    </div>
  </form>
  <?php

if(isset($_POST["btnlogin"]))
{
	$username=$_POST["mail"];
	$password=$_POST["pass"];

	$md5password= md5($password);
	$sql="select * from users where email='".$username."' AND pass='".$md5password."'";

	$result=mysqli_query($conn,$sql);

	while($row=mysqli_fetch_array($result)){

	if($row["usertype"]=="user")
	{	
		$_SESSION["user"]=$username;
		
		$_SESSION["name"]=$row["Username"];
		header("location:$urluser?page=$home");
	}

	elseif($row["usertype"]=="admin")
	{

		$_SESSION["user"]=$username;
		$_SESSION["type"]=$row["usertype"];
		$_SESSION["name"]=$row["Username"];
		header("location:$urladmin");
	}

	else
	{
		echo "<script>alert('Email or password error');</script>";
	}

}
}
?>
  <div class="reminder">
  <p class="member">Not a member? <a href="http://localhost:8012/1640/login/signup.php" class="signUp">Sign up now</a></p>
	<p class="member">Forgot Your password?<a href=" <?php echo $urllogin."/password_reset.php";?>" class="signUp">Forgot password</a></p>
	<p class="member">Did not Recived a verify email? <a href=" <?php echo $urllogin."/resendemail_verification.php";?>" class="signUp">Resend verify email</a></p>
  </div>
  
</div>

</body>
</html>