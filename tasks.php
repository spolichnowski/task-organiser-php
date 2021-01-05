<?php 
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] = true ):
include('db.php'); 
$id = $_GET['id'];
$projects = $mysqli->query("SELECT * FROM projects WHERE project_id = '$id'");
$project = $projects->fetch_assoc();
$tasksArray = array();
include('head.php');
require('task_sorting.php');
?>

<body id="background-task">
	<div id="form">
		<?php include('task_add.php'); ?>
	</div>
	<div id="edit-project">
		<?php include('project_edit.php'); ?>
	</div>

	<section>
		<div class="float-right home-icon">
			<a href="dashboard.php">
				<img src="images/home.png">
			</a>
		</div>
		<div class="float-right plus-icon">
			<button onClick="showFunctionTask()">
				<img src="images/plus-icon.png">
			</button>
		</div>
		<div class="left-nav">
			<div class="date-task">
				<h2>
					<?php echo date('D, m Y'); ?>
				</h2>
			</div>
			<div class="name-task">
				<h2>
					<?php echo $project['project_name'] ?>
				</h2>
			</div>
			<div class="projects">
				<div class="project">
					<p>
						<?php echo $project['description'];?>
					</p>
				</div>
			</div>

			<div class="edit-project">
				<button onClick="showFunctionProject()">
					<h3>Edit project</h3>
				</button>
			</div>

			<div class="edit-project">
				<form action="process.php" method="GET">
					<input type="hidden" name="project_id" value="<?php echo $project['project_id'];?>" />
					<button class="red" name="delete_project"><h3>Delete project</h3></button>
				</form>
			</div>

		</div>
		<div class="task-wrapper">
			<form class="select-margin" method="GET" action="<?=$_SERVER['PHP_SELF'];?>">
				<input type="hidden" name="id" value="<?php echo $id; ?>" />
				<select class="select" name="sort_by">
					<option value=""><?php echo $option1=(!empty($_GET['sort_by']) ? $_GET['sort_by'] :"Choose option"); ?></option>
					<option value="Name">Name</option>
					<option value="Deadline">Deadline</option>
					<option value="Priority">Priority</option>
				</select>
				<select class="select" name="sort_type">
					<option value=""><?php echo $option2=(!empty($_GET['sort_type']) ? $_GET['sort_type'] :"Choose option"); ?></option>
					<option value="Ascending">Ascending</option>
					<option value="Descending">Descending</option>
				</select>
				<button class="select" name="sort">Sort</button>
			</form>
			<div class="task-align">
				<div class="border-th">
					<div class="task-c">
						<h4>Task name</h4>
					</div>
					<div class="task-c">
						<h4>Importance</h4>
					</div>
					<div class="task-c">
						<h4>Status</h4>
					</div>
					<div class="task-c">
						<h4>Deadline</h4>
					</div>
					<div class="task-c">
						<h4>More info</h4>
					</div>
				</div>
				<?php
				if (isset($_GET['sort']) && !empty($_GET['sort_by']) || !empty($_GET['sort_type']) ) { 
					$_GET['id'] = $id;
					
					if ($_GET['sort_type'] == "Ascending" || empty($_GET['sort_type'])) {
						if ($_GET['sort_by']=="Name"){
							$tasks = $tasks_name;
						} elseif ($_GET['sort_by']=="Deadline") {
							$tasks = $tasks_deadline;
						} elseif ($_GET['sort_by']=="Priority") {
							$tasks = $tasks_priority;
						} else {
							$tasks = $tasks_name;
						}
					} elseif ($_GET['sort_type'] == "Descending" && !empty($_GET['sort_type'])) {
						if ($_GET['sort_by']=="Name"){
							$tasks = $tasks_name_desc;
						} elseif ($_GET['sort_by']=="Deadline") {
							$tasks = $tasks_deadline_desc;
						} elseif ($_GET['sort_by']=="Priority") {
							$tasks = $tasks_priority_desc;
						} else {
							$tasks = $tasks_name_desc;
						}
					} 
				} else {
					$tasks = $mysqli->query("SELECT * FROM tasks WHERE project_id = '$id'");
				}
				while ($task = $tasks->fetch_assoc()): 
					array_push($tasksArray, $task['task_id']);	
					include('task.php');
					include('task_edit.php')
					?>
				<div>
					<div class="border">
						<div class="task-c">
							<h4>
								<?php echo $task['task_name'];?>
							</h4>
						</div>
						<div class="task-c">
							<h4>
								<?php echo $task['priority'];?>
							</h4>
						</div>
						<div class="task-c <?php echo $task['done'] ? "done": "to-do"; ?>">
							<h4>
								<?php echo $task['done'] ? "Done": "In progress";?>
							</h4>
						</div>
						<div class="task-c">
							<h4>
								<?php echo $task['deadline'];?>
							</h4>
						</div>
						<div class="task-c-button">
							<button onClick="showFunction<?php echo $task['task_id'] ?>()">
								<div class="more-button"></div>
							</button>
						</div>
					</div>
				</div>
				<?php endwhile;?>
			</div>
		</div>
		<footer>
		</footer>
	</section>
	<script>
		<?php for ($i = count($tasksArray)-1; $i>=0; $i--):?>
		function showFunction<?php echo $tasksArray[$i];?>() {
			var button = document.getElementById("form<?php echo $tasksArray[$i];?>");
			if (button.style.display === "block") {
				button.style.display = "none";
			} else {
				button.style.display = "block";
			}
		}
		<?php endfor;?>
	</script>
	<script>
		<?php for ($i = count($tasksArray)-1; $i>=0; $i--):?>
		function showEditForm<?php echo $tasksArray[$i];?>() {
			var button = document.getElementById("edit-form<?php echo $tasksArray[$i];?>");
			if (button.style.display === "block") {
				button.style.display = "none";
			} else {
				button.style.display = "block";
			}
		}
		<?php endfor;?>
	</script>
	<script>
		function showFunctionTask() {
			var button = document.getElementById("form");
			if (button.style.display === "block") {
				button.style.display = "none";
			} else {
				button.style.display = "block";
			}
		}

		function showFunctionProject() {
			var button = document.getElementById("edit-project");
			if (button.style.display === "block") {
				button.style.display = "none";
			} else {
				button.style.display = "block";
			}
		}
	</script>
</body>

</html>
<?php 
else: 
	echo "You don't have permission. Try to log in or register.";
endif;
?>
