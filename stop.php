<?php
require '/var/www/security/password_protect.php';
?>

<p>Sent the signal to the FlamesSRV Daemon to stop the server.</p>

<p>WARNING: Data has not been saved!</p>

<?php
shell_exec('nc localhost 1213 | stop');
?>

<script>
    function closeWindow() {
        window.open('','_parent','');
        window.close();
    }
</script> 

<a href="javascript:closeWindow();">Close Window</a>
