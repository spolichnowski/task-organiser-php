<div style="display: none;" id="form<?php echo $task['task_id'] ?>">
	<section class="task-add">
		<div class="login-wrapper">
			<button onClick="showFunction<?php echo $task['task_id'] ?>()" class="escape">x</button>
			<div class="login-form">
				<h1>
					<?php echo $task['task_name']?>
				</h1>
				<p>
					<?php echo $task['details']?>
				</p>
				<button onClick="showEditForm<?php echo $task['task_id'];?>();showFunction<?php echo $task['task_id'];?>();">Edit task</button>
				<form action="process.php" method="GET">
					<input type="hidden" name="task_id" value="<?php echo $task['task_id'];?>" />
					<input type="hidden" name="project_id" value="<?php echo $task['project_id'];?>" />
					<button class="red" name="delete_task">Delete task</button>
				</form>
			</div>
		</div>
	</section>
</div>