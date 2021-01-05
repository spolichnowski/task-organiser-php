<section class="project-add">
	<div class="login-wrapper">
		<button onClick="showFunction()" class="escape">x</button>
		<form class="login-form" action="process.php" method="POST">
			<h1>Add project</h1>
			<input type="text" name="project_name" placeholder="Project name" />
			<br/>
			<br/>
			<textarea name="description" placeholder="Description"></textarea>
			<br/>
			<button type="submit" name="project_save">Add project</button>
		</form>
	</div>
</section>