<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-box {
            font-family: 'Hangyaboly', cursive;
            font-size: 1.5em;
            background-color: #6D4E43;
            color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            color: #fff;
            margin-bottom: 20px;
            text-align: center;
        }

        input {
            font-family: 'Hangyaboly', cursive;
            font-size: 1em;
            border: none;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 15px;
            width: 100%;
        }

        input[type="text"], input[type="password"] {
            background-color: #E0E0E0;
            color: #000;
        }

        button {
            background-color: #44312b;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
            cursor: pointer;
        }

        button:hover {
            background-color: #44312a;
        }

        .signup-option {
            text-align: center;
            margin-top: 15px;
        }

        .signup-option a {
            color: #b69d81;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <form class="form-box" action="php/login.php" method="post">
            <h2>Login</h2>

            <?php if(isset($_GET['error'])){ ?>
            <div class="alert alert-danger" role="alert">
                <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
            <?php } ?>

            <div class="mb-3">
                <label for="uname" class="form-label">User name</label>
                <input type="text" id="uname" name="uname" 
                       value="<?php echo (isset($_GET['uname'])) ? htmlspecialchars($_GET['uname']) : ""; ?>">
            </div>

            <div class="mb-3">
                <label for="pass" class="form-label">Password</label>
                <input type="password" id="pass" name="pass">
            </div>

            <button type="submit">Login</button>

            <div class="signup-option">
                <a href="admin-login.php">Admin Login</a> &nbsp;&nbsp;&nbsp;
                <a href="blog.php">Blog</a> &nbsp;&nbsp;&nbsp;
                <a href="signup.php">Sign Up</a>
            </div>
        </form>
    </div>
</body>
</html>