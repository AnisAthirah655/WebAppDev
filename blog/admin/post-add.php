<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Create Post</title>
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

        .form-label {
            font-family: 'Hangyaboly', cursive;
            color: #44312b;
        }

        .form-control {
            font-family: 'Poppins', sans-serif;
            border-radius: 5px;
            padding: 10px;
        }

        textarea.form-control {
            font-family: 'Poppins', sans-serif;
            min-height: 200px;
        }

        .btn-success, .btn-secondary, .btn-primary {
            border-radius: 5px;
            font-size: 1em;
            padding: 8px 15px;
            transition: background-color 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }

        .btn-success, .btn-primary {
            background-color: #6D4E43;
            color: #fff;
        }

        .btn-success, .btn-primary:hover {
            background-color: #44312b;
        }

		.btn-secondary, .btn-primary {
            background-color: #44312b;
            color: #fff;
        }

        .btn-secondary, .btn-primary:hover {
            background-color: #6D4E43;
        }

        .alert {
            font-family: 'Poppins', sans-serif;
            margin-top: 20px;
        }

        .alert-warning {
            background-color: #F0AD4E;
            color: #fff;
        }

        .alert-success {
            background-color: #6D4E43;
            color: #fff;
        }
    </style>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/side-bar.css">
    <link rel="stylesheet" href="../css/richtext.min.css">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/jquery.richtext.min.js"></script>
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
        <div class="header-title">Dashboard - Create Post</div>
        <nav>
            <a href="../admin-logout.php">Logout</a>
        </nav>
    </header>

    <div class="main-table">
        <h3 class="mb-3">Create New Post
            <a href="post.php" class="btn btn-secondary">Posts</a>
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

        <form class="shadow p-3" 
              action="req/post-create.php" 
              method="post"
              enctype="multipart/form-data">

          <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" 
                   class="form-control"
                   name="title">
          </div>

          <div class="mb-3">
            <label class="form-label">Cover Image</label>
            <input type="file" 
                   class="form-control"
                   name="cover">
          </div>

          <div class="mb-3">
            <label class="form-label">Text</label>
            <textarea
                   class="form-control text"
                   name="text"></textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category" class="form-control">
                <?php foreach ($categories as $category) { ?>
                <option value="<?=$category['id']?>">
                    <?=$category['category']?></option>
                <?php } ?>
            </select>
          </div>

          <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

    <script>
        var navList = document.getElementById('navList').children;
        navList.item(1).classList.add("active");

        $(document).ready(function() {
            $('.text').richText();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>

<?php } else {
    header("Location: ../admin-login.php");
    exit;
} ?>
