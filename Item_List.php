<?php
include_once('dashboard.php');
include_once('db.php');
?>

<div class="container mt-4">
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Company</th>
                <th scope="col">Opening Stocks</th>
                <th scope="col">Rate</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
                // Query to fetch all records from the `item` table
                $sql = "SELECT * FROM `item`";
                $result = mysqli_query($conn, $sql);
                
                if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                <th scope='row'>" . $row['id'] . "</th>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['company'] . "</td>
                    <td>" . $row['openingstocks'] . "</td>
                    <td>" . $row['rate'] . "</td>
                    <td>
                        <a href='Item_Edit.php?id=" . $row['id'] . "' class='btn btn-sm btn-warning'>Edit</a>
                        <a href='Item_Delete.php?id=" . $row['id'] . "' class='btn btn-sm btn-danger'>Delete</a>
                    </td>
                    </tr>";
                 }
            }else {
                echo "<tr><td colspan='6' class='text-center'>No records found</td></tr>";
            }
            
            mysqli_close($conn); // Close the connection
            ?>
        </tbody>
    </table>
</div>

