<?php
session_start();
if(!isset($_SESSION['logged_in'])){
header('Location: index.php?error=You must be logged in to view this page.');
} else {

}
?>
