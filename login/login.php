
<?php session_start(); ?>
<?php //include('dbcon.php');
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="styleLogin.css">
</head>
<body class="bg">
<div class="form-wrapper">
  
  <form action="#" method="post">
    <h3>Login here</h3>
	
    <div class="form-item">
		<input type="text" name="mail" required="required" placeholder="Email" autofocus required></input>
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
	$sql="select * from customer where mail='".$username."' AND pass='".$md5password."'";

	$result=mysqli_query($conn,$sql);

	while($row=mysqli_fetch_array($result)){

	if($row["usertype"]=="user")
	{	
		$_SESSION["user"]=$username;
		
		$_SESSION["name"]=$row["Customer_Name"];
		header("location:$urluser?page=$home");
	}

	elseif($row["usertype"]=="admin")
	{

		$_SESSION["user"]=$username;
		$_SESSION["type"]=$row["usertype"];
		$_SESSION["name"]=$row["Customer_Name"];
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
    <p>Not a member? <a href=" <?php echo $urllogin."/".$signup;?>">Sign up now</a></p>
    <p><a href="#">Forgot password?</a></p>
  </div>
  
</div>

</body>
</html>