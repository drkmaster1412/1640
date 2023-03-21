<h3><small>Post</small></h3>
<hr>

<h4><a href="?page=post_add.php">Create new</a></h4>


<table class="table table-hover table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Images</th>
            <th>Description</th>
            <th>No</th>
            <th>File</th>
            <th>Cat</th>

            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        include('./connection.php');

        $sql = "select * from poster";
        $results = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($results)) {
            ?>
            <tr>
                <td scope="row">
                    <?php echo $row['p_id'] ?>
                </td>
                <td>
                    <?php echo $row['p_name'] ?>
                </td>
                <td><img src="../image/<?php echo $row['p_image']; ?>" style=width:50px; height:50px"></td>
                <td>
                    <?php echo $row['p_text'] ?>
                </td>
                <td>
                    <?php echo $row['p_uni_no'] ?>
                </td>
                <td>
                    <?php echo $row['p_file'] ?>
                </td>
                <td>
                    <?php echo $row['p_cat'] ?>
                </td>

                <td>
                    <a href="<?php echo $urladmin . '?page=' . $postEdit . '&p_id=' . $row['p_id']; ?>">
                        <span class="material-icons">drive_file_rename_outline</span>
                        <a href="<?php echo $urladmin . '?page=' . $postDelete . '&p_id=' . $row['p_id']; ?>"
                            onclick="return confirm('Are you sure')">
                            <span class="material-icons">delete_outline</span>
                        </a>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>