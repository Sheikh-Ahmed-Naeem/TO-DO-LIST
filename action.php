<?php
session_start();
$connect = mysqli_connect('localhost', '-----', '------', '------');

if (!isset($_SESSION['user_id'])) {
    header("Location: homepage.html");
    exit();
}

$user_id = $_SESSION['user_id'];

// ADD TASK
if (isset($_POST['add'])) {
    $task = mysqli_real_escape_string($connect, $_POST['task']);

    if (!empty($task)) {
        $sql = "INSERT INTO tasks (user_id, task) VALUES ('$user_id', '$task')";
        mysqli_query($connect, $sql);
    }

    header("Location: update.php");
    exit();
}

// DELETE TASK
if (isset($_GET['delete'])) {
    $task_id = (int) $_GET['delete'];

    $sql = "DELETE FROM tasks WHERE id = '$task_id' AND user_id = '$user_id'";
    mysqli_query($connect, $sql);

    header("Location: update.php");
    exit();
}

// UPDATE TASK
if (isset($_POST['update'])) {
    $task_id = (int) $_POST['task_id'];
    $task = mysqli_real_escape_string($connect, $_POST['task']);
    $status = mysqli_real_escape_string($connect, $_POST['status']);

    $sql = "UPDATE tasks 
            SET task = '$task', status = '$status' 
            WHERE id = '$task_id' AND user_id = '$user_id'";
    mysqli_query($connect, $sql);

    header("Location: update.php");
    exit();
}

header("Location: update.php");
exit();
?>
