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
<head>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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

   $( document ).ready(function() {

            function loading() {
                $('.result').show().html('<div class="alert alert-success">Command executed successfully!</div>');
            }

            function formResult(data) {
                $('.result').html(data);
                $('#cmd').val('');
            }

            function onSubmit() {
                $('#cmd-form').submit(function() {
                    var action = $(this).attr('action');
                    loading();
                    $.ajax({
                        url: action,
                        type: 'GET',
                        data: {
                            cmd: $('#cmd').val()
                        },
                        success: function(data) {
                            formResult(data);
                        },
                        error: function(data) {
                            formResult(data);
                        }
                    });
                    return false;
                });
            }
            onSubmit();

        });

   </script>

<div style="border-radius: 1px; width: 100%; overflow: hidden;">
<div id="div1">
<!--<iframe id="frame2" src="controls.php" scrolling="no" height="94px" width="100%" frameBorder="no"></iframe>-->
</div>
</div>
<br> </br>
<?php
if(isset($_GET['cmd'])){
$cmd = $_GET['cmd'];
$output=shell_exec('sudo /bin/sendcmd "'.$cmd.'"');
}
?>
<form method="GET" id="cmd-form" action="dashboard.php">
<div class="input-group">
<input type="text" class="form-control" name="cmd" id="cmd" placeholder="Run a console command - example: say Hello!" />
<span class="input-group-btn">
<input type="submit" value="Execute command" class="btn btn-success" />
</span>
</div>
<br>
<!--<div style="border-radius: 10px; width: 100%; overflow: hidden;"> -->
<base target="_parent" />
<iframe src="o.php" frameBorder="none" width="100%" height="59%" ALLOWTRANSPARENCY="true"></iframe>
<!--</div>-->
<br>
<p><b><u>Default FTP details:</u></b></p>
<p>Username: ftpuser</p>
<p>Password: (set in the installer)</p>
<p>Host: <?php echo $_SERVER['SERVER_ADDR']; ?></p>
<p>Use a free client such as <a href="https://filezilla-project.org">FileZilla</a>, to manage server files.</p>

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

