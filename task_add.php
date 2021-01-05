<section class="project-add">
	<div class="login-wrapper">
	<button onClick="showFunctionTask()" class="escape">x</button>
		<form class="login-form" action="process.php" method="POST">
			<h1>Ad task</h1>
			<input type="hidden" name="project_id" value="<?php echo $_GET['id'];?>"/>
			<input type="text" name="task_name" placeholder="Task name" />
			<br/>
			<input type="number" name="priority" placeholder="Priority"/>
			<br/>
			<input type="date" name="deadline" placeholder="Deadline"/>
			<br/>
			<br/>
			<textarea name="details" placeholder="Details"></textarea>
			<br/>
			<button type="submit" name="save_task">Add task</button>
		</form>
	</div>
</section>