<?php 
session_start();
include('head.php');
?>

<body id="background-login">
	<div class="login-wrapper">
		<form class="login-form" method="POST" action="login.php">
			<h1>Login form</h1>
			<div class="input-wrapper">
				<input class="login-input" type="email" name="email" placeholder="Email" />
			</div>
			<div class="input-wrapper">
				<br/>
				<input class="login-input" type="password" name="password" placeholder="Password" />
			</div>
			<div class="input-wrapper">
				<br/>
				<button type="submit" name="login" class="btn-success">Log in</button>
			</div>
		</form>
	</div>
</body>

</html>