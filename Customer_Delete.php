<?php

include_once('db.php');

if (isset($_GET['CustomerId'])) {
    $CustomerId = $_GET['CustomerId'];

    // Using the existing connection from db.php
    $sql = "DELETE FROM customer WHERE CustomerId = '$CustomerId'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Delete Success!'); window.location='Customer_List.php';</script>";
    } else {
        echo "<script>alert('Could not delete data!'); window.location='Customer_List.php';</script>";
    }

    mysqli_close($conn);
} else {
    echo "ID not provided";
}
?>
