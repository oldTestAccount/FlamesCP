<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<link href="style.css" rel="stylesheet" type="text/css">
<font face="Open Sans">
<center>
<br> </br>

<?php
if(isset($_SESSION['logged_in'])){
header("location: dashboard.php");
}
?>

<font color="white">

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

<!DOCTYPE html>
<html>
<head>
<title>FlamesCP Login</title>
</head>
<body>
<div id="main">
<div id="login">
<h2><b>FlamesCP Login</b></h2>
<br>
<hr>
<form action="login.php" method="get">
<?php if(isset($_GET['error'])){ ?>
<div class="alert alert-danger"><b>Error</b>: <?php echo $_GET['error']; ?></div>
<?php } ?>
<div class="input-group-vertical">
<input id="name" class="form-control" name="username" placeholder="Username..." type="text">
<input id="password" class="form-control" name="password" placeholder="Password..." type="password">
</div>
<br>
<input type="submit" value=" Login ">
<span><?php echo $error; ?></span>
</form>
</div>
</div>
</body>
</html>
