<?php

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

        $host = 'localhost';
        $user = 'anaeem';
        $passwd = 'CS389';
        $database = 'anaeem';
        $connect = mysqli_connect($host, $user, $passwd, $database);

$query = "Insert into users (username, email, password) values ('$username', '$email', '$password')";
        if(mysqli_query($connect, $query))
        {
              print "<P>Insert successful.<P>";
	      print "<p> Login by Clicking here <a href=homepage.html> here";
                // use include for showing the table content
                ;
        }
        else{
                print "<P>Insert fail.<p>";
                print "<A HREF=signup.html> Click here and Submit the form again. </A>";}
        mysqli_close($connect);
?>
