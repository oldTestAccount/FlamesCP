<?php
session_start();
include('session.php');
?>

<body STYLE="background-color:transparent">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<font face="Open Sans">
<title>FlamesCP | Welcome!</title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<br>
<div class="container">
<div class="well well-lg">
<h3>FlamesCP v0.5 (build 1) - Server IP: <?php echo $_SERVER['SERVER_ADDR']; ?>:25565 -  <a href="mailto:support@flameshost.com" class="btn btn-info btn-sm">Support</a></h3>
<br>
<html>
<hr>
<head>
<h1>Change your password</h1>
<p>Changing password for: <b><?php echo $_SESSION['logged_in_as']; ?></b></p>
<form action="password.php" method="GET">
<div class="input-group">
<input type="password" placeholder="New password..." name="password" class="form-control">
<span class="input-group-btn">
<input type="submit" value="Change password" class="btn btn-success">
</span>
</div>
</form>

<?php
if(isset($_GET['password'])){
$password = $_GET['password'];
include_once 'config.php';
$conn = mysql_connect('127.0.0.1', 'root', $mysqlpass);
mysql_select_db('users', $conn);
$username = $_SESSION['logged_in_as'];
$sql = 'update login SET password="'.$password.'" where username="'.$username.'";';
$query=mysql_query($sql);
echo "<div class='alert alert-success'>Password changed successfully!</div>";
}
echo '<a href="dashboard.php" class="btn btn-danger">Return to dashboard</a>';
?>

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

