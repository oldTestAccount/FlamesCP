<?php
include('/var/www/security/password_protect.php');
?>

<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<font face="Open Sans">
<title>FlamesCP | Welcome!</title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<br>
<div class="container">
<div class="well well-lg">
<h3>FlamesCP v0.013 (build 3) <b>-</b>  <a href="mailto:support@flameshost.com" class="btn btn-info btn-sm">Support</a></h3>
<br>
<html>
<head>

<script type="text/javascript">
       setInterval(refreshIframe2, 3000);
       function refreshIframe2() {
           var frame = document.getElementById("frame2");
           frame.src = frame.src;
       }
   </script>

<div style="border-radius: 1px; width: 100%; overflow: hidden;">
<iframe id="frame2" src="controls.php" scrolling="no" height="94px" width="50%" frameBorder="no"></iframe>
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
<iframe src="o.php" frameBorder="no" width="100%" height="59%"></iframe>
</div>