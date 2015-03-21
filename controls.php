<?php

include('/var/www/security/password_protect.php');
$status = shell_exec("cat /SERVER/logs/latest.log");

$stringfound = 'Stopped';

if (strpos($status,$stringfound) !== false) {

?>
<div class="jumbotron">
<div class="btn-group">
<a href="startserver.php" target="_blank" class="btn btn-success">Start Server</a>
<a href="stop.php" disabled="disabled" target="_blank" class="btn btn-warning">Server already stopped!</a>
<a href="index.php?logout" class="btn btn-danger">Log out</a>
</div>
<?php } else { ?>
<div class="jumbotron">
<div class="btn-group">
<a href="startserver.php" disabled="disabled" target="_blank" class="btn btn-success">Server already started!</a>
<a href="stop.php" target="_blank" class="btn btn-warning">Stop Server (data is not saved!)</a>
<a href="index.php?logout" class="btn btn-danger">Log out</a>
</div>
<?php } ?>

</div>
