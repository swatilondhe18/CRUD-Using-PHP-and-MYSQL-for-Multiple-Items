<?php
include_once('dashboard.php');
include_once('db.php');
?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Customer List</h1>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>City</th>
                <th>Pending Amount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // Use the connection from db.php
                $sql = "SELECT * FROM `customer`";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                            <th scope='row'>" . $row['CustomerId'] . "</th>
                            <td>" . $row['CustomerName'] . "</td>
                            <td>" . $row['MobileNo'] . "</td>
                            <td>" . $row['City'] . "</td>
                            <td>" . $row['PendingAmt'] . "</td>
                            <td>
                                <a href='Customer_Edit.php?CustomerId=" . $row['CustomerId'] . "' class='btn btn-sm btn-warning'>Edit</a>
                                <a href='Customer_Delete.php?CustomerId=" . $row['CustomerId'] . "' class='btn btn-sm btn-danger' onclick='return confirmDelete(event)'>Delete</a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>No records found</td></tr>";
                }

                // Close the connection
                mysqli_close($conn);
             ?>
        </tbody>
    </table>
    <a href='Customer_Form.php' class='btn btn-primary mt-3'>Back to form</a>
</div>
<script>
    function confirmDelete(event) {
        event.preventDefault(); // Prevent the default action (navigation)
        if (confirm("Are you sure you want to delete this record?")) {
            window.location.href = event.target.href; // Redirect to the delete URL
        }
    }
</script>