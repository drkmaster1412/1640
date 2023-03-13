<?php
$err="";
$cat_id="";
$cat_name="";
$cat_role="";

if(isset($_POST["btnSubmit"])){
    $cat_id=isset($_POST["inputID"])?$_POST["inputID"]:"";
    $cat_name=isset($_POST["inputName"])?$_POST["inputName"]:"";
    $cat_name=isset($_POST["inputRole"])?$_POST["inputRole"]:"";

    if($cat_id==""){
        $err .="<li> Enter Category ID";
    }
    if($cat_name==""){
        $err .="<li> Enter Category Name";
    }
    if($cat_role==""){
        $err .="<li> Enter Category Name";
    }
    if(empty($err)){
        $sql="Select * from categories where cat_id = '$cat_id' or cat_name = '$cat_name' or cat_role = '$cat_role'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)==0){
            $sql="insert into categories(cat_id,cat_name,cat_role) values('$cat_id','$cat_name','$cat_nrole')";
            mysqli_query($conn,$sql);
            header("Location: $urladmin?page=$categories");           
        }else{
            $err .="<li>Duplicate</li>";
        }
    }
}
?>

<h3>Add New Category</h3>
<hr>
<ul style = "color:red">
    <?php    echo $err;    ?>
</ul>
<form method="post">
    <div class="form-row">
        <div class="from-group col-md-7">
            <label for="InputID">ID</label>
            <input type= "text" class="form-control" name="inputID" placeholder="ID" value="<?php echo "". isset($cat_id)?$cat_id:"";?>">
        </div>
    </div>
    <div class="form-row">
        <div class="from-group col-md-7">
            <label for="InputName">Name</label>
            <input type= "text" class="form-control" name="inputName" placeholder="Name" value="<?php echo "". isset($cat_name)?$cat_name:"";?>"></br>
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
            <input type ="submit" class= "btn btn-primary" name="btnSubmit" value="Submit">
            <input type ="button" class= "btn btn-primary" name="btnIgnore" value="Ignore" onclick="window.location='<?php echo '?page='.$categories; ?>'"/>
        </div>
    </div>
</form>