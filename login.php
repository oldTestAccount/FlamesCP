<?php
session_start();
?>

<?php
ob_start();

if (empty($_GET['username'])) {
    header('Location: index.php?error=Uername and/or password was not specified.');
}

$username = $_GET['username'];
$password = $_GET['password'];
 
$conn = mysql_connect('localhost', 'root', 'stapHunu3A');
mysql_select_db('users', $conn);
 
$username = mysql_real_escape_string($username);
$query = "SELECT *
        FROM login
        WHERE username = '$username' and password = '$password';";
 
$result = mysql_query($query);

if(mysql_num_rows($result) == 0) // User not found. So, redirect to login_form again.
{
    header('Location: index.php?error=Invalid username and/or password.');
}
 
$userData = mysql_fetch_array($result, MYSQL_ASSOC);

include('finduser.php');

if(mysql_num_rows($result) == 1) {

        
	session_regenerate_id();
	$_SESSION['logged_in']='true';
        $_SESSION['logged_in_as']=$username;
        $_SESSION['rank']=$status;
	session_write_close();
        header('Location: dashboard.php');
}
?>

                            
                            
                            
                            
                            
                            
                            
                            
