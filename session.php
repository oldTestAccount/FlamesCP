<?php
session_start();
if(!isset($_SESSION['logged_in'])){
header('Location: index.php?error=2');
} else {

}
?>
