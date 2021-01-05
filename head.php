<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Organiser</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="shortcut icon" href="images/bg4.jpg">
	</head>
	
<?php 
if (isset($_SESSION['message']) && !empty($_SESSION['message'])) {
	$message = $_SESSION['message'];
	$script = "<script>alert('$message')</script>";
	echo $script;
	$_SESSION['message'] = "";
}
?>