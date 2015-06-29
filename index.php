<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href="style.css" rel="stylesheet" type="text/css">
<font face="Open Sans">
<?php
if(isset($_SESSION['logged_in'])){
header("location: dashboard.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>FlamesCP Login</title>
</head>
<body>
<div id="main">
<div id="login">
<h2>Log In</h2>
<form action="login.php" method="get">
<?php if(isset($_GET['error'])){ ?>
<p><b>Error</b>: <?php echo $_GET['error']; ?></p>
<?php } ?>
<label>Username :</label>
<input id="name" name="username" placeholder="username" type="text"><br></br>
<label>Password :</label>
<input id="password" name="password" placeholder="**********" type="password"><br></br>
<input type="submit" value=" Login ">
<span><?php echo $error; ?></span>
</form>
</div>
</div>
</body>
</html>
