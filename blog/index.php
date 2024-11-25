<?php 
session_start();
$logged = false;
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    $logged = true;
    $user_id = $_SESSION['user_id'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style type="text/css">
        /* Import Hangyaboly font */
        @font-face {
            font-family: 'Hangyaboly';
            src: url('fonts/Hangyaboly.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #c5a689;
            color: #44312b;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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

        .main-banner {
            height: 400px;
            background: url('your-banner-image.jpg') no-repeat center center;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            text-align: center;
        }

        .main-banner h1 {
            font-family: 'Hangyaboly', cursive;
            font-size: 3em;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        .content {
            padding: 20px;
            text-align: center;
        }

        .btn-primary {
            background-color: #44312b;
            border: none;
            padding: 15px 25px;
            color: #fff;
            font-family: 'Hangyaboly', cursive;
            font-size: 1.2em;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-primary:hover {
            background-color: #6D4E43;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- Include Navbar -->
    <?php include 'inc/NavBar.php'; ?>

    <!-- Main Banner Section -->
    <div class="main-banner">
        <h1>Welcome to Our Website!</h1>
    </div>

    <!-- Content Section -->
    <div class="content">
        <h2>Discover the amazing posts we have for you!</h2>
        <p>If you're logged in, you'll have access to exclusive content!</p>
        
        <?php if ($logged) { ?>
            <p>Hello, <?php echo htmlspecialchars($_SESSION['username']); ?>! Welcome back.</p>
            <a href="blog.php" class="btn-primary">Check our blog post!!</a>
        <?php } else { ?>
            <p><a href="login.php" class="btn-primary">Login to access more</a></p>
        <?php } ?>
    </div>

    

</body>
</html>
