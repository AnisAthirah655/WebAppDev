<?php 
session_start();
$logged = false;
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    $logged = true;
    $user_id = $_SESSION['user_id'];
}

if (isset($_GET['post_id'])) {
    include_once("admin/data/Post.php");
    include_once("admin/data/Comment.php");
    include_once("db_conn.php");
    $id = $_GET['post_id'];
    $post = getById($conn, $id);
    $comments = getCommentsByPostID($conn, $id);
    $categories = get5Categoies($conn); 

    if ($post == 0) {
        header("Location: blog.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - <?=$post['post_title']?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Custom styles for Blog Post Page */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .main-blog {
            font-family: 'Poppins', sans-serif;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .main-blog-card {
            margin-bottom: 30px;
        }
        .main-blog-card img {
            border-radius: 10px;
            max-height: 400px;
            object-fit: cover;
        }
        .card-title {
            font-size: 2rem;
            color: #6D4E43;
            font-family: 'Hangyaboly', cursive;
        }
        .card-text {
            font-size: 1.1rem;
            color: #44312b;
        }
        .react-btns {
            font-size: 1rem;
            color: #6D4E43;
        }
        .liked {
            color: #28a745;
        }
        .like-btn {
            cursor: pointer;
        }
        .comments {
            margin-top: 30px;
        }
        .comment {
            display: flex;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .comment img {
            border-radius: 50%;
        }
        .comment span {
            font-weight: bold;
        }
        .list-group-item {
            font-family: 'Poppins', sans-serif;
            font-size: 1.1rem;
        }
        .aside-main {
            margin-top: 30px;
        }

		.category-aside {
            margin-top: 20px;
        }

        .category-aside a {
            text-decoration: none;
            color: #44312b;
        }

        .category-aside a:hover {
            background-color: #6D4E43;
            color: #fff;
        }
        .alert {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>
    <?php include 'inc/NavBar.php'; ?>

    <div class="container mt-5">
        <section class="d-flex">
            <!-- Main Blog Content -->
            <main class="main-blog">
                <div class="card main-blog-card mb-5">
                    <img src="upload/blog/<?=$post['cover_url']?>" class="card-img-top" alt="Post Image">
                    <div class="card-body">
                        <h5 class="card-title"><?=$post['post_title']?></h5>
                        <p class="card-text"><?=$post['post_text']?></p>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <div class="react-btns">
                                <?php 
                                    $post_id = $post['post_id'];
                                    if ($logged) {
                                        $liked = isLikedByUserID($conn, $post_id, $user_id);
                                        if ($liked) { ?>
                                            <i class="fa fa-thumbs-up liked like-btn" post-id="<?=$post_id?>" liked="1" aria-hidden="true"></i>
                                        <?php } else { ?>
                                            <i class="fa fa-thumbs-up like-btn" post-id="<?=$post_id?>" liked="0" aria-hidden="true"></i>
                                        <?php } 
                                    } else { ?>
                                        <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                    <?php } ?>
                                Likes (<span><?= likeCountByPostID($conn, $post['post_id']) ?></span>)
                                <i class="fa fa-comment" aria-hidden="true"></i> Comments (
                                    <?= CountByPostID($conn, $post['post_id']) ?>
                                )
                            </div>
                            <small class="text-body-secondary"><?=$post['crated_at']?></small>
                        </div>

                        <form action="php/comment.php" method="post" id="comments">
                            <h5 class="mt-4 text-secondary">Add comment</h5>
                            <?php if (isset($_GET['error'])) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?=htmlspecialchars($_GET['error'])?>
                                </div>
                            <?php } ?>

                            <?php if (isset($_GET['success'])) { ?>
                                <div class="alert alert-success" role="alert">
                                    <?=htmlspecialchars($_GET['success'])?>
                                </div>
                            <?php } ?>
                            
                            <div class="mb-3">
                                <input type="text" class="form-control" name="comment" required>
                                <input type="hidden" name="post_id" value="<?=$id?>">
                            </div>
                            <button type="submit" class="btn btn-primary">Comment</button>
                        </form>
                        <hr>

                        <div class="comments">
                            <?php if ($comments != 0) { 
                                foreach ($comments as $comment) {
                                    $u = getUserByID($conn, $comment['user_id']);
                            ?>
                                <div class="comment d-flex">
                                    <div>
                                        <img src="img/user-default.png" width="40" height="40">
                                    </div>
                                    <div class="p-2">
                                        <span>@<?=$u['username']?></span>
                                        <p><?=$comment['comment']?></p>
                                        <small class="text-body-secondary"><?=$comment['crated_at']?></small>
                                    </div>
                                </div>
                                <hr>
                            <?php }} ?>
                        </div>
                    </div>
                </div>
            </main>

            <!-- Sidebar with Categories -->
            <aside class="aside-main">
                <div class="list-group category-aside">
                    <a href="#" class="list-group-item list-group-item-action active">
                        Category
                    </a>
                    <?php foreach ($categories as $category) { ?>
                        <a href="category.php?category_id=<?=$category['id']?>" class="list-group-item list-group-item-action">
                            <?=$category['category']?>
                        </a>
                    <?php } ?>
                </div>
            </aside>
        </section>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".like-btn").click(function(){
                var post_id = $(this).attr('post-id');
                var liked = $(this).attr('liked');

                if (liked == 1) {
                    $(this).attr('liked', '0');
                    $(this).removeClass('liked');
                } else {
                    $(this).attr('liked', '1');
                    $(this).addClass('liked');
                }
                $(this).next().load("ajax/like-unlike.php", { post_id: post_id });
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
<?php } else {
    header("Location: blog.php");
    exit;
} ?>
