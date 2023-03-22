<?php
require_once ('connection.php');

?>

<h4><small>Edit Category</small></h4>
<hr>
<form method="post">
    <div class="form-row">
        <div class="from-group col-md-7">
            <label for="InputName">Name</label>
            <input type= "text" class="form-control" name="inputName" placeholder=" " value="<?php echo "". isset($cat_name)?$cat_name:"";?>"></br>
        </div>
    </div>
    <div class="form-row col-md-7">
        <div class="from-group col md-12">
            <input type ="submit" class= "btn btn-primary" name="btnUpdate" value="Update">
            <input type ="button" class= "btn btn-primary" name="btnIgnore" value="Ignore" onclick="window.location='<?php echo '?page='.$categories; ?>'"/>
        </div>
    </div>
</form>

<?php
$err="";
$cat_name="";
$cat_id="";
if(isset($_POST["btnUpdate"])){
    $cat_name=isset($_POST["inputName"])?$_POST["inputName"]:"";

    if($cat_name==""){
        $err .="<li> Enter Category Name";
    }
    if(empty($err)){

            $sql="UPDATE categories SET cat_name='$cat_name' WHERE cat_id='$cat_id' ";
            mysqli_query($conn,$sql);
            header("Location: $urladmin?page=$categories");           

    }
}else{
    if(isset($_GET["cat_id"])){
        $cat_name="";
        $sql= "SELECT * FROM categories WHERE cat_id=".$_GET["cat_id"];
        $results = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_array($results)){
            $cat_name= $row['cat_name'];
        }
    }
}
?>