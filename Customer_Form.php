<?php
include_once('dashboard.php');
include_once('db.php');
?>

<div class="content">
    <div class="container my-4">
        <h1 class="text-center mb-4">Customer Form</h1>
        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Retrieve form data
                $CustomerName = $_POST['CustomerName'];
                $MobileNo = $_POST['MobileNo'];
                $City = $_POST['City'];
                $PendingAmt = $_POST['PendingAmt'];

                // Reuse the existing connection from db.php
                $sql = "INSERT INTO `customer` (`CustomerName`, `MobileNo`, `City`, `PendingAmt`) VALUES ('$CustomerName', '$MobileNo', '$City', '$PendingAmt')";

                $result = mysqli_query($conn, $sql);

                if ($result) {
                    echo "<script>alert('Insert Success!'); window.location='Customer_Form.php';</script>";
                } else {
                    echo "<script>alert('Could not insert data!');</script>";
                }
            }
        ?>
        <form method="post" action="Customer_Form.php">
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="CustomerName">Name:</label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="CustomerName" class="form-control" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="MobileNo">Mobile:</label>
                </div>
                <div class="col-md-9">
                    <input type="number" name="MobileNo" class="form-control" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="City">City:</label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="City" class="form-control" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="PendingAmt">Pending Amount:</label>
                </div>
                <div class="col-md-9">
                    <input type="number" name="PendingAmt" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <input class="btn btn-primary py-2 px-4" type="submit" name="submit" value="Add">
            </div>
        </form>
        <a href="Customer_List.php" class="btn btn-primary mt-3">View List</a>
    </div>
</div>

       