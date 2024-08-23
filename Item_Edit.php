<?php
include_once('dashboard.php');
include_once('db.php');

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Fetch the current data based on the ID passed via GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Fetch the current data
        $sql = "SELECT * FROM item WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $item = mysqli_fetch_assoc($result);
        } else {
            echo "<script>alert('Data not found'); window.location='Item_List.php';</script>";
            exit;
        }
    } else {
        echo "<script>alert('No ID provided'); window.location='Item_List.php';</script>";
        exit;
    }
}

// Handle form submission to update the record
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id']; // Ensure you have this field in the form
    $name = $_POST['name'];
    $company = $_POST['company'];
    $openingstocks = $_POST['openingstocks'];
    $rate = $_POST['rate'];

    // Update the data in the database
    $sql = "UPDATE item SET name='$name', company='$company', openingstocks='$openingstocks', rate='$rate' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Data updated successfully'); window.location='Item_List.php';</script>";
    } else {
        echo "<script>alert('Data update failed'); window.location='Item_Edit.php?id=$id';</script>";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Item</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-3">
  <h3>Edit Item</h3>
  <form action="" method="post">
    <input type="hidden" name="id" value="<?php echo $item['id']; ?>"> <!-- Hidden field for ID -->
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name" value="<?php echo $item['name']; ?>" required>
    </div>
    <div class="form-group">
      <label for="company">Company</label>
      <input type="text" class="form-control" id="company" name="company" value="<?php echo $item['company']; ?>" required>
    </div>
    <div class="form-group">
      <label for="openingstocks">Opening Stock</label>
      <input type="number" class="form-control" id="openingstocks" name="openingstocks" value="<?php echo $item['openingstocks']; ?>" required>
    </div>
    <div class="form-group">
      <label for="rate">Rate</label>
      <input type="number" class="form-control" id="rate" name="rate" value="<?php echo $item['rate']; ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  <br>
  <a href="Item_List.php" class="btn btn-secondary">Back to List</a>
</div>

