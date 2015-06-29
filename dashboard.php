<?php
session_start();
include('session.php');
?>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<font face="Open Sans">
<title>FlamesCP | Welcome!</title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<br>
<div class="container">
<div class="well well-lg">
<h3>FlamesCP v0.03 (build 15) - Server IP: <?php echo $_SERVER['SERVER_ADDR']; ?>:25565 -  <a href="mailto:support@flameshost.com" class="btn btn-info btn-sm">Support</a></h3>
<br>
<html>
<head>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
       setInterval(refreshIframe2, 5000);
       function refreshIframe2() {
           var frame = document.getElementById("frame2");
           frame.src = frame.src;
       }


  setInterval(function() {
$("#div1").load("controls.php");

   }, 800);

$("#div1").load("controls.php");
   </script>

<div style="border-radius: 1px; width: 100%; overflow: hidden;">
<div id="div1">
<!--<iframe id="frame2" src="controls.php" scrolling="no" height="94px" width="100%" frameBorder="no"></iframe>-->
</div>
</div>
<br> </br>
<form method="POST" action="/">
<div class="input-group">
<input type="text" class="form-control" disabled="disabled" name="cmd" placeholder="Coming soon - command execution" />
<span class="input-group-btn">
<input type="submit" class="btn btn-success form-control" disabled="disabled" />
</span>
</div>
<br>
<div style="border-radius: 10px; width: 100%; overflow: hidden;"> 
<base target="_parent" />
<iframe src="o.php" frameBorder="no" width="100%" height="59%" ALLOWTRANSPARENCY="true"></iframe>
</div>
<br>
<p>Default FTP details:</p>
<p>Username: ftpuser</p>
<p>Password: (set in the installer)</p>
<p>Host: <?php echo $_SERVER['SERVER_ADDR']; ?></p>
<p>Use a free client such as <a href="https://filezilla-project.org">FileZilla</a>, to manage server files.</p>

