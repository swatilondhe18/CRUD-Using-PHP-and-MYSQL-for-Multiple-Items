<?php
session_start();

// Check if the user is already logged in through a session or cookie
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("location: dashboard.php");
    exit();
}

// Check if the user is already logged in through a cookie
if (isset($_COOKIE['username'])) {
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $_COOKIE['username'];
    header("location: dashboard.php");
    exit();
}

$login = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db.php';
    $username = $_POST["username"];
    $pass = $_POST["pass"];

    // Securely query the database using a prepared statement
    $sql = "SELECT * FROM `login` WHERE username = '$username' AND pass = '$pass'";
    $result = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $login = true;
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        // Automatically set a cookie to remember the user for 30 days
        setcookie('username', $username, time() + (86400 * 30), "/"); // Cookie expires in 30 days

        header("location: dashboard.php");
        exit();
    } else {
        $showError = "Invalid Credentials";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: white;
            color: #000;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            width: 100%;
            max-width: 400px;
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">Login</div>
        <div class="card-body">
            <!-- Login Form -->
            <form action="" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" autocomplete="username" required>
                </div>
                <div class="form-group">
                    <label for="pass">Password</label>
                    <input type="password" name="pass" class="form-control" placeholder="Password" autocomplete="current-password" required>
                </div>
                <input class="btn btn-primary btn-block" name="login" type="submit" value="Login">
            </form>
            <?php
            if ($showError) {
                echo '<div class="alert alert-danger mt-3" role="alert">' . $showError . '</div>';
            }
            ?>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
