<html>
</html>
<h3>Add New post</h3>
<hr>

<?php
$err = "";
$p_name = "";
$p_text = "";
$p_image = "";
$p_cat = "";


if (isset($_POST["btnSubmit"])) {
    $p_name = $_POST["p_name"];
    $p_text = $_POST["p_text"];
    $p_image = $_POST["p_image"];
    $p_cat = $_POST["p_cat"];

    if ($p_name == "") {
        $err .= "<li> Enter post name";
    }
    if ($p_text == "") {
        $err .= "<li> Enter post description";
    }
    if ($p_image == "") {
        $err .= "<li> Choose images";
    }

    if (empty($err)) {
        $p_unino = md5(rand());

        $sql = "INSERT INTO poster( p_name, p_image, p_text, p_uni_no,p_file, p_cat) VALUES ('$p_name', '$p_image', '$p_text','$p_unino', '$p_file' , '$p_cat')";
        mysqli_query($conn, $sql);
        header("Location: $urladmin?page=$post");
    }
}
?>

<ul style="color:red">
    <?php echo $err;    ?>
</ul>



<form method="post" enctype="multipart/form data">
    <div class="row">

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

        <form method="POST" action="upload.php" enctype="multipart/form-data">
            <input type="file" name="file">
            <!-- <input type="submit" value="Upload"> -->
        </form>

        <div class="form-group col-sm-7">
            <label for="">Where you want to tag for</label>
            <select class="form-control" name="cat_id" id="">
                <?php
                $sql = "SELECT * from categories";
                $results = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($results)) {
                ?>
                    <option value="<?php echo $row['cat_id'] ?>"><?php echo $row['cat_name'] ?></option>
                <?php
                }
                ?>
            </select>

        </div>
        <!-- Checkbox Term and Condition -->
        <div class="form-group col-sm-7">
            <input type="checkbox" required /> I have read and agree to the
            <a href="http://localhost:8080/1640/?page=user_agreement.php" target="_blank">Terms and Conditions</a>
            and <a href="http://localhost:8080/1640/?page=privacy_policy.php" target="_blank">Privacy Policy</a>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Default checkbox
            </label>
        </div>
        <?php

        $files = scandir("upload");
        for ($a = 2; $a < count($files); $a++) {
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
                <input type="submit" class="btn btn-primary" name="btnSubmit" value="Submit">
                <input type="button" class="btn btn-danger" name="btnIgnore" value="Ignore" onclick="window.location='<?php echo '?page=' . $post; ?>'" />
            </div>
        </div>
</form>