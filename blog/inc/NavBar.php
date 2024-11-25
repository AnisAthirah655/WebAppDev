<nav class="navbar custom-navbar">
  <div class="container-fluid">
    <div class="logo">
      <a class="navbar-brand header-title" href="blog.php">
        <img src="logo.png" alt="Soft Glowery Skincare Logo">
      </a>
    </div>

    <div class="nav-wrapper">
      <ul class="nav-links">
        <li><a class="nav-link active custom-nav-link" href="index.php">Home</a></li>
        <li><a class="nav-link custom-nav-link" href="blog.php">Blog</a></li>
        <li><a class="nav-link custom-nav-link" href="category.php">Category</a></li>
        <?php if ($logged) { ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle custom-nav-link" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-user" aria-hidden="true"></i> @<?=$_SESSION['username']?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </li>
        <?php } else { ?>
        <li><a class="nav-link custom-nav-link" href="login.php">Login | Signup</a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>

<style>

	/* Import Hangyaboly font */
	@font-face {
            font-family: 'Hangyaboly';
            src: url('../../../../../xampp/htdocs/auth_project/fonts/Hangyaboly.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
	}

	/* Header and navigation styling */
	.custom-navbar {
	background-color: #fff;
	padding: 10px;
	display: flex;
	align-items: center;
	justify-content: left;
	border-bottom: 2px solid #44312b;
	position: relative;
	}

	/* Logo Styling */
	.logo img {
	width: 198px;
	max-width: 200px;
	}

	/* Navigation styling */
	.nav-wrapper {
	position: absolute;
	right: 30px;
	top: 50%;
	transform: translateY(-50%);
	}

	.nav-links {
	display: flex;
	gap: 100px;
	list-style: none;
	padding: 0;
	margin: 0;
	}

	.nav-links li {
	list-style: none;
	}

	.nav-links li a {
	font-family: 'Hangyaboly', cursive;
	text-decoration: none;
	font-size: 25px;
	color: #000;
	text-transform: lowercase;
	transition: color 0.3s ease;
	}

	.nav-links li a:hover {
	color: #6D4E43;
	}

	/* Dropdown Menu Styling */
	.dropdown-menu {
	background-color: #fff;
	border-radius: 5px;
	box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
	}

	.dropdown-item {
	font-family: 'Poppins', sans-serif;
	font-size: 16px;
	color: #44312b;
	}

	.dropdown-item:hover {
	background-color: #f8f8f8;
	color: #6D4E43;
	}

	/* Responsive toggler styling for smaller screens */
	.navbar-toggler {
	border: none;
	background-color: transparent;
	}

	.navbar-toggler-icon {
	width: 25px;
	height: 3px;
	background-color: #44312b;
	display: block;
	margin: 5px auto;
	}

	.navbar-toggler-icon:after {
	content: '';
	display: block;
	width: 25px;
	height: 3px;
	background-color: #44312b;
	margin-top: 5px;
	}
	</style>