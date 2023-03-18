<?php
require_once ('connection.php');
?>





<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>



<h3 class="col-md-7">Add New Category</h3>
<hr>

<form method="post">
    <div class="from-group col-md-7">
        <label for="InputName">Name</label>
        <input required type="text" class="form-control" name="inputName" placeholder="Name" value="<?php echo "" . isset($cat_name) ? $cat_name : ""; ?>"></br>
    </div>
    <div class="form-group col-md-7">
        <input type="submit" class="btn btn-success" name="btn_Submit" value="Submit"/>
        <input type="ignore" class="btn btn-danger" name="btnIgnore" value="Ignore" onclick="window.location='<?php echo 'category.php'; ?>'"/>
    </div>
</form>
<?php
$err="";
$name="";
    if (isset($_POST['btn_Submit'])) {
        $cat_name = $_POST["inputName"];
        $sql = "INSERT INTO categories (cat_name) VALUES ('$cat_name')";
        $sql_run = mysqli_query($conn, $sql);
    }
    if($name==""){
        $err .="<li> Enter Category Name";
    }
    if(empty($err)){
        $sql="SELECT * FROM categories WHERE cat_name = '$cat_name'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)==0){
            $sql="INSERT INTO categories(cat_name) VALUE($cat_name')";
            mysqli_query($conn,$sql);
            header("Location: $urladmin?page=$categories");           
        }else{
            $err .="<li>Duplicate</li>";
        }
    }
?>

