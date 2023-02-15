
<?php
$err="";
$id="";
$name="";
if(isset($_POST["btnSubmit"])){
    $id=isset($_POST["inputID"])?$_POST["inputID"]:"";
    $name=isset($_POST["inputName"])?$_POST["inputName"]:"";
    if($id==""){
        $err .="<li> Enter Category ID";
    }
    if($name==""){
        $err .="<li> Enter Category Name";
    }
    if(empty($err)){
        $sql="Select * from category where cat_id = '$id' or cat_name = '$name'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)==0){
            $sql="insert into category(cat_id,cat_name) values('$id','$name')";
            mysqli_query($conn,$sql);
            header("Location: $urladmin?page=$category");           
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
    <div class="form-row" >
        <div class="from-group col-md-7">
            <label for="InputID">ID</label>
            <input type= "text" class="form-control" name="inputID" placeholder="ID" value="<?php echo "". isset($id)?$id:"";?>">
        </div>
    </div>
    <div class="form-row">
        <div class="from-group col-md-7">
            <label for="InputName">Name</label>
            <input type= "text" class="form-control" name="inputName" placeholder="Name" value="<?php echo "". isset($name)?$name:"";?>">
        </div>
    </div>
    <div class="form-row">
        <div class="from-group col-md-12">
            <input type ="submit" class= "btn btn-success" name="btnSubmit" value="Submit">
            <input type ="button" class= "btn btn-primary" name="btnIgnore" value="Ignore" onclick="window.location='<?php echo '?page='.$category; ?>'"/>
        </div>
    </div>
</form>
