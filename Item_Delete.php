<?php

include_once('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Using the existing connection from db.php
    $sql = "DELETE FROM item WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Delete Success!'); window.location='Item_List.php';</script>";
    } else {
        echo "<script>alert('Could not delete data!'); window.location='Item_List.php';</script>";
    }

    mysqli_close($conn);
} else {
    echo "ID not provided";
}
?>
