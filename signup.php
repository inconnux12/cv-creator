<?php 

if (isset($_POST['signup'])) 
{
$servername = "localhost";
$username = "root";
$password = "Rootkitx12";
$dbname = "TP";

try
{

	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	 //set the PDO error mode to exception
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$dat=$_POST['dat'];
	$tel=$_POST['tel'];
	$email=$_POST['email'];
	$password=sha1($_POST['password']);
	$sec=$_POST['sec'];
	$disp=$_POST['disp'];
	$mob=$_POST['mob'];
	$ann=$_POST['ann'];
	$sal=$_POST['sal'];
	$niv=$_POST['niv'];
	$exp=nl2br($_POST['exp']);
	$dip=nl2br($_POST['dip']);
	$comp=nl2br($_POST['comp']);
	$lan=nl2br($_POST['lan']);
	$img_type = $_FILES['photo']['type'];
	$img_nom = $_FILES['photo']['name'];
	$img_blob = file_get_contents($_FILES['photo']['tmp_name']);
	addslashes($img_blob);
		
	$stmt=$conn->prepare('INSERT INTO CV (nom,prenom,dat,tel,img_blob,img_nom,img_type,email,password,sec,disp,mob,ann,sal,niv,exp,dip,comp,lan) values (:nom,:prenom,:dat,:tel,:img_blob,:img_nom,:img_type,:email,:password,:sec,:disp,:mob,:ann,:sal,:niv,:exp,:dip,:comp,:lan)');

	$stmt->bindParam(':nom', $nom);
	$stmt->bindParam(':prenom', $prenom);
	$stmt->bindParam(':dat', $dat);
	$stmt->bindParam(':tel', $tel);
	$stmt->bindParam(':img_blob', $img_blob);
	$stmt->bindParam(':img_nom', $img_nom);	
	$stmt->bindParam(':img_type', $img_type);	
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':password', $password);
	$stmt->bindParam(':sec', $sec);
	$stmt->bindParam(':disp', $disp);
	$stmt->bindParam(':mob', $mob);
	$stmt->bindParam(':ann', $ann);
	$stmt->bindParam(':sal', $sal);
	$stmt->bindParam(':niv', $niv);
	$stmt->bindParam(':exp', $exp);
	$stmt->bindParam(':dip', $dip);
	$stmt->bindParam(':comp', $comp);
	$stmt->bindParam(':lan', $lan);

	$stmt->execute();
			
	echo "<p><center>New Curriculum Vitae created successfully<br/>
			<a href=\"index.php\">GO TO LOGIN</a></center><p>";
}
	

	catch(PDOException $e)
    {
    echo "<br>Error: " . $e->getMessage();
    }
	$conn = null;


}
else
{
	
echo '
<!DOCTYPE html>
<html>
<head>
	<title>SIGNUP</title>
	<link rel="icon" href="IMG/cv.ico" type="image/x-ico"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="CSS/cv.css">
</head>
<body>
	<div class="body">
		<form  enctype="multipart/form-data"	method="POST" action="signup.php">
			<div class="info_perso">
			<h2>Information Personnelle</h2>
				<div class="info_g">
						<div class="gg">
							<label for="nom">Votre nom :</label>
							<input type="text" id="nom" name="nom" required="required">
							<label for="prenom">Votre prenom :</label>
							<input type="text" id="nd" name="prenom" required="required">
							<label for="dat">Votre date de naissance :</label>
							<input type="date" id="dat" name="dat" required="required" placeholder="aaaa-mm-jj">
						</div>
						<div class="gd">
							<label for="tel" >Votre numero de telephone :</label>
							<input type="tel" id="tel" name="tel" required="required">
							<label for="email">Votre email :</label>
							<input type="email" id="email" name="email" required="required">
							<label for="password">Votre mot de pass :</label>
							<input type="password" id="password" name="password" required="required">
						</div>
				</div>
				<div class="info_d">
					<label for="photo" style="position:relative;bottom:165px;">Votre Photo :</label>
					<img src="IMG/log.png" style="height: 150px; background-color: white;margin-top: 30px;position:relative;right:116px;">
					<input type="hidden" name="MAX_FILE_SIZE"  id="xn" value="1048576" />
					<input type="file" id="photo" name="photo" size=50 />
					<h5 id="pt">PHOTO</h5>
				</div>
			</div>
			<dir class="prf">
				<h2>Profil de recrutement </h2>
				<div class="prf_g">
					<div class="gg">
						<label for="sec">Secteur d\'activité :</label>
						<input type="text" name="sec" id="sec" required="required">
						<label for="mob">Mobilité :</label>
						<input type="text" name="mob" id="mob" required="required">
					</div>
					<div class="gd">
						<label for="ann">Années d\'expérience :</label>
						<input type="text" id="ann" name="ann">
						<label for="sal">Salaire souhaité :</label>
						<input type="text" name="sal" id="sal">
					</div>
				</div>
				<div class="prf_d">	
					Disponible :
					<br>
					<label for="disp">Oui</label>
					<input type="radio" name="disp" id="disp" value="immediate">
					<label for="disp">Non</label>
					<input type="radio" name="disp" id="disp" value="avec preavis">
					<br>		
					<label>Niveau de poste :</label>
					
					<select name="niv" id="niv">
						<option value="débutant">débutant</option>
						<option value="intermidiaire">intermidiaire</option>
						<option value="Confirmé/Expérimenté">Confirmé/Expérimenté</option>
					</select>
				
				</div>
			</dir>
			<div class="exp">
				<h2>Expériences</h2>	
				<textarea id="tex" name="exp" rows="10" cols="0" required="required"></textarea>
			</div>
			<div class="def">
				<h2>Diplômes et formations</h2>	
				<textarea name="dip" id="tdef" rows="10" cols="0" required="required"></textarea>
			</div>
			<div class="cmp">
				<h2>Compétences</h2>	
				<textarea name="comp" id="tcmp" rows="10" cols="0" required="required"></textarea>
			</div>
			<div class="lng">
				<h2>Langage</h2>	
				<textarea name="lan" id="tlng" rows="10" cols="0" required="required"></textarea>
			</div>
			<input type="submit" name="signup" value="Créer Un Cv" id="cv">
		</form>
	</div>
</body>
</html>';	
}

?>
