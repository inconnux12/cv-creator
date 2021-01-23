<?php

$servername = "localhost";
$username = "root";
$password = "Rootkitx12";
$dbname = "TP";

try
{

	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	 //set the PDO error mode to exception
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $id=$_POST['id2'];
		
	$stmt=$conn->prepare("DELETE FROM CV WHERE id=$id");

	$stmt->execute();
			
	echo "<p><center>Your Curriculum Vitae Has Been DELETE successfully<br/>
			<a href=\"index.php\">GO TO LOGIN</a></center><p>";
}
	

	catch(PDOException $e)
    {
    echo "<br>Error: " . $e->getMessage();
    }
	$conn = null;



	
?>
