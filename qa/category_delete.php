<?php
    $sql = "delete from category where Cat_ID = ".$_GET['cat_id'];
    $result = mysqli_query($conn,$sql);
    header("Location: $urladmin?page=$categories");
?>

