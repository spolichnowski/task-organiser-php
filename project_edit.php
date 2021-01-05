<section class="project-add">
	<div class="login-wrapper">
	<button onClick="showFunctionProject()" class="escape">x</button>
		<form class="login-form" action="process.php" method="POST">
			<h1>Edit project</h1>
			<input type="hidden" name="project_id" value="<?php echo $project['project_id'];?>" />
			<input type="text" name="project_name" placeholder="Project name" value="<?php echo $project['project_name']; ?>" />
			<br/>
			<br/>
			<textarea name="description" placeholder="Description"><?php echo $project['description'];?></textarea>
			<br/>
			<button type="submit" name="update_project">Edit project</button>
		</form>
	</div>
</section>