<?php
    $sql = "delete from category where cat_id = '".$_GET['id']."'";
    $result = mysqli_query($conn,$sql);
    header("Location: $urladmin?page=$category");
?>