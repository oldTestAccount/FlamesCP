<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<br> </br>
<font face="Open Sans">
<div class="container">
<div class="well well-lg">
<?php
include('session.php');
$status = shell_exec("cat /SERVER/logs/latest.log");

$stringfound = 'Stopped';

if (strpos($status,$stringfound) !== false) {

?>
<title>FlamesCP | Started server</title>
<h1>Success!</h1>
<hr>
<p>Sent the signal to the FlamesSRV Daemon to start the server.</p>
<p>Note: This will start the server, but it may take a few moments for the daemon to receive the signal.</p>
<?php
shell_exec('nc localhost 1212 | startsrv');
?>
<script>
    function closeWindow() {
        window.open('','_parent','');
        window.close();
    }
</script>
<br> </br>
<a class="btn btn-danger" href="javascript:closeWindow();">Close Window</a>

<?php
} else {
?>
<title>FlamesCP | Server already running</title>
<h1>Error</h1>
<hr>
<p>Server already running! </p>
<br>
<script>
    function closeWindow() {
        window.open('','_parent','');
        window.close();
    }
</script>
<br> </br>
<a class="btn btn-danger" href="javascript:closeWindow();">Close Window</a>

<?php
}
?>
