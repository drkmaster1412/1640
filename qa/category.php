<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<h3><small>Category</small></h3>
<hr>

<?php
include('connection.php');
?>

<h4><a href="category_add.php">Create new</a></h4>

<table class="table table-hover table-inverse table-responsive col-md-12">
    <thead class="thead-inverse">
        <tr>
            <th>ID</th>
            <th>Name</th>

            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM categories";
        $results = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($results)) {
        ?>
            <tr>
                <td scope="row"><?php echo $row['cat_id'] ?></td>
                <td><?php echo $row['cat_name'] ?></td>

                <td>
                    <a href="<?php echo $urladmin . '?page=' . $categoryEdit . '&cat_id=' . $row['cat_id']; ?>">
                    <span class="material-icons">Edit</span>             
                    <a href="<?php echo $urladmin.'?page='.$categoryDelete.'cat_id='.$row['cat_id'];?>"onclick="return confirm('Are you sure')">
                <span class="material-icons">Delete</span>                
            </a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>