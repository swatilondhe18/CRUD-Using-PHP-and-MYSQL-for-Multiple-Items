<?php

include_once('dashboard.php');
include_once('db.php');

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Fetch the current data based on the ID passed via GET
if (isset($_GET['Student_ID'])) {
    $Student_ID = $_GET['Student_ID'];

    // Fetch the current data
    $sql = "SELECT * FROM student WHERE Student_ID = $Student_ID";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $student = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Data not found'); window.location='Studentr_List.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('No ID provided'); window.location='Student_List.php';</script>";
    exit;
}

// Handle form submission to update the record
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sname = $_POST['sname'];
    $roll_no = $_POST['roll_no'];
    $std = $_POST['std'];
    $division = $_POST['division'];

    // Update the data in the database
    $sql = "UPDATE student SET sname='$sname', roll_no='$roll_no', std='$std', division='$division' WHERE Student_ID='$Student_ID'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Updated successfully'); window.location='Student_List.php';</script>";
    } else {
        echo "<script>alert('Update failed'); window.location='Student_Edit.php?Student_ID=$Student_ID';</script>";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Student</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Edit Student</h1>
    <form method="post" action="">
        <input type="hidden" name="Student_ID" value="<?php echo $student['Student_ID']; ?>">
        <div class="row form-group">
            <div class="col-md-3">
                <label for="sname">Name:</label>
            </div>
            <div class="col-md-9">
                <input type="text" name="sname" class="form-control" value="<?php echo $student['sname']; ?>" required>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-3">
                <label for="roll_no">Roll Number:</label>
            </div>
            <div class="col-md-9">
                <input type="number" name="roll_no" class="form-control" value="<?php echo $student['roll_no']; ?>" required>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-3">
                <label for="std">Standard:</label>
            </div>
            <div class="col-md-9">
                <input type="number" name="std" class="form-control" value="<?php echo $student['std']; ?>" required>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-3">
                <label for="division">Division:</label>
            </div>
            <div class="col-md-9">
                <input type="text" name="division" class="form-control" value="<?php echo $student['division']; ?>" required>
            </div>
        </div>
        <div class="form-group">
            <input class="btn btn-primary py-2 px-4" type="submit" name="submit" value="Update">
        </div>
    </form>
    <a href="Student_List.php" class="btn btn-primary mt-3">Back to List</a>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
