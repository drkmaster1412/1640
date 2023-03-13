<h4><small>Edit Category</small></h4>
<hr>

<?php
$err="";
$cat_id="";
$cat_name="";
$cat_role="";

if(isset($_POST["btnUpdate"])){
    $cat_id=isset($_POST["inputID"])?$_POST["inputID"]:"";
    $cat_name=isset($_POST["inputName"])?$_POST["inputName"]:"";
    $cat_name=isset($_POST["inputRole"])?$_POST["inputRole"]:"";

    if($cat_id==""){
        $err .="<li> Enter Category ID";
    }
    if($cat_name==""){
        $err .="<li> Enter Category Name";
    }
    if(empty($err)){

            $sql="update categories set Cat_Name='$cat_name' where cat_id='$cat_id' ";
            mysqli_query($conn,$sql);
            header("Location: $urladmin?page=$categories");           

    }
}else{
    if(isset($_GET["cat_id"])){
        $cat_id="";
        $cat_name="";
        $sql= "select * from categories where cat_id=".$_GET["cat_id"];
        $results = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_array($results)){
            $cat_id= $row['cat_id'];
            $cat_name= $row['cat_name'];
            $cat_role= $row['cat_role'];


        }
    }
}
?>

<ul style = "color:red">
    <?php    echo $err;    ?>
</ul>
<form method="post">
    <div class="form-row">
        <div class="from-group col-md-7">
            <label for="InputID">ID</label>
            <input type= "text" class="form-control" name="inputID" placeholder=" " readonly="true" value="<?php echo "". isset($cat_id)?$cat_id:"";?>">
        </div>
    </div>
    <div class="form-row">
        <div class="from-group col-md-7">
            <label for="InputName">Name</label>
            <input type= "text" class="form-control" name="inputName" placeholder=" " value="<?php echo "". isset($cat_name)?$cat_name:"";?>"></br>
        </div>
    </div>
    <div class="form-group col-sm-7">
        <label for="">Role</label>
        <select class="form-control" name="cat_id" id="">
              <?php
              $sql = "select *from categories";
              $results = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_array($results)) {
              ?>
            <option value = "<?php echo $row ['cat_id'] ?>"><?php echo $row['cat_name']?></option>
            <?php
              }
            ?>
        </select>
    </div>
    <div class="form-row col-md-7">
        <div class="from-group col md-12">
            <input type ="submit" class= "btn btn-primary" name="btnUpdate" value="Update">
            <input type ="button" class= "btn btn-primary" name="btnIgnore" value="Ignore" onclick="window.location='<?php echo '?page='.$categories; ?>'"/>
        </div>
    </div>
</form>