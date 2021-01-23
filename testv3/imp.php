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

        $id1 = $_POST['id3'];
        $sql = "SELECT * FROM CV WHERE id=$id1";
        $result = $conn->query($sql);
 if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc()) 
            {
                $s1=strip_tags($row['exp']);
                $s2=strip_tags($row['dip']);
                $s3=strip_tags($row['comp']);
                $s4=strip_tags($row['lan']);




require('../../fpdf181/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('img.jpg',10,20,50);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(60);
    // Title
    $this->SetFont('Arial','BI',25);
    $this->SetFillColor(200,220,255);
    $this->Cell(75,10,'Curriculum Vitae',1,0,'C');
    // Line break
    $this->Ln(70);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetTextColor(8,141,165);
    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(0,10,'Information Personnelle              Profil de Recrutement',0,1);
    $pdf->SetFont('Times','',12);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(0,5,'  Nom : '.$row['nom'].'                                            Secteuer d\'activite : '.$row['sec'].'',0,1);
    $pdf->Cell(0,5,'  Prenom : '.$row['prenom'].'                                                   Mobilite : '.$row['mob'].'',0,1);
    $pdf->Cell(0,5,'  Email : '.$row['email'].'                                   Annee d\'experience : '.$row['ann'].'',0,1);
    $pdf->Cell(0,5,'  Telephone :'.$row['tel'].'                                            Salaire Souhaite : '.$row['sal'].' Da',0,1);
    $pdf->Cell(0,5,'  Date De Naissance : '.$row['dat'].'                         Disponibilite : '.$row['disp'].'',0,1);
    $pdf->Cell(0,5,'                                                                               Niveau de Poste : debutant ',100,1);
    $pdf->Ln(10);

    $pdf->SetTextColor(8,141,165);
    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(0,10,'Experiences',0,1);
    $pdf->SetFont('Times','',12);
    $pdf->SetTextColor(0,0,0);
    $pdf->Write(5,$s1);
    $pdf->Ln(10);

    $pdf->SetTextColor(8,141,165);
    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(0,10,'Diplomes et formations',0,1);
    $pdf->SetFont('Times','',12);
    $pdf->SetTextColor(0,0,0);
    $pdf->Write(5,$s2);
    $pdf->Ln(10);

    $pdf->SetTextColor(8,141,165);
    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(0,10,'Competences',0,1);
    $pdf->SetFont('Times','',12);
    $pdf->SetTextColor(0,0,0);
    $pdf->Write(5,$s3);
    $pdf->Ln(10);

    $pdf->SetTextColor(8,141,165);
    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(0,10,'Langues',0,1);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Times','',12);
    $pdf->Write(5,$s4);
 




$pdf->Output();

    }
}


?>
