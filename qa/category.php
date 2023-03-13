<h3><small>Category</small></h3>
<hr>

<h4><a href="?page=category_add.php">Create new</a></h4>

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
                <td scope="row"><?php echo $row['Cat_ID'] ?></td>
                <td><?php echo $row['Cat_Name'] ?></td>
                <td>
                    <a href="<?php echo $urladmin . '?page=' . $categoryEdit . '&id=' . $row['Cat_ID']; ?>">
                    <span class="material-icons" >drive_file_rename_outline</span>             
                    <a href="<?php echo $urladmin.'?page='.$categoryDelete.'&id='.$row['Cat_ID'];?>"onclick="return confirm('Are you sure')">
                <span class="material-icons">delete_outline</span>                
            </a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>