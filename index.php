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

.content {
background-color: white;
color: black;
}

.flatBtn {
border-radius: 0px;
}
</style>

<!DOCTYPE html>
<html>
<head>
<title>FlamesCP Login</title>
</head>
<body>
<div id="main">
<div class="content" id="login">
<h2><b>FlamesCP</b>: Login</h2>
<br>
<hr>
<form action="login.php" method="get">
<?php if(isset($_GET['error'])){ ?>
<div class="alert alert-danger"><b>Error</b>: <?php echo $_GET['error']; ?></div><br>
<?php } ?>
<?php if(isset($_GET['loggedout'])){ ?>
<div class="alert alert-info">You have been logged out.</div>
<?php } ?>
<div class="input-group-vertical">
<input id="name" class="form-control input-lg" name="username" placeholder="Username..." type="text"><br>
<input id="password" class="form-control input-lg" name="password" placeholder="Password..." type="password"><br>
</div>
<br>
<div class="flatBtn">
<input class="flatBtn" type="submit" value=" Login "></div>
</form>
</div>
</div>
</body>
</html>
