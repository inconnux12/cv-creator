<?php

if(isset($_POST['login'])) 
{

	$servername = "localhost";
	$username = "root";
	$password = "Rootkitx12";
	$dbname = "TP";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error)
	{
    	die("Probleme de Connection : " . $conn->connect_error);
	}


	$email=$_POST['email'];
	$password=sha1($_POST['password']);


	$sql = "SELECT * FROM CV WHERE email='$email' and password='$password'";
	$result = $conn->query($sql);


	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) 
		{
			$id=$row["id"];
			echo "
<!DOCTYPE html>
<html>
<head>
	<meta charset=\"utf-8\">
	<link rel=\"stylesheet\" type=\"text/css\" href=\"CSS/inter.css\">
	<link rel=\"icon\" href=\"IMG/cv.ico\" type=\"image/x-ico\">
	<title>Choisir</title>
</head>
<body>
<div class=\"body\">
	<h1>choissiser votre Model de Cv</h1>
	<div class=\"pg\">
		<img id=\"f1\" src=\"IMG/model.png\" alt=\"\">
		<img id=\"f2\" src=\"IMG/model2.png\" alt=\"\">
	</div>
	<div class=\"md\">
		<button>Model1</button>
		<button>Model2</button>
	</div>
	<form action=\"model1.php\" method=\"POST\">
		<input type=\"hidden\" name=\"id1\" value=\"$id\">
		<input type=\"submit\" name=\"m1\" value=\"Model1\" id=\"m1\">
	</form>
	<form action=\"model2.php\" method=\"POST\">
		<input type=\"hidden\" name=\"id2\" value=\"$id\">
		<input type=\"submit\" name=\"m2\" value=\"Model2\" id=\"m2\">
	</form>	
	<div class=\"foot\">
		<p>Copyright © By <span> Ramzi&&Nassim </span> All right reserved</p>
		<div class=\"links\">
			<ul class=\"links\">
				<li class=\"link\"><img src=\"IMG/white_facebook.png\"></li>
				<li class=\"link\"><img src=\"IMG/white_twitter.png\"></li>
				<li class=\"link\"><img src=\"IMG/white_vimeo.png\"></li>	
			</ul>
		</div>
	</div>

	

</div>
</body>
</html>";
		}
	}
else 
	{
    	echo "<p><center>User or Mot de passe Inccorect</center></p><br>";
	}
	$conn->close();
	
}

else
{
	echo '
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<meta charset="utf-8">
	<link rel="icon" href="IMG/cv.ico" type="image/x-ico"/>
	<link rel="stylesheet" type="text/css" href="CSS/index.css">
	<link rel="stylesheet" type="text/css" href="CSS/icon.css">
</head>
<body>
	<div class="body">
		<div class="sign">
		<form method="POST" action="index.php" >
		<span id="im1"><img id="d1" src="IMG/log.png"></span><input type="email" name="email" id="nick" placeholder="Enter your email">
			<div id="im2"><img id="d2" src="IMG/pass.png"></div><input type="password" name="password" placeholder="Enter your Password">
			<input type="submit" name="login" value="Login">
		</form>
		<p><a href="signup.php">Créer Nouveau Cv</a></p>
		</div>
	</div>
</body>
</html>';
}

?>
