<?php
session_start();
$user_id = $_SESSION['user_id'];
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<Center>
<h1> WELCOME TO TO-DO LIST WEBSITE... </h1>
<BR><BR><h2> PLz click <A HREF=displaytask.php> here to see the to-do list.</A>
<BR><h2> Plz click <A HREF=update.php> here to add, delete or update the to-do list.</A>
</CENTER>
