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

	
		
	$first_name = $_POST['firstName'];
    $last_name = $_POST['lastName'];
	$user_name=$_POST['username'];
	$dob=$_POST['dateofbirth'];
	$e_mail=$_POST['email'];
    $street = $_POST['streetAddress'];
    $city=$_POST['City'];
    $state=$_POST['State'];
    $zip=$_POST['ZipCode'];
    $password=$_POST['Password'];
	
	
	$sql= " select user_name from signup where user_name = '$user_name' "; 
$stmt = $db->query($sql); 
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if($row['user_name'] == $user_name){
	
	 echo "<script type='text/javascript'>alert('User name already exists');document.location='signup.html'</script>";
	}
else{
		$q = $db->prepare("insert into signup(first_name,last_name,user_name,dob,e_mail,street,city,state,zip,password) 
	values(:first_name,:last_name,:user_name,:dob,:e_mail,:street,:city,:state,:zip,:password)");
	
	$q->bindParam(':first_name',$first_name);
	$q->bindParam(':last_name',$last_name);
	$q->bindParam(':user_name',$user_name);
	$q->bindParam(':dob',$dob);
	$q->bindParam(':e_mail',$e_mail);
	$q->bindParam(':street',$street);
	$q->bindParam(':city',$city);
	$q->bindParam(':state',$state);
	$q->bindParam(':zip',$zip);
	$q->bindParam(':password',$password);
		$q->execute();
	echo "<script type='text/javascript'>alert('submitted successfully');document.location='index.html'</script>";


	}
//Close the database
mysqli_close($db);

//Redirect the user to the main menu webpage.



?>

</body> 
</html>
