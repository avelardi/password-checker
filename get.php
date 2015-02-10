<?php

$str = trim($_POST['email']," ");

$email = "%" . $str  . "%";

try 
{
	$db = new PDO("sqlite:google.db");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$sql = "SELECT * FROM passwords WHERE password LIKE '$email';";
	$result = $db->query($sql);
	
	while ($row = $result->fetch())
	{
		$emails[] = $row['email'];
	}
	include 'index.php';
	include 'output.html.php';
}
catch (PDOException $e)
{
	$output = 'Unable to connect to the database server.';
	exit();
}
?>
