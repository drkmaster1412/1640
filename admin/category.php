<h3><small>Category</small></h3>
<hr>

<h4><a href="?page=category_add.php">Add category</a></h4>
<table class="table table-hover table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "select * from category";
        $results = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($results)) {
        ?>
            <tr>
                <td scope="row"><?php echo $row['cat_id'] ?></td>
                <td><?php echo $row['cat_name'] ?></td>
                <td>
                    <a href="<?php echo $urladmin . '?page=' . $categoryEdit . '&id=' . $row['cat_id']; ?>">
                        <span class="material-icons" style="color:red">edit</span>
                    </a>
                <a href="<?php echo $urladmin.'?page='.$categoryDelete.'&id='.$row['cat_id'];?>" onclick="return confirm('Are you sure ?')">
                <span class="material-icons" style="color:green">delete</span>
                </a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>