<?php

$email = "%" . $_POST['email'] . "%";

try 
{
	$db = new PDO("sqlite:google.db");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$sql = "SELECT * FROM EMAILS WHERE EMAIL LIKE '$email';";
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
