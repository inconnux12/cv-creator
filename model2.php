<?php

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

	$id=$_POST['id2'];

	$sql = "SELECT * FROM CV WHERE id='$id'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) 
		{		
			echo "
			<!DOCTYPE html>
			<html>
			<head>
				<meta charset=\"utf-8\">
				<link rel=\"icon\" href=\"IMG/cv.ico\" type=\"image/x-ico\"/>
				<link rel=\"stylesheet\" type=\"text/css\" href=\"CSS/icons.css\">
				<link rel=\"stylesheet\" type=\"text/css\" href=\"CSS/model2.css\">
				<script type=\"text/javascript\" src=\"../../jquery.min.js\" ></script>
				<title>CV2</title>
			</head>
			<body>
			<script type=\"text/javascript\">
				function imprimer_page()
				{
  				window.print();
				}
				</script>
			<dir class=\"body\">
				<div class=\"prt\">
					<div class=\"prtg\">
						<img src=\"data:".$row['img_type'].";base64,".base64_encode( $row['img_blob'] )."\"style=\"height: 100%;width: 100%;padding: 0px;margin-top: 0px; background-color:none;\"/>	
					</div>
					<div class=\"prtd\">
						<h2>Je Suis <span>".$row['nom']." ".$row['prenom']."</span></h2>
						<h4><span>Experionce</span></h4>
						<p>".$row["ann"]." ANS</p>
						<h4><span>diplome</span></h4>
						<p>".$row["dip"]."</p>
						<h4><span>competence</span></h4>
						<p>". $row["comp"]."</p>
						<h4><span>langage</span></h4>
						<p>". $row["lan"]."</p>
							<div id=\"mod\">
					<form method=\"POST\" action=\"modifier.php\" >
					<input type=\"hidden\"  name=\"id1\" value=\"".$row['id']."\">
					<input type=\"submit\" id=\"id1\" name=\"modifier\" value=\"Modifier\" onclick=\"return confirm('Voulez-vous Modifier Votre CV ?')\">
					</form>
					<form method=\"POST\" action=\"supprimer.php\" >
					<input type=\"hidden\" name=\"id2\" value=\"".$row['id']."\">
					<input type=\"submit\" id=\"id2\" name=\"supprimer\" value=\"Supprimer\" onclick=\"return confirm('Voulez-vous Supprimer Votre CV ?')\" >
					</form>
					<form method=\"POST\" action=\"imp.php\" >
					<input type=\"hidden\" name=\"id3\" value=\"".$row['id']."\">
					<input type=\"submit\" id=\"id3\" name=\"imprimer\" value=\"Imprimer 1\" onclick=\"return confirm('Voulez-vous Imprimer Votre CV ?')\" >
					</form>
					<form>
  					<input id=\"id4\" name=\"impression\" type=\"button\" onclick=\"imprimer_page()\" value=\"Imprimer 2\" />
					</form>
				</div>
					</div>
	
				</div>
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
			</dir>
			
			</body>
			</html>";
		}
	}




  ?>
