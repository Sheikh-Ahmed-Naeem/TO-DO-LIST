<?php
session_start();
$connect = mysqli_connect('localhost', 'anaeem', 'CS389', 'anaeem');
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT id, task, status, created_at FROM tasks WHERE user_id = '$user_id' ORDER BY created_at DESC";
$result_id = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Display Tasks</title>
</head>
<body>

<center>
    <h1>TO-DO LIST</h1>
</center>

<h2>Add Task</h2>
<form action="action.php" method="POST">
    <input type="text" name="task" required>
    <button type="submit" name="add">Add Task</button>
</form>

<br><br>

<h2>Your Tasks</h2>

<?php
if ($result_id) {
    if (mysqli_num_rows($result_id) > 0) {
        print '<table border="1" cellpadding="8" cellspacing="0">';
        print '<tr>';
        print '<th>ID</th>';
        print '<th>Task</th>';
        print '<th>Status</th>';
        print '<th>Created At</th>';
        print '<th>Update</th>';
        print '<th>Delete</th>';
        print '</tr>';

        while ($row = mysqli_fetch_assoc($result_id)) {
            print '<tr>';

            print '<td>' . $row['id'] . '</td>';
            print '<td>' . htmlspecialchars($row['task']) . '</td>';
            print '<td>' . htmlspecialchars($row['status']) . '</td>';
            print '<td>' . $row['created_at'] . '</td>';

            print '<td>
                    <form action="action.php" method="POST">
                        <input type="hidden" name="task_id" value="' . $row['id'] . '">
                        <input type="text" name="task" value="' . htmlspecialchars($row['task']) . '" required>
                        <select name="status">
                            <option value="Pending"' . ($row['status'] == 'Pending' ? ' selected' : '') . '>Pending</option>
                            <option value="Completed"' . ($row['status'] == 'Completed' ? ' selected' : '') . '>Completed</option>
                        </select>
                        <button type="submit" name="update">Update</button>
                    </form>
                  </td>';

            print '<td><a href="action.php?delete=' . $row['id'] . '">Delete</a></td>';

            print '</tr>';
        }

        print '</table>';
    } else {
        print 'No tasks found.';
    }
} else {
    print 'Query failed: ' . mysqli_error($conn);
}
?>

<br><br>
<a href="homepage1.php">Back</a>

</body>
</html>
