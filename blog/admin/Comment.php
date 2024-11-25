<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Comments</title>
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
      include_once("data/Comment.php");
      include_once("data/Post.php");
      include_once("../db_conn.php");
      $comments = getAllComment($conn);
    ?>
    <header>
        <div class="header-title">Dashboard - Comments</div>
        <nav>
            <a href="../admin-login.php">Logout</a>
        </nav>
    </header>

    <div class="main-table">
        <h3 class="mb-3">All Comments</h3>

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

        <?php if ($comments != 0) { ?>
        <table class="table t1 table-bordered">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Post Title</th>
              <th scope="col">Comment</th>
              <th scope="col">User</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($comments as $comment) { ?>
            <tr>
              <th scope="row"><?=$comment['comment_id'] ?></th>
              <td>
                <a href="single_post.php?post_id=<?=$comment['post_id']?>">
                <?php 
                  $p = getByIdDeep($conn, $comment['post_id']);
                  echo $p['post_title']; ?>
                </a>
              </td>
              <td><?=$comment['comment']?></td>
              <td>
                <?php 
                  $u = getUserByID($conn, $comment['user_id']);
                  echo '@'.$u['username']; ?>
              </td>
              <td>
                <a href="comment-delete.php?comment_id=<?=$comment['comment_id'] ?>" class="btn btn-danger">Delete</a>
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
        navList.item(3).classList.add("active");
    </script>
</body>
</html>

<?php } else {
    header("Location: ../admin-login.php");
    exit;
} ?>
