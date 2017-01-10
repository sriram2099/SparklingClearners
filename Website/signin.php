<!DOCTYPE html PUBLIC “-//W3C//DTD XHTML 1.0 Strict//EN” 
http://www.w3.org/TR/xhtml/DTD/xhtml-strict.dtd> 
<html> 
<head> 
<title> Queries </title> 
</head> 
<body> 
<?php
if(ISSET($_POST['username'])&&ISSET($_POST['password'])&&!empty($_POST['username'])&&!empty($_POST['password']))
{
	$user_name=$_POST['username'];
	$password=$_POST['password'];
	$query = "select * from users where user_name = '$user_name' and password = '$password'";
$db_host		= 'localhost';
$db_user		= 'root';        //Note: Use ‘root’ here if you experience any issues
$db_pass		= '';     //Note: Use spaces here if you experience any issues($dbpass  =  ‘’)
$db_database	= 'sparklingcleaners'; 
   
$db = new PDO("mysql:host=$db_host;dbname=$db_database", $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql= " select * from signup where user_name = '$user_name' and password = '$password' "; 
$stmt = $db->query($sql); 
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if($row['password'] == $password) {
	echo "<script type='text/javascript'>alert('Login successfully');document.location='index.html'</script>";
session_start();
$_SESSION['loggedIn'] = true;
}
else {
echo "<script type='text/javascript'>alert('Invalid Login');document.location='signin.html'</script>";
}
}
else{
echo "<script type='text/javascript'>alert('Please enter valid details')</script>";
}

?>
</body> 
</html>