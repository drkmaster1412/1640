<?php
session_start();
include('login/dbcon.php');
if(!isset($_SESSION['user_name']) && !isset($_SESSION['user_uni_no'])){
    header('Location:login/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
    <link rel="stylesheet" type="text/css" href="asset/css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div align="center">
       <hr>
            <h3>Update User Information</h3>
       <hr>
                <form action="accountmanage.php"
                      method="POST"
                      enctype="multipart/form-data"
                >
                    <?php
                        


                        $token = $_SESSION['user_uni_no'];
                        $sql = "SELECT * FROM users WHERE verify_token ='$token'";

                        $result = mysqli_query($conn,$sql);

                        if($result){
                            if(mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_array($result)){
                                    //print_r($row['user_name']);
                                    ?>
                                        <div class="form-group col-sm-7">
                                            <input type="email" name="mail" class="form-control" readonly="readonly" value="<?php echo $row['email']; ?>">
                                        </div>  
                                        <div class="form-group col-sm-7">
                                            <input type="text" name="name" class="form-control" value="<?php echo $row['u_name']; ?>" required>
                                        </div>
                                        <div class="form-group col-sm-7">
                                            <input type="file" name="img" class="form-control" value="<?php echo $row['u_img']; ?>">
                                        </div>
                   
                                        <div class="form-group col-sm-7">
                                            <input type="submit" name="update"  class="btn btn-primary" value="Update">
                                            <input type="button" name="cancel"  class="btn btn-primary" value="Ignore">
                                        </div>

                                        <div class="form-group col-sm-7">
                                            <label>Wanna Change Password?</label>
                                            <a href="http://localhost/1640/login/manage_password.php" class="signUp">Change Your Password</a>
                                        </div>

                                    <?php
                                }
                            }
                        }
                    ?>
                    <?php 
                    $err="";
                    if(isset($_POST["update"])){
                        $Name=$_POST["name"];
                        $avatar = $_POST["img"];
                            $sql="Update users set name='$Name', u_img='$avatar' where verify_token = '$token'";
                            mysqli_query($conn,$sql);
                            header("Location: hompage.php");      
                        }
                    ?>
                
                </form>
            </div>
            
        </div>


    </div>
    
</body>
</html>