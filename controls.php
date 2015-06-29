<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<body STYLE="background-color:transparent">
<?php

include('session.php');
$status = shell_exec("cat /SERVER/logs/latest.log");

$stringfound = 'Stopped';

if (strpos($status,$stringfound) !== false) {

?>
<div class="btn-group">
<a href="startserver.php" target="_blank" class="btn btn-success">Start Server</a>
<a href="stop.php" disabled="disabled" target="_blank" class="btn btn-warning">Server already stopped!</a>
<base target="_parent" />
<a href="logout.php" class="btn btn-danger">Log out</a>
</base>
</div>
<?php } else { ?>
<div class="btn-group">
<a href="startserver.php" disabled="disabled" target="_blank" class="btn btn-success">Server already started!</a>
<a href="stop.php" target="_blank" class="btn btn-warning">Stop Server (data is not saved!)</a>
<base target="_parent" />
<a href="logout.php" class="btn btn-danger">Log out</a>
</base>
</div>
<?php } ?>

</div>
