<?php include("connection.php")?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="Container">
        <form action="" method="POSt">
            <div class="title"> Student Login</div> 
            <div class="Form">

                <div class="input_field">
                    <label for=""> User Name</label>
                    <input type="text" class="input" name="uname" >
                </div>
                <div class="input_field">
                    <label for=""> Password</label>
                    <input type="password" class="input" max-length="8" name="pwd">
                </div>
                
                <div class="input_field">
                    
                    <input type="Submit" value="Login" class="btn1">
                </div>
            </div>  
            </form> 
    </div>
    
</body>
</html>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $uname    = $_POST['uname'];
        $pwd      = $_POST['pwd'];
       
       $query ="SELECT * FROM Student_Login WHERE User_Name = '$uname' and User_Pwd = '$pwd'";
       $data = mysqli_query($conn, $query);
       $count = mysqli_num_rows($data);
       if($count == 1){
                echo "<script>
                         alert('Login Successfull')
                          window.location.href='Student_Form.php';
                     </script>";
               
                 }
             else{
                echo "<script>
                             alert('Login failed')
                              window.location.href='Student_Login.php';
                    
                      </script>";
            }
     }
    
        // Close the database connection
      mysqli_close($conn);
 ?> 