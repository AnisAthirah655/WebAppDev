<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Category</title>
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
            color: #fff;
        }

        .btn-danger:hover {
            background-color: #C9302C;
        }

        .btn-warning {
            background-color: #F0AD4E;
            color: #fff;
        }

        .btn-warning:hover {
            background-color: #EC971F;
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
            border: 1px solid #ddd;
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
        include_once("data/Category.php");
        include_once("../db_conn.php");
        $categories = getAll($conn);
    ?>

    <header>
        <div class="header-title">Dashboard - Categories</div>
        <nav>
            <a href="../admin-login.php">Logout</a>
        </nav>
    </header>

    <div class="main-table">
        <h3 class="mb-3">All Categories 
            <a href="Category-add.php" class="btn btn-success">Add New</a>
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

        <?php if ($categories != 0) { ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category) { ?>
                <tr>
                    <th scope="row"><?=$category['id'] ?></th>
                    <td><?=$category['category'] ?></td>
                    <td>
                        <a href="category-delete.php?id=<?=$category['id'] ?>" class="btn btn-danger">Delete</a>
                        <a href="category-edit.php?id=<?=$category['id'] ?>" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } else { ?>
        <div class="alert alert-warning">
            Empty!
        </div>
        <?php } ?>
    </div>

    <script>
        var navList = document.getElementById('navList').children;
        navList.item(2).classList.add("active");
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>

<?php } else {
    header("Location: ../admin-login.php");
    exit;
} ?>