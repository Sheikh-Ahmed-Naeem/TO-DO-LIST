<?php
session_start();

$connect = mysqli_connect('localhost', 'anaeem', 'CS389', 'anaeem');

$email = trim($_POST['email']);
$password = trim($_POST['password']);

$query = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($connect, $query);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);

    // ✅ Plain password check
    if ($password == $user['password']) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: homepage1.php");
        exit();
    } else {
        echo "Wrong password!";
    }

} else {
    echo "User not found!";
}

mysqli_close($connect);
?>
