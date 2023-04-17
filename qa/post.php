<br>
<div id="main-content" class="container allContent-section py-6" style="margin-left:20%; width:70%;">
    <h2>All Ideas</h2>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Name</th>
                <th class="text-center">Image</th>
                <th class="text-center">Description</th>
                <th class="text-center">No</th>
                <th class="text-center">File</th>
                <th class="text-center">Category</th>
                <th class="text-center" colspan="2">Action</th>
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
                        <a href="" style="margin-left:45%">
                            <span class="material-icons">visibility_outline</span>
                        </a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>