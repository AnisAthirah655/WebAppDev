<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Posts</title>
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

        .btn-warning {
            background-color: #F0AD4E;
            color: #fff;
        }

        .btn-warning:hover {
            background-color: #EC971F;
        }

        .btn-link {
            color: #6D4E43;
        }

        .btn-link:hover {
            color: #44312b;
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
      include_once("data/Post.php");
      include_once("data/Comment.php");
      include_once("../db_conn.php");

      $posts = getAllDeep($conn);
    ?>

    <header>
        <div class="header-title">Dashboard - Posts</div>
        <nav>
            <a href="../admin-login.php">Logout</a>
        </nav>
    </header>
               
    <div class="main-table">
        <h3 class="mb-3">All Posts 
            <a href="post-add.php" class="btn btn-success">Add New</a>
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

        <?php if ($posts != 0) { ?>
        <table class="table t1 table-bordered">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th>Title</th>
              <th>Category</th>
              <th>Comments</th>
              <th>Likes</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($posts as $post) { 
                $category = getCategoryById($conn, $post['category']); 
                
                // Fallback for invalid categories
                if (!is_array($category)) {
                    $category = ['category' => 'Unknown'];
                }
            ?>
            <tr>
              <th scope="row"><?=$post['post_id'] ?></th>
              <td>
                <a href="single_post.php?post_id=<?=$post['post_id'] ?>"><?=$post['post_title'] ?></a>
              </td>
              <td>
                <?=htmlspecialchars($category['category'])?>
              </td>
              <td>
                <i class="fa fa-comment" aria-hidden="true"></i> 
                <?php echo CountByPostID($conn, $post['post_id']); ?>
              </td>
              <td>
                <i class="fa fa-thumbs-up" aria-hidden="true"></i> 
                <?php echo likeCountByPostID($conn, $post['post_id']); ?>
              </td>
              <td>
                <a href="post-delete.php?post_id=<?=$post['post_id'] ?>" class="btn btn-danger">Delete</a>
                <a href="post-edit.php?post_id=<?=$post['post_id'] ?>" class="btn btn-warning">Edit</a>
                <?php if ($post['publish'] == 1) { ?>
                <a href="post-publish.php?post_id=<?=$post['post_id'] ?>&publish=1" class="btn btn-link disabled">Public</a>
                <a href="post-publish.php?post_id=<?=$post['post_id'] ?>&publish=0" class="btn btn-link">Private</a>
                <?php } else { ?>
                <a href="post-publish.php?post_id=<?=$post['post_id'] ?>&publish=1" class="btn btn-link">Public</a>
                <a href="post-publish.php?post_id=<?=$post['post_id'] ?>&publish=0" class="btn btn-link disabled">Private</a>
                <?php } ?>
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
        navList.item(1).classList.add("active");
    </script>
</body>
</html>

<?php } else {
    header("Location: ../admin-login.php");
    exit;
} ?>
