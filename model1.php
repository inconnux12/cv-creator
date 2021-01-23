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

	$id=$_POST["id1"];


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
				<link rel=\"stylesheet\" type=\"text/css\" href=\"CSS/model1.css\">
				<link rel=\"stylesheet\" href=\"CSS/print.css\" type=\"text/css\" media=\"print\" />
				<title>CV1</title>
				<script type=\"text/javascript\">
				function imprimer_page()
				{
  				window.print();
				}
				</script>
				</head>
				<body>
				<div class=\"body\">
					<div class=\"photo\">
					<img src=\"data:".$row['img_type'].";base64,".base64_encode( $row['img_blob'] )."\"/>	
					</div>
					<div id=\"titre\"><h1>Curriculum Vitae</h1></div>
					<ul>
					<div id=\"t1\">
						<span ><li>Information Personnelle</li></span>
						<p id=\"info_perso\">Nom : ".$row['nom']."<br>Prenom : ".$row['prenom']."<br>Email : ".$row['email']."<br>Telephone : ".$row['tel']."<br>Date de naissance : ". $row["dat"]." </p>
					</div>
					<div id=\"t2\">
						<span ><li>Profil de Recrutement</li></span>
						
						<p>Secteuer d'activite : ".$row["sec"]."<br>Mobilite : ". $row["mob"]."<br>Annee d'experience : ".$row["ann"]." ans<br>Salaire Souhaite : ". $row["sal"]." Da<br>Disponibilite : ". $row["disp"]."<br>Niveau de Poste : ". $row["niv"]." </p>
					</div>
					<div id=\"t3\">
						<span ><li>Expériences</li></span>
						". $row["exp"]."
					</div>
					<div id=\"t4\">
						<span ><li>Diplômes et formations</li></span>
						". $row["dip"]."
					</div>
					<div id=\"t5\">
						<span ><li>Compétences</li></span>
						". $row["comp"]."
					</div>
					<div id=\"t6\">
						<span ><li>Langaues</li></span>
						". $row["lan"]."
					</div>
					</ul>
				</div>
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
				<div class=\"foot\">
					<p>Copyright © By <span> Ramzi&&Nassim </span> All right reserved</p>
					<div class=\"links\">
					<ul class=\"links\">
						<li class=\"link\"><img src=\"IMG/white_facebook.png\"></li>
						<li class=\"link\"><img src=\"IMG/white_twitter.png\"></li>
						<li class=\"link\"><img src=\"IMG/white_vimeo.png\"></li>	
					</ul>
				</div>
				</body>
				</html>

						";
		} 
	}



 ?>
