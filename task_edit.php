<div style="display: none;" id="edit-form<?php echo $task['task_id'] ?>">
	<section class="task-add">
		<div class="login-wrapper">
			<button onClick="showEditForm<?php echo $task['task_id'];?>()" class="escape">x</button>
			<form class="login-form" action="process.php" method="POST">
				<h1>Edit task</h1>
				<input type="hidden" name="task_id" value="<?php echo $task['task_id'];?>" />
				<input type="hidden" name="project_id" value="<?php echo $task['project_id'];?>"
				/>
				<input type="text" name="task_name" placeholder="Task name" value="<?php echo $task['task_name'] ?>"
				/>
				<br/>
				<input type="number" name="priority" placeholder="Priority" value="<?php echo $task['priority'] ?>"
				/>
				<br/>
				<input type="date" name="deadline" placeholder="Deadline" value="<?php echo $task['deadline'] ?>"
				/>
				<br/><br/>
				<select class="select" name="done">
					<option value="0">To do</option>
					<option value="1">Done</option>
				</select>
				<br/><br/>
				<textarea name="details" placeholder="Details"><?php echo $task['details'] ?></textarea>
				<br/>
				<button type="submit" name="update_task">Edit task</button>
			</form>
		</div>
	</section>
</div>