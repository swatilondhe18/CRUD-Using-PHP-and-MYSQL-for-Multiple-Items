<?php
// $servername="localhost";
// $username="root";
// $password="";
// $dbname="amisys_swati";

$servername="103.159.85.77";
$username="amisys_swati";
$password="Swati@123";
$dbname="amisys_swati";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn) {
    // echo " Connection OK";
}
else{
    echo " Connection Failed".mysqli_connect_error();
    //.mysqli_connect_error() -> to check why the connection is failed 
}

?>