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

        .btn-success, .btn-primary {
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

        .btn-primary {
            background-color: #44312b;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #6D4E43;
        }

        .alert {
            font-family: 'Poppins', sans-serif;
            margin-top: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .form-label {
            font-family: 'Poppins', sans-serif;
            font-size: 1em;
            color: #44312b;
        }

        input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
            font-family: 'Poppins', sans-serif;
        }
    </style>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/side-bar.css">
</head>
<body>
	<?php 
      $key = "hhdsfs1263z";
	  include "inc/side-nav.php"; 
	?>

	<header>
		<div class="header-title">Dashboard - Category</div>
		<nav>
			<a href="../admin-logout.php">Logout</a>
		</nav>
	</header>
               
	<div class="main-table">
	 	<h3 class="mb-3">Create New Category
	 		<a href="Category.php" class="btn btn-success">View All Categories</a>
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
    	      action="req/Category-create.php" 
    	      method="post">

		  <div class="mb-3">
		    <label class="form-label">Category Name</label>
		    <input type="text" 
		           name="category" 
		           placeholder="Enter category name">
		  </div>
		  
		  <button type="submit" class="btn btn-primary">Create</button>
		</form>
	</div>

	<script>
	 	var navList = document.getElementById('navList').children;
	 	navList.item(2).classList.add("active");
	</script>
</body>
</html>

<?php } else {
	header("Location: ../admin-login.php");
	exit;
} ?>
