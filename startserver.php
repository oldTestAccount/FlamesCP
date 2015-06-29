<?php
include('session.php');
$status = shell_exec("cat /SERVER/logs/latest.log");

$stringfound = 'Stopped';

if (strpos($status,$stringfound) !== false) {

?>
<p>Sent the signal to the FlamesSRV Daemon to start the server.</p>
<p>WARNING: Please do not run this twice.</p>
<?php
shell_exec('nc localhost 1212 | startsrv');
?>
<script>
    function closeWindow() {
        window.open('','_parent','');
        window.close();
    }
</script>

<a href="javascript:closeWindow();">Close Window</a>

<?php
} else {
?>
<p>Server already running! </p>
<br>
<script>
    function closeWindow() {
        window.open('','_parent','');
        window.close();
    }
</script>

<a href="javascript:closeWindow();">Close Window</a>

<?php
}
?>
