<?php 
session_start();

// Check if user is logged in
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard - User Profile</title>
    <style>
        /* Custom Fonts */
        @font-face {
            font-family: 'Hangyaboly';
            src: url('../fonts/Hangyaboly.ttf') format('truetype');
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #c5a689;
            color: #44312b;
            margin: 0;
            padding: 0;
        }

        /* Navbar Styles */
        .navbar {
            background-color: #6D4E43;
            padding: 20px;
        }

        .navbar a {
            color: #000;
            text-decoration: none;
            font-family: 'Hangyaboly', cursive;
            font-size: 1.2em;
            padding: 10px 20px;
            transition: background-color 0.3s;
        }

        .navbar a:hover {
            background-color: #44312b;
        }

        header {
            background-color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #44312b;
        }

        .header-title {
            font-family: 'Hangyaboly', cursive;
            font-size: 1.8em;
            color: #44312b;
        }

        .btn-primary {
            background-color: #6D4E43;
            border: none;
            color: white;
            font-size: 1em;
            font-family: 'Poppins', sans-serif;
            padding: 10px 20px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #44312b;
        }

        .alert {
            font-family: 'Poppins', sans-serif;
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
        }

        .alert-warning {
            background-color: #ffcc00;
            color: #6D4E43;
        }

        .alert-success {
            background-color: #28a745;
            color: white;
        }

        .main-table {
            padding: 20px;
        }

        h3 {
            font-family: 'Hangyaboly', cursive;
            color: #44312b;
        }

        .form-label {
            font-size: 1em;
            color: #44312b;
        }

        .form-control {
            font-size: 1em;
            padding: 10px;
            border: 1px solid #6D4E43;
        }

        .form-control:focus {
            border-color: #44312b;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/side-bar.css">
</head>
<body>
    <!-- Include Navbar -->
    <?php include 'inc/NavBar.php'; ?>

    <header>
        <div class="header-title">User Profile</div>
        <nav>
            <a href="../user-login.php" class="btn btn-danger">Logout</a>
        </nav>
    </header>

    <div class="main-table">
        <h3 class="mb-3">User Profile</h3>
        
        <!-- Success/Error Alerts -->
        <?php if (isset($_GET['error'])) { ?>    
        <div class="alert alert-warning">
            <?=htmlspecialchars($_GET['error'])?>
        </div>
        <?php } ?>

        <?php if (isset($_GET['success'])) { ?>    
        <div class="alert alert-success">
            <?=htmlspecialchars($_GET['success'])?>
        </div>
        <?php } ?>

        <!-- Profile Info Change Form -->
        <form class="shadow p-3" action="req/user-edit.php" method="post">
            <h3>Change Profile Info</h3>
            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" class="form-control" name="fname" value="<?=$user['first_name']?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control" name="lname" value="<?=$user['last_name']?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="username" value="<?=$user['username']?>">
            </div>
            <button type="submit" class="btn btn-primary">Change</button>
        </form>

        <!-- Password Change Form -->
        <form class="shadow p-3 mt-5" action="req/user-edit-pass.php" method="post">
            <h3>Change Password</h3>

            <?php if (isset($_GET['perror'])) { ?>    
            <div class="alert alert-warning">
                <?=htmlspecialchars($_GET['perror'])?>
            </div>
            <?php } ?>

            <?php if (isset($_GET['psuccess'])) { ?>    
            <div class="alert alert-success">
                <?=htmlspecialchars($_GET['psuccess'])?>
            </div>
            <?php } ?>

            <div class="mb-3">
                <label class="form-label">Current Password</label>
                <input type="password" class="form-control" name="cpass">
            </div>
            <div class="mb-3">
                <label class="form-label">New Password</label>
                <input type="password" class="form-control" name="new_pass">
            </div>
            <div class="mb-3">
                <label class="form-label">Confirm New Password</label>
                <input type="password" class="form-control" name="cnew_pass">
            </div>
            <button type="submit" class="btn btn-primary">Change Password</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>

<?php } else {
    // Redirect to login page if user is not logged in
    header("Location: ../user-login.php");
    exit;
} ?>
