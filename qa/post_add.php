
<h3>Add New post</h3>
<hr>

<?php
$err="";
$p_id="";
$p_name="";
$p_text="";
$p_image="";
$p_uni_no="";
$p_file="";
$p_cat="";


if(isset($_POST["btnSubmit"])){
    $p_id=isset($_POST["p_id"])?$_POST["p_id"]:"";
    $p_name=isset($_POST["p_name"])?$_POST["p_name"]:"";
    $p_text=isset($_POST["p_text"])?$_POST["p_text"]:"";
    $p_image=isset($_POST["p_image"])?$_POST["p_image"]:"";
    $p_uni_no=isset($_POST["p_uni_no"])?$_POST["p_uni_no"]:"";
    $p_id=isset($_POST["p_cat"])?$_POST["p_cat"]:"";

    if($p_id==""){
        $err .="<li> Enter post ID";
    }
    if($p_name==""){
        $err .="<li> Enter post name";
    }
    if($p_text==""){
        $err .="<li> Enter post description";
    }
    if($p_image==""){
        $err .="<li> Choose images";
    }
    if($p_uni_no==""){
        $err .="<li> Enter post no";
    }

    if(empty($err)){
        $sql ="Select * from poster where p_id = '$p_id' ";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)==0){

            $sql="insert into poster(p_id, p_name, p_image, p_text, p_uni_no, p_file, p_cat) value('$p_id', '$p_name', '$p_image', '$p_text' , '$p_uni_no'  , '$p_file' , '$p_cat')";
            mysqli_query($conn,$sql);
            header("Location: $urladmin?page=$post");           
        }else{
            $err .="<li>Duplicate</li>";
        }
    }
}
?>

<ul style = "color:red">
    <?php  echo $err;    ?>
</ul>



<form method="post" enctype="multipart/form data">
    <div class="row">
        <div class="form-group col-sm-7">
          <label for="">ID</label>
          <input type="text" name="p_id" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>

        <div class="form-group col-sm-7">
          <label for="">Name</label>
          <input type="text" name="p_name" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>

        <div class="form-group col-sm-7">
          <label for="">Description</label>
          <input type="text" name="p_text" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>

        <div class="form-group col-sm-7">
        <label for="">Images</label>
        <input type="file" class="form-control-file" name="p_image" id="" placeholder="" aria-describedby="fileHelpId">
        </div>

        <div class="form-group col-sm-7">
          <label for="">No</label>
          <input type="text" name="p_uni_no" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>

        <form method="POST" action="upload.php" enctype="multipart/form-data">
            <input type="file" name="file">
            <!-- <input type="submit" value="Upload"> -->
        </form>

        <div class="form-group col-sm-7">
          <label for="">Post-cate</label>
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

                    <?php

                    $files = scandir("upload");
                    for ($a = 2; $a < count($files); $a++)
                    {
                        ?>
                        <p>
                            <?php echo $files[$a]; ?>

                            <a href="upload/<?php echo $files[$a]; ?>" download="<?php echo $files[$a]; ?>">
                                Download
                            </a>

                        </p>
                        <?php
                    }
                    ?>

    <div class="form-row col-md-7">
        <div class="from-group col md-12">
            <input type ="submit" class= "btn btn-primary" name="btnSubmit" value="Submit">
            <input type ="button" class= "btn btn-primary" name="btnIgnore" value="Ignore" onclick="window.location='<?php echo '?page='.$post; ?>'"/>
        </div>
    </div>
</form>