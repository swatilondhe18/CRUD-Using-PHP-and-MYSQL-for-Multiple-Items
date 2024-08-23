<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: index.php");
    exit;
}

// Get the username from session
$username = isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Guest';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Nested Dropdown Navbar</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
    body {
            background-color: white;
            color: #000;
        }
        .navbar {
            background-color: #007bff; /* Blue background */
        }
        .navbar-nav .nav-link, .navbar-brand {
            color: #fff !important; /* White text */
        }
        .navbar-nav .nav-link:hover {
            color: #ffdd57 !important; /* Yellow text on hover */
        }
        .dropdown-menu {
            background-color: #007bff; /* Blue background for dropdown */
        }
        .dropdown-item {
            color: #fff !important; /* White text for dropdown items */
        }
        .dropdown-item:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
        .dropdown-submenu {
            position: relative;
        }
        .dropdown-submenu > .dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: -1px;
            display: none;
        }
        .dropdown-submenu:hover > .dropdown-menu {
            display: block;
        }
        .navbar-nav .nav-item:not(:last-child) {
            border-right: 1px solid #fff; /* White border to separate items */
        }
        .navbar-brand img {
            height: 30px; /* Adjust the height as needed */
            margin-right: 10px;
        }
        .user-greeting {
            color: #fff;
        }
        .navbar-nav .nav-item {
            margin-left: 15px; /* Space between items */
        }
        .dropdown-menu-right {
            right: 0;
            left: auto;
        }
        .profile-icon {
            font-size: 20px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Master
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <div class="dropdown-submenu">
            <a class="dropdown-item dropdown-toggle" href="#">Customer</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="Customer_Form.php">New Customer</a>
              <a class="dropdown-item" href="Customer_List.php">List Customer</a>
            </div>
          </div>
          <div class="dropdown-submenu">
            <a class="dropdown-item dropdown-toggle" href="#">Item</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="Item_Form.php">New Item</a>
              <a class="dropdown-item" href="Item_List.php">List Item</a>
            </div>
          </div>
          <div class="dropdown-submenu">
            <a class="dropdown-item dropdown-toggle" href="#">Student</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="Student_Form.php">New Student</a>
              <a class="dropdown-item" href="Student_List.php">List Student</a>
            </div>
          </div>
        </div>
      </li>
            <li class="nav-item dropdown ml-auto">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user profile-icon"></i>
                    Hello... <?php echo $username; ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="logout.php" onclick="confirmLogout(event)">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $('.dropdown-submenu .dropdown-toggle').on("click", function(e){
            $(this).next('.dropdown-menu').toggle();
            e.stopPropagation();
            e.preventDefault();
        });
    });

    function confirmLogout(event) {
        event.preventDefault(); // Prevent the default action
        if (confirm("Are you sure you want to logout?")) {
            window.location.href = "logout.php"; // Redirect to logout page
        }
    }
</script>
</body>
</html>
