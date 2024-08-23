

<?php

// $servername = "103.159.85.77";
// $username = "amisys_kinjal";
// $password = "Kinjal@123";
// $database = "amisys_kinjal";

$servername="103.159.85.77";
$username="amisys_spk";
$password="AmisyS#301";
$database="amisys_spk";

// $servername="localhost";
// $username="root";
// $password="";
// $database="amisys_kinjal";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn) {
     //echo " Connection OK";
}
else{
    echo " Connection Failed".mysqli_connect_error();
    //.mysqli_connect_error() -> to check why the connection is failed 
}

?>