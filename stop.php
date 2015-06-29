<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<title>FlamesCP | Stop server</title>
<br> </br>
<font face="Open Sans">
<div class="container">
<div class="well well-lg">
<?php
require 'session.php';
?>

<h1>Success!</h1>
<hr>
<p>Sent the signal to the FlamesSRV Daemon to stop the server.</p>

<p>WARNING: Data has not been saved through this method!</p>

<?php
shell_exec('nc localhost 1213 | stop');
?>

<script>
    function closeWindow() {
        window.open('','_parent','');
        window.close();
    }
</script> 
<br> </br>
<a class="btn btn-danger" href="javascript:closeWindow();">Close Window</a>
