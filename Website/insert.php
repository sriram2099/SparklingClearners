<!DOCTYPE html PUBLIC “-//W3C//DTD XHTML 1.0 Strict//EN” 
http://www.w3.org/TR/xhtml/DTD/xhtml-strict.dtd> 
<html> 
<head> 
<title> Queries </title> 
</head> 
<body> 
<?php
			
$db_host		= 'localhost';
$db_user		= 'root';        
$db_pass		= '';     
$db_database	= 'sparklingcleaners'; 

$db = new PDO("mysql:host=$db_host;dbname=$db_database", $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$q = $db->prepare("insert into queries(first_name,last_name,email,street,city,state,zip,message) values(:first_name,:last_name,:email,:street,:city,:state,:zip,:message)");
	$q->bindParam(':first_name',$first_name);
	$q->bindParam(':last_name',$last_name);
	$q->bindParam(':email',$email);
	$q->bindParam(':street',$street);
	$q->bindParam(':city',$city);
	$q->bindParam(':state',$state);
	$q->bindParam(':zip',$zip);
	$q->bindParam(':message',$message);
	
	$first_name = $_POST['firstName'];
    $last_name = $_POST['lastName'];
	$email=$_POST['email'];
    $street = $_POST['streetAddress'];
    $city=$_POST['City'];
    $state=$_POST['State'];
    $zip=$_POST['ZipCode'];
    $message=$_POST['txtArea'];
	 
	$q->execute();
echo "<script type='text/javascript'>alert('Submitted successfully');document.location='index.html'</script>";	
//Close the database
mysqli_close($db);

//Redirect the user to the main menu webpage.



?>

</body> 
</html>
