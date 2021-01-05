<?php

$tasks_name = $mysqli->query("SELECT * FROM tasks WHERE project_id = '$id' ORDER BY task_name");
$tasks_deadline = $mysqli->query("SELECT * FROM tasks WHERE project_id = '$id' ORDER BY deadline");
$tasks_priority = $mysqli->query("SELECT * FROM tasks WHERE project_id = '$id' ORDER BY priority");

$tasks_name_desc = $mysqli->query("SELECT * FROM tasks WHERE project_id = '$id' ORDER BY task_name DESC");
$tasks_deadline_desc = $mysqli->query("SELECT * FROM tasks WHERE project_id = '$id' ORDER BY deadline DESC");
$tasks_priority_desc = $mysqli->query("SELECT * FROM tasks WHERE project_id = '$id' ORDER BY priority DESC");


?>