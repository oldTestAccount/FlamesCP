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
die('<div class="alert alert-danger">Adding users is not permitted as a moderator.</div>');
}
?>
<h1>Add user</h1>
<hr>
<form action="adduser.php" method="GET" id="user">
<input type="text" name="username" class="form-control" placeholder="Username...">
<br>
<input type="password" name="password" class="form-control" placeholder="Password...">
<br>
<p><b>Permission Level:</b></p>
<select class="form-control" id="user" name="rank">
  <option value="admin">Administrator</option>
  <option value="mod">Moderator</option>
</select>
<br>
<p>Administrator: All features enabled</p>
<p>Moderator: Console enabled, starting/stopping server disallowed.</p>
<br>
<input type="submit" class="btn btn-info btn-lg" value="Create user">
</form>

<?php
if (isset($_GET['username']) && isset($_GET['password']) && isset($_GET['rank'])){
$username = $_GET['username'];
$password = $_GET['password'];
$rank = $_GET['rank'];
$conn = mysql_connect('127.0.0.1', 'root', 'stapHunu3A');
mysql_select_db('users', $conn);
$q = 'select status from login where username="'.$username.'"';
$qr = mysql_query($q);
if (mysql_num_rows($qr) == 0) {
$query = 'insert into login (username, password, status) VALUES("'.$username.'", "'.$password.'", "'.$rank.'");';
$out = mysql_query($query);
echo '<pre>';
echo 'Created user!';
echo '<a href="dashboard.php" class="btn btn-info">Return to dashboard</a>';
echo '</pre>';
} else {
echo '<pre>';
echo "User exists!";
echo '<a href="dashboard.php" class="btn btn-info">Return to dashboard</a>';
echo '</pre>';
}

} else {
echo '<a href="dashboard.php" class="btn btn-info">Return to dashboard</a>';
}
?>


