<?php
$conn = mysql_connect('localhost', 'root', 'stapHunu3A');
mysql_select_db('users', $conn);
$query = "SELECT *
        FROM login
        WHERE username = '$username';";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
$status = $row['status'];
?>
