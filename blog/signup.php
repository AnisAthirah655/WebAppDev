<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign Up</title>
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

        h4 {
            color: #fff;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-label {
            font-family: 'Hangyaboly', cursive;
            font-size: 1em;
            color: #fff;
            margin-bottom: 5px;
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

        .alert {
            font-size: 0.9em;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
    	<form class="form-box shadow"
    	      action="php/signup.php" 
    	      method="post">

    		<h4>Create Account</h4>
    		
    		<?php if(isset($_GET['error'])){ ?>
    		<div class="alert alert-danger" role="alert">
			  <?php echo htmlspecialchars($_GET['error']); ?>
			</div>
		    <?php } ?>

		    <?php if(isset($_GET['success'])){ ?>
    		<div class="alert alert-success" role="alert">
			  <?php echo htmlspecialchars($_GET['success']); ?>
			</div>
		    <?php } ?>

		  <div class="mb-3">
		    <label class="form-label">Full Name</label>
		    <input type="text" 
		           name="fname"
		           value="<?php echo (isset($_GET['fname']))? htmlspecialchars($_GET['fname']):"" ?>">
		  </div>

		  <div class="mb-3">
		    <label class="form-label">User Name</label>
		    <input type="text" 
		           name="uname"
		           value="<?php echo (isset($_GET['uname']))? htmlspecialchars($_GET['uname']):"" ?>">
		  </div>

		  <div class="mb-3">
		    <label class="form-label">Password</label>
		    <input type="password" 
		           name="pass">
		  </div>
		  
		  <button type="submit">Sign Up</button>
		  <div class="signup-option">
		      <a href="login.php">Already have an account? Login</a>
		  </div>
		</form>
    </div>
</body>
</html>
