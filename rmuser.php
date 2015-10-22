<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<title>FlamesCP | Add user</title>
<style type="text/css">
body {
  /* Location of the image */
  background-image: url(bg.jpg);

  /* Background image is centered vertically and horizontally at all times */
  background-position: center center;

  /* Background image doesn't tile */
  background-repeat: no-repeat;

  /* Background image is fixed in the viewport so that it doesn't move when
     the content's height is greater than the image's height */
  background-attachment: fixed;

  /* This is what makes the background image rescale based
     on the container's size */
  background-size: cover;

  /* Set a background color that will be displayed
     while the background image is loading */
  background-color: #464646;
}body {
  /* Location of the image */
  background-image: url(bg.jpg);

  /* Background image is centered vertically and horizontally at all times */
  background-position: center center;

  /* Background image doesn't tile */
  background-repeat: no-repeat;

  /* Background image is fixed in the viewport so that it doesn't move when
     the content's height is greater than the image's height */
  background-attachment: fixed;

  /* This is what makes the background image rescale based
     on the container's size */
  background-size: cover;

  /* Set a background color that will be displayed
     while the background image is loading */
  background-color: #464646;
}
</style>
<br> </br>
<div class="container">
<div class="well well-lg">
<font face="Open Sans">
<?php
require('session.php');
if($_SESSION['rank'] == "mod"){
die('<div class="alert alert-danger">Removing users is not permitted as a moderator.</div>');
}
?>
<h1>Remove user</h1>
<hr>
<?php
	include_once 'config.php';
$con = mysql_connect('127.0.0.1', 'root', $mysqlpass);
mysql_select_db('users', $con);
$userlist = mysql_query('select username, status from login;');
?>
<form action="rmuser.php" method="GET" id="user">

<select class="form-control" id="user" name="username">

<?php

while($users = mysql_fetch_array($userlist)){
        echo "<option value=".$users['username'].">Username: ".$users['username']." | Permission level: ".$users['status']."</option>";
}
?>

</select>

<br>
<input type="submit" class="btn btn-danger" value="Remove user">

</form>


<?php
if (isset($_GET['username'])){
$username = $_GET['username'];

if ($username == "admin"){
die("<div class='alert alert-danger'>You may not delete the administrative user.</div><a href='dashboard.php' class='btn btn-info'>Return to dashboard</a>");
}

$conn = mysql_connect('127.0.0.1', 'root', 'stapHunu3A');
mysql_select_db('users', $conn);
$query = 'delete from login where username="'.$username.'"';
$out = mysql_query($query);
echo '<pre>User deleted.</pre>';
echo "<a href='dashboard.php' class='btn btn-info'>Return to dashboard</a>";
} else {
echo "<a href='dashboard.php' class='btn btn-info'>Return to dashboard</a>";
}
?>


