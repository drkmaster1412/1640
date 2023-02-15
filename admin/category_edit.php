<h4><small>Edit Category</small></h4>
<hr>
<?php
$err="";
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
            $sql="Update category set cat_name='$name' where cat_id = '$id' ";
            mysqli_query($conn,$sql);
            header("Location: $urladmin?page=$category");           

        }
    }
    else {
        if(isset($_GET["id"])){
            $id="";
            $name="";
            $sql="select * from category where cat_id = '".$_GET["id"]."'";
            $results = mysqli_query($conn,$sql);
            while ($row = mysqli_fetch_array($results)){
                $id = $row['cat_id'];
                $name = $row['cat_name'];
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
            <input type ="submit" class= "btn btn-success" name="btnSubmit" value="Save">
            <input type ="button" class= "btn btn-primary" name="btnIgnore" value="Ignore" onclick="window.location='<?php echo '?page='.$category; ?>'"/>
        </div>
    </div>
</form>

