<?php

include_once('dashboard.php');
include_once('db.php');

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Fetch the current data based on the ID passed via GET
if (isset($_GET['CustomerId'])) {
    $CustomerId = $_GET['CustomerId'];

    // Fetch the current data
    $sql = "SELECT * FROM customer WHERE CustomerId = $CustomerId";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $customer = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Data not found'); window.location='Customer_List.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('No ID provided'); window.location='Customer_List.php';</script>";
    exit;
}

// Handle form submission to update the record
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $CustomerName = $_POST['CustomerName'];
    $MobileNo = $_POST['MobileNo'];
    $City = $_POST['City'];
    $PendingAmt = $_POST['PendingAmt'];

    // Update the data in the database
    $sql = "UPDATE customer SET CustomerName='$CustomerName', MobileNo='$MobileNo', City='$City', PendingAmt='$PendingAmt' WHERE CustomerId='$CustomerId'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Updated successfully'); window.location='Customer_List.php';</script>";
    } else {
        echo "<script>alert('Update failed'); window.location='Customer_Edit.php?CustomerId=$CustomerId';</script>";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Customer</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Edit Customer</h1>
    <form method="post" action="">
        <input type="hidden" name="CustomerId" value="<?php echo $customer['CustomerId']; ?>">
        <div class="row form-group">
            <div class="col-md-3">
                <label for="CustomerName">Name:</label>
            </div>
            <div class="col-md-9">
                <input type="text" name="CustomerName" class="form-control" value="<?php echo $customer['CustomerName']; ?>" required>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-3">
                <label for="MobileNo">Mobile:</label>
            </div>
            <div class="col-md-9">
                <input type="number" name="MobileNo" class="form-control" value="<?php echo $customer['MobileNo']; ?>" required>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-3">
                <label for="City">City:</label>
            </div>
            <div class="col-md-9">
                <input type="text" name="City" class="form-control" value="<?php echo $customer['City']; ?>" required>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-3">
                <label for="PendingAmt">Pending Amount:</label>
            </div>
            <div class="col-md-9">
                <input type="number" name="PendingAmt" class="form-control" value="<?php echo $customer['PendingAmt']; ?>" required>
            </div>
        </div>
        <div class="form-group">
            <input class="btn btn-primary py-2 px-4" type="submit" name="submit" value="Update">
        </div>
    </form>
    <a href="Customer_List.php" class="btn btn-primary mt-3">Back to List</a>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
