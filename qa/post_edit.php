
<h3>Update post</h3>
<hr>

<?php


if(isset($_POST["btnSubmit"])){
    $p_id=$_POST["p_id"];
    $p_name=$_POST["p_name"];
    $p_text=$_POST["p_text"];
    $p_image=$_FILES['p_image'];
    $p_uni_no=$_POST["p_uni_no"];

        if($p_image['name']!=""){
        copy($p_image['tmp_name'],"../image/".$p_image['name']);

            $filepic = $p_image['name'];
        $sql="update poster set p_name='$p_name', p_text='$p_text',p_image='$filepic', p_uni_no='$p_uni_no' where p_id='$p_id'";
       mysqli_query($conn, $sql);
        header("Location: $urladmin?page=$post");   
        }        
}else
{
    if(isset($_GET["p_id"])){
        $sql= "select * from poster where p_id='".$_GET['p_id']."'";
        $results = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_array($results)){
            $p_id= $row['p_id'];
            $p_name= $row['p_name'];
            $p_text= $row['p_text'];
            $p_uni_no= $row['p_uni_no'];
            }
        }
    }
?>

<form method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="form-group col-sm-7">
          <label for="">ID</label>
          <input type="text" name="p_id" id="" class="form-control" placeholder="" readonly="true" value ="<?php echo $p_id ?>" aria-describedby="helpId">
        </div>

        <div class="form-group col-sm-7">
          <label for="">Name</label>
          <input type="text" name="p_name" id="" class="form-control" placeholder="" value ="<?php echo $p_name ?>" aria-describedby="helpId">
        </div>

        <div class="form-group col-sm-7">
          <label for="">Description</label>
          <input type="text" name="p_text" id="" class="form-control" placeholder="" value ="<?php echo $p_text ?>" aria-describedby="helpId">
        </div>

        <div class="form-group col-sm-7">
        <label for="">Images</label>
        <input type="file" class="form-control-file" name="p_image" id="" placeholder="" aria-describedby="fileHelpId">
        </div>

        <div class="form-group col-sm-7">
          <label for="">No</label>
          <input type="text" name="p_uni_no" id="" class="form-control" placeholder="" value ="<?php echo $p_uni_no ?>" aria-describedby="helpId">
        </div>

    <div class="form-row col-md-7">
        <div class="from-group col md-12">
            <input type ="submit" class= "btn btn-primary" name="btnSubmit" value="Update"  ">
            <input type ="button" class= "btn btn-primary" name="btnCancel" value="Cancel" onclick="window.location='<?php echo '?page='.$post; ?>'"/>
        </div>
    </div>
</form>