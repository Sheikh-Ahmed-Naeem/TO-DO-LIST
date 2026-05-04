<center>
<?php
session_start();

	$user_id = $_SESSION['user_id'];
        $host = 'localhost';
        $user = 'anaeem';
        $passwd = 'CS389';
        $database = 'anaeem';

        $connect = mysqli_connect($host, $user, $passwd, $database);
        $query = "select * from tasks where user_id = '$user_id'";
//      print "The query is <i> $query </i> ";
        $result_id = mysqli_query($connect, $query);

if ($result_id) {
    print '<table border=1>';
    print '<tr>';
    print '<th>ID</th><th>Task</th><th>Status</th><th>Created At</th>';
    print '</tr>';

    while ($row = mysqli_fetch_assoc($result_id)) {
        print '<tr>';
        print '<td>' . $row['id'] . '</td>';
        print '<td>' . htmlspecialchars($row['task']) . '</td>';
        print '<td>' . $row['status'] . '</td>';
        print '<td>' . $row['created_at'] . '</td>';
        print '</tr>';
    }                print '</table>';
        }
        else
                print "Fail.<p>";

        mysqli_close($connect);
?>
</center>

