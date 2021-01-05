<?php 
session_start();
include('head.php'); 
?>
<body id="background-login">
	<div class="register-wrapper">
		<form class="login-form register-form" method="POST" action="register.php">
			<h1>Register form</h1>
			<div class="input-wrapper">
				<br/>
				<input class="login-input" type="text" name="name" placeholder="First name" />
			</div>
			<div class="input-wrapper">
				<br/>
				<input class="login-input" type="text" name="lname" placeholder="Last name" />
			</div>
			<div class="input-wrapper">
				<br/>
				<input class="login-input" type="email" name="email" placeholder="Email" />
			</div>
			<div class="input-wrapper">
				<br/>
				<input class="login-input" type="password" name="password" placeholder="Password" />
			</div>
			<div class="input-wrapper">
				<br/>
				<input class="login-input" type="password" name="password1" placeholder="Confirm password" />
			</div>
			<div class="input-wrapper">
				<br/>
				<button type="submit" class="btn-success float-right">Register</button>
			</div>
		</form>
	</div>
</body>

</html>