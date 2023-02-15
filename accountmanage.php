<?php
session_start();
include('login/dbcon.php');
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
                        $currentUser = $_SESSION['name'];
                        $sql = "SELECT * FROM customer WHERE Customer_Name ='$currentUser'";

                        $result = mysqli_query($conn,$sql);

                        if($result){
                            if(mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_array($result)){
                                    //print_r($row['user_name']);
                                    ?>
                                        <div class="form-group col-sm-7">
                                            <input type="text" name="Customer_Name" class="form-control" value="<?php echo $row['Customer_Name']; ?>">
                                        </div>
                                        <div class="form-group col-sm-7">
                                            <input type="email" name="mail" class="form-control" value="<?php echo $row['mail']; ?>">
                                        </div>    
                                        <div class="form-group col-sm-7">
                                            <input type="date" name="DoB" class="form-control" value="<?php echo $row['DoB']; ?>">
                                        </div> 
                                        <div class="form-group col-sm-7">
                                            <input type="text" name="Phone" class="form-control" value="<?php echo $row['Phone']; ?>">
                                        </div>                    
                                        <div class="form-group col-sm-7">
                                            <input type="submit" name="update"  class="btn btn-primary" value="Update">
                                            <input type="button" name="cancel"  class="btn btn-primary" value="Ignore">
                                        </div>

                                    <?php
                                }
                            }
                        }
                    ?>
                    <?php 
                    $err="";
                    if(isset($_POST["update"])){
                        $Customer_Name=$_POST["Customer_Name"];
                        $mail=$_POST["mail"];
                        $DoB=$_POST["DoB"];
                        $Phone=$_POST["Phone"];
                    if($Customer_Name==""){
                        $err .="<li> Enter customer name </li>";
                    }
                    if($mail==""){
                        $err .="<li> Enter mail please </li>";
                    }
                    if($DoB==""){
                        $err .="<li> Enter your birthday please </li>";
                    }
                
                    if(empty($err)){
                            $sql="Update customer set Customer_Name='$Customer_Name', mail='$mail', DoB='$DoB', Phone='$Phone' where Customer_Name = '$currentUser'";
                            mysqli_query($conn,$sql);
                            header("Location: $urllogin/$logout");  
                            }         
                        }
                    ?>
                
                </form>
            </div>
            
        </div>


    </div>
    
</body>
</html>