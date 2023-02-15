<h3><small>Customer</small></h3>
<hr>

<table class="table table-hover table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Date of birth</th>
            <th>Phone</th>
            <th>mail</th>
            <th>usertype</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "select * from customer";
        $results = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($results)) {
        ?>
            <tr>
                <td scope="row"><?php echo $row['Customer_ID'] ?></td>
                <td><?php echo $row['Customer_Name'] ?></td>
                <td><?php echo $row['DoB'] ?></td>
                <td><?php echo $row['Phone'] ?></td>
                <td><?php echo $row['mail'] ?></td>  
                <td><?php echo $row['usertype'] ?></td>    
                <td>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>