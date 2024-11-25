<?php 
   
   if (isset($key) && $key == "hhdsfs1263z") {
 ?>
 <style>
	* {
	padding: 0;
	margin: 0;
	box-sizing: border-box;
	font-family: arial, sans-serif;
}

.main-profile-link a{
	text-decoration: none;
	color: #eee;
}
.main-profile-link i:hover {
	color: #c5a689;
}
.main-profile-link a:hover {
	color: #c5a689;
}
.header {
	display: flex;
	justify-content: space-between;
	align-items: center;
	padding: 15px 30px;
	background: #44312b;
	color: #fff;
}

.u-name {
	font-size: 20px;
}
.u-name b {
	color: #c5a689;
}
.header i {
	font-size: 30px;
	cursor: pointer;
	color: #fff;
}

.user-p h4 {
	color: #ccc;
	font-size: 1.2em;
	padding-left: 20px;

}
.side-bar {
	width: 250px;
	background: #44312b;
	min-height: 100vh;
	transition: 500ms width;
}
.body {
	display: flex;
}

.side-bar ul {
	margin-top: 20px;
	list-style: none;
	padding-left: 0;
}
.side-bar ul li {
	font-size: 16px;
	padding: 15px 0px;
	padding-left: 20px;
	transition: 500ms background;
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
}
.side-bar ul li:hover {
	background: #c5a689;
}
.side-bar ul .active {
	background: #c5a689;
}
.side-bar ul li a {
	text-decoration: none;
	color: #eee;
	cursor: pointer;
	letter-spacing: 1px;
}
.side-bar ul li a i {
	display: inline-block;
	padding-right: 10px;
	font-size: 23px;
}
#navbtn {
	display: inline-block;
	margin-left: 70px;
	font-size: 20px;
	transition: 500ms color;
}
#checkbox {
	display: none;
}
#checkbox:checked ~ .body .side-bar {
	width: 60px;
}
#checkbox:checked ~ .body .side-bar .user-p{
	visibility: hidden;
}
#checkbox:checked ~ .body .side-bar a span{
	display: none;
}

</style>
<input type="checkbox" id="checkbox">
	<header class="header">
		<h2 class="u-name">Soft <b>Glowery</b>
			<label for="checkbox">
				<i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
			</label>
		</h2>
		<div class="d-flex align-items-center main-profile-link" >
			<a href="profile.php" >
			<i class="fa fa-user" aria-hidden="true"></i>&nbsp;
		   <span>@<?php echo $_SESSION['username']; ?></span>
		   </a>
		</div>
	</header>
	<div class="body">
		<nav class="side-bar">
			<div class="user-p">
				
			</div>
			<ul id="navList">
				<li >
					<a href="Users.php">
						<i class="fa fa-users" aria-hidden="true"></i>
						<span>Users</span>
					</a>
				</li>
				<li>
					<a href="Post.php">
						<i class="fa fa-wpforms" aria-hidden="true"></i>
						<span>Post</span>
					</a>
				</li>
				<li>
					<a href="Category.php">
						<i class="fa fa-window-restore" aria-hidden="true"></i>
						<span>Category</span>
					</a>
				</li>
				<li>
					<a href="Comment.php">
						<i class="fa fa-comment-o" aria-hidden="true"></i>
						<span>Comment</span>
					</a>
				</li>
				<li>
					<a href="../logout.php">
						<i class="fa fa-power-off" aria-hidden="true"></i>
						<span>Logout</span>
					</a>
				</li>
			</ul>
		</nav>
		<section class="section-1">

<?php 
   } 
 ?>