<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Users</title>
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

        nav a {
            text-decoration: none;
            font-size: 1em;
            color: #44312b;
            margin-right: 20px;
        }

        nav a:hover {
            color: #6D4E43;
        }

        .main-table {
            padding: 20px;
        }

        h3 {
            font-family: 'Hangyaboly', cursive;
            color: #44312b;
        }

        .btn-success, .btn-danger, .btn-warning {
            border-radius: 5px;
            font-size: 1em;
            padding: 8px 15px;
            transition: background-color 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }
        .btn-success {
            background-color: #6D4E43;
            color: #fff;
        }

        .btn-success:hover {
            background-color: #44312b;
        }

        .btn-danger {
            background-color: #D9534F;
        }

        .btn-danger:hover {
            background-color: #C9302C;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            font-size: 0.9em;
        }

        table th, table td {
            padding: 12px;
            text-align: left;
        }

        table th {
            background-color: #6D4E43;
            color: #fff;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .alert {
            font-family: 'Poppins', sans-serif;
            margin-top: 20px;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/side-bar.css">
</head>
<body>
    <?php 
      $key = "hhdsfs1263z";
      include "inc/side-nav.php"; 
      include_once("data/User.php");
      include_once("../db_conn.php");
      $users = getAll($conn);
    ?>

    <header>
        <div class="header-title">Dashboard - Users</div>
        <nav>
            <a href="../admin-login.php">Logout</a>
        </nav>
    </header>
               
    <div class="main-table">
        <h3 class="mb-3">All Users 
            <a href="../signup.php" class="btn btn-success">Add New</a>
        </h3>

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

        <?php if ($users != 0) { ?>
        <table class="table t1 table-bordered">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Full Name</th>
              <th scope="col">Username</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($users as $user) { ?>
            <tr>
              <th scope="row"><?=$user['id'] ?></th>
              <td><?=$user['fname'] ?></td>
              <td><?=$user['username'] ?></td>
              <td>
                <a href="user-delete.php?user_id=<?=$user['id'] ?>" class="btn btn-danger">Delete</a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        <?php }else{ ?>
        <div class="alert alert-warning">
            No users found.
        </div>
        <?php } ?>
    </div>

    <script>
        var navList = document.getElementById('navList').children;
        navList.item(0).classList.add("active");
    </script>
</body>
</html>

<?php }else {
    header("Location: ../admin-login.php");
    exit;
} ?>