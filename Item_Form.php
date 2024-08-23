<?php
include_once('dashboard.php');
include_once('db.php');

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location: index.php");
  exit;
}
?>


<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $a = $_POST['name'];
    $b = $_POST['company'];
    $c = $_POST["openingstocks"];
    $d = $_POST["rate"];

    $sql = "INSERT INTO `item` (`name`,`company`,`openingstocks`,`rate`) VALUES ('$a','$b','$c','$d')";

    $result = mysqli_query($conn,$sql);

    if($result){
         echo'<div class="alert alert-success" role="alert">
        A simple success alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
      </div>';
    }
    else{
        echo "record not";
    }
}
   
?> 

<div class="container mt-3">

    <h3>Item</h3>
<form action="Item_Form.php" method="post">
  <div class="form-group">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="name" class="form-control" id="name" name="name" aria-describedby="emailHelp">
   
  </div>
    <label for="email">Company</label>
    <input type="company" class="form-control" id="company" name="company" aria-describedby="emailHelp">
   
  </div>
  <div class="form-group">
    <label for="name">OpeningStock</label>
    <input type="number" class="form-control" id="openingstocks" name="openingstocks" aria-describedby="emailHelp">
   
  </div>
  <div class="form-group">
    <label for="name">Rate</label>
    <input type="number" class="form-control" id="rate" name="rate" aria-describedby="emailHelp">
   
  </div>
  
  <!-- <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <button type="submit" class="btn btn-primary">abcd</button>
  
</form>
  <a href="Item_List.php" class="btn-btn-primary mt-3">List</a>
</div>
