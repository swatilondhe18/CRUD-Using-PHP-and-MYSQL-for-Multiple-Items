<?php include("db.php");
include("dashboard.php")?>

<div class="content">
    <div class="container my-4">
        <h1 class="text-center mb-4">Student Form</h1>
        <form action="" method="POSt">

            <div class="Form">

            <div class="row form-group">
                <div class="col-md-3">
                    <label for="sname">Name:</label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="sname" class="form-control" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="rno">Roll Number:</label>
                </div>
                <div class="col-md-9">
                    <input type="number" name="rno" class="form-control" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="std">standard:</label>
                </div>
                <div class="col-md-9">
                    <input type="number" name="std" class="form-control" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="division">Division:</label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="division" class="form-control" required>
                </div>
            </div>
                
            <div class="form-group">
                <input class="btn btn-primary py-2 px-4" type="submit" name="submit" value="Add">
            </div>
            <a href="Student_List.php" class="btn btn-primary mt-3">View List</a>
            </div>  
            </form> 
    </div>
    
</body>
</html>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $sname    = $_POST['sname'];
        $rno      = $_POST['rno'];
        $std      = $_POST['std'];
        $division = $_POST['division'];
       //$query ="INSERT INTO student  VALUES('$sname','$rno','$std','$division')";
       $sql ="INSERT INTO student (sname, roll_no, std, division)    VALUES('$sname','$rno','$std','$division')";

       $result = mysqli_query($conn, $sql);

       if ($result) {
           echo "<script>alert('Insert Success!'); window.location='Student_Form.php';</script>";
       } else {
           echo "<script>alert('Could not insert data!');</script>";
       }
   }
?>