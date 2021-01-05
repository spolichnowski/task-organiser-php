<?php
session_start();
include('db.php');

if (isset($_POST['project_save'])) {
    $project_name = $_POST['project_name'];
    $description = $_POST['description'];
    $date_created_project = date('Y-m-d');
    $user_id = $_SESSION['user_id'];

    if (empty($project_name)) {
        $_SESSION['message'] = "Check project name.";
        header("location: dashboard.php");
    } elseif (empty($description)) {
        $_SESSION['message'] = "Check project description.";
        header("location: dashboard.php");
    } else {
        $new_project_sql = "INSERT INTO projects (user_id, project_name, date_created, description) VALUES ('$user_id', '$project_name', '$date_created_project' ,'$description')";
        if ($mysqli->query($new_project_sql)) {
            $_SESSION['message'] = "Project created successfully";
            
            header("location: dashboard.php");
        }
    }
}

if (isset($_POST['save_task'])) {
    $task_name = $_POST['task_name'];
    $priority = $_POST['priority'];
    $deadline = $_POST['deadline'];
    $details = $_POST['details'];
    $date_created_task = date('Y-m-d');
    $user_id = $_SESSION['user_id'];
    $project_id = $_POST['project_id'];
    $done = 0;

    if (empty($task_name)) {
        $_SESSION['message'] = "Check task name.";
        header("location: tasks.php?id=$project_id");
    } elseif (empty($priority)) {
        $_SESSION['message'] = "Check priority.";
        header("location: tasks.php?id=$project_id");
    } elseif (empty($deadline)) {
        $_SESSION['message'] = "Check deadline.";
        header("location: tasks.php?id=$project_id");
    } elseif (empty($details)) {
        $_SESSION['message'] = "Check details.";
        header("location: tasks.php?id=$project_id");
    } else {
        $new_task_sql = "INSERT INTO tasks (user_id, project_id, task_name, date_created, details, deadline, priority, done) VALUES ('$user_id', '$project_id', '$task_name', '$date_created_task', '$details', '$deadline', '$priority', '$done')";

        if ($mysqli->query($new_task_sql)) {
            $_SESSION['message'] = "Task created successfully.";

            header("location: tasks.php?id=$project_id");
        } else {
            echo $new_task_sql;
        }
    }
}

if (isset($_POST['update_project'])) {
    $project_id = $_POST['project_id'];
    $project_name = $_POST['project_name'];
    $description = $_POST['description'];
    $date_created_project = date('Y-m-d');

    $mysqli->query("UPDATE projects SET project_name='$project_name', date_created='$date_created_project', description='$description' WHERE project_id='$project_id'");

    $_SESSION['message'] = "Project has been edited successfully.";

    header("location: tasks.php?id=$project_id");
}

if (isset($_POST['update_task'])) {
    $project_id = $_POST['project_id'];
    $task_id = $_POST['task_id'];
    $task_name = $_POST['task_name'];
    $priority = $_POST['priority'];
    $deadline = $_POST['deadline'];
    $details = $_POST['details'];
    $done = $_POST['done'];
    $date_created_task = date('Y-m-d');
    echo "UPDATE tasks SET task_name='$task_name', details='$details', date_created='$date_created_task', deadline='$deadline', done='$done',  priority='$priority' WHERE task_id='$task_id'";
    $mysqli->query("UPDATE tasks SET task_name='$task_name', details='$details', date_created='$date_created_task', deadline='$deadline', done='$done',  priority='$priority' WHERE task_id='$task_id'");

    $_SESSION['message'] = "Task has been edited successfully.";

    header("location: tasks.php?id=$project_id");
}

if (isset($_GET['delete_project'])) {
    $project_id = $_GET['project_id'];
    $delete_tasks_sql = "DELETE FROM tasks WHERE project_id='$project_id'";
    $delete_project_sql = "DELETE FROM projects WHERE project_id='$project_id'";
    if ($mysqli->query($delete_tasks_sql)) {
        if ($mysqli->query($delete_project_sql)) {
            $_SESSION['message'] = "Project deleted successfully.";

            header("location: dashboard.php");
        } else {
            $_SESSION['message'] = "There was a problem try again later.";

            header("location: dashboard.php");
        }
    } else {
        $_SESSION['message'] = "There was a problem try again later.";

        header("location: dashboard.php");
    }
}

if (isset($_GET['delete_task'])) {
    $project_id = $_GET['project_id'];
    $task_id = $_GET['task_id'];
    $delete_task_sql = "DELETE FROM tasks WHERE task_id = '$task_id'";
    if ($mysqli->query($delete_task_sql)) {
        $_SESSION['message'] = "Task deleted successfully.";
        
        header("location: tasks.php?id=$project_id");
    } else {
        $_SESSION['message'] = "There was a problem try again later.";

        header("location: tasks.php?id=$project_id");
    }
}

