<?php 
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] = true ):
include('db.php');
$user_id= $_SESSION['user_id'];
$projects = $mysqli->query("SELECT * FROM projects WHERE user_id='$user_id'");
include('head.php');
?>

<body id="background2">
	<div id="form">
		<?php include('project_add.php'); ?>
	</div>
	<nav>
		<div class="float-left">
			<div class="brand-name">
				<h1>Project Organiser</h1>
			</div>
			<div class="project-box-wrapper">
				<?php while ($project = $projects->fetch_assoc()): ?>
				<a href="tasks.php?id=<?php echo $project['project_id'] ?>">
					<div class="project-box">
						<h1>
							<?php echo $project['project_name'] ?>
						</h1>
					</div>
				</a>
				<?php endwhile; ?>
			</div>
		</div>
		<ul class="float-right">
			<li class="li-button">
				<form action="logout.php" method="POST">
					<button class="" name="logout">Log out</button>
				</form>
			</li>
		</ul>
		<div class="float-right date">

		</div>
	</nav>
	<div class="app-description float-right">
		<h1>Organise your projects</h1>
		<p>
			This is simple application that will help you with managing your time and projects. 
			Do not waste time use it!
		</p>
		<button onClick="showFunction()" class="a-button float-right">Create project</button>
	</div>
	<?php include('footer.php')?>
</body>

<script>
	function showFunction() {
		var button = document.getElementById("form");
		if (button.style.display === "block") {
			button.style.display = "none";
		} else {
			button.style.display = "block";
		}
	}
</script>

</html>
<?php 
else: 
	echo "You don't have permission. Try to log in or register.";
	echo $_SESSION['logged_in'];
endif;
?>

