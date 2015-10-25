<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<body STYLE="background-color:transparent">
<?php
include('session.php');
?>
<div class="btn-group">
<a href="startserver.php" target="_blank" class="btn btn-success">Start Server</a>
<a href="stop.php" target="_blank" class="btn btn-warning">Stop Server</a>
<a href="password.php" class="btn btn-primary">Change password</a>
<a href="adduser.php" class="btn btn-info">Add user</a>
<a href="rmuser.php" class="btn btn-default">Remove user</a>
<base target="_parent" />
<a href="logout.php" class="btn btn-danger">Log out</a>
</base>
</div>
<br> </br>
<p>Hello! You're currently logged in as: <b><?php echo $_SESSION['logged_in_as']; ?></b>, and your permissions are set to: <?php echo $_SESSION['rank']; ?>.</p>
</div>
