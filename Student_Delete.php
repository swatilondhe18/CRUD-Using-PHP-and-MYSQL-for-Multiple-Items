<?php

include_once('db.php');

if (isset($_GET['Student_ID'])) {
    $Student_ID = $_GET['Student_ID'];

    // Using the existing connection from db.php
    $sql = "DELETE FROM student WHERE Student_ID = '$Student_ID'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Delete Success!'); window.location='Student_List.php';</script>";
    } else {
        echo "<script>alert('Could not delete data!'); window.location='Student_List.php';</script>";
    }

    mysqli_close($conn);
} else {
    echo "ID not provided";
}
?>
