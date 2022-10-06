<?php

    require '../conexion/Conexion.php'; 
    require('/../xampp/htdocs/fpdf184/fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
    function Header()
    {
        // Logo
        //$this->Image('loguito.png',15,5,25); ARREGLAR LO DEL LOGOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(30,13,'Reporte de Pacientes ',3,2,'C');
        // Salto de línea
        $this->Ln(20);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
    }

    var $widths;
	var $aligns;

	function SetWidths($w) {
		//Set the array of column widths
		$this->widths = $w;
	}

	function SetAligns($a) {
		//Set the array of column alignments
		$this->aligns = $a;
	}

	function Row($data, $setX) //yo modifique el script a  mi conveniencia :D
	{
		//Calculate the height of the row
		$nb = 0;
		for ($i = 0; $i < count($data); $i++) {
			$nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
		}

		$h = 6* $nb;
		//Issue a page break first if needed
		$this->CheckPageBreak($h, $setX);
		//Draw the cells of the row
		for ($i = 0; $i < count($data); $i++) {
			$w = $this->widths[$i];
			$a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
			//Save the current position
			$x = $this->GetX();
			$y = $this->GetY();
			//Draw the border
			$this->Rect($x, $y, $w, $h, 'DF');
			//Print the text
			$this->MultiCell($w,6, $data[$i], 0, $a);
			//Put the position to the right of the cell
			$this->SetXY($x + $w, $y);
		}
		//Go to the next line
		$this->Ln($h);
	}
    
    function CheckPageBreak($h, $setX) {
		//If the height h would cause an overflow, add a new page immediately
		if ($this->GetY() + $h > $this->PageBreakTrigger) {
			$this->AddPage($this->CurOrientation);
			$this->SetX($setX);

			//volvemos a definir el  encabezado cuando se crea una nueva pagina
			$this->SetFont('Helvetica', 'B', 15);
            $this->Cell(20,7, utf8_decode("Id"),1, 0 , 'C' );
            $this->Cell(28,7, utf8_decode("Nombre"),1, 0 , 'C' );
            $this->Cell(24,7, utf8_decode("Apellido"),1, 0 , 'C' );
            $this->Cell(24,7, utf8_decode("Edad"),1, 0 , 'C' );
            $this->Cell(24,7, utf8_decode("Sexo"),1, 0 , 'C' );
            $this->Cell(24,7, utf8_decode("Telefono"),1, 0 , 'C' );
            $this->Cell(24,7, utf8_decode("Ocupacion"),1, 0 , 'C' );
			$this->SetFont('Arial', '', 12);

		}

		if ($setX == 100) {
			$this->SetX(100);
		} else {
			$this->SetX($setX);
		}

	}

    function NbLines($w, $txt) {
		//Computes the number of lines a MultiCell of width w will take
		$cw = &$this->CurrentFont['cw'];
		if ($w == 0) {
			$w = $this->w - $this->rMargin - $this->x;
		}

		$wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
		$s = str_replace("\r", '', $txt);
		$nb = strlen($s);
		if ($nb > 0 and $s[$nb - 1] == "\n") {
			$nb--;
		}

		$sep = -1;
		$i = 0;
		$j = 0;
		$l = 0;
		$nl = 1;
		while ($i < $nb) {
			$c = $s[$i];
			if ($c == "\n") {
				$i++;
				$sep = -1;
				$j = $i;
				$l = 0;
				$nl++;
				continue;
			}
			if ($c == ' ') {
				$sep = $i;
			}

			$l += $cw[$c];
			if ($l > $wmax) {
				if ($sep == -1) {
					if ($i == $j) {
						$i++;
					}

				} else {
					$i = $sep + 1;
				}

				$sep = -1;
				$j = $i;
				$l = 0;
				$nl++;
			} else {
				$i++;
			}

		}
		return $nl;
	}
}
    $data = new Conexion();
    $conexion = $data->conect();
    $strquery = "SELECT  id, nombre, apellido, edad, sexo, telefono, ocupacion FROM pacientes";
    $result = $conexion->prepare($strquery);
    $result->execute();
    $data = $result->fetchall(PDO::FETCH_ASSOC);


    $pdf = new PDF();
    $title = 'Reporte Pacientes';
    $pdf->SetTitle($title);
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetMargins(10, 10, 10); //MARGENES
    $pdf->SetAutoPageBreak(true, 20); //salto de pagina automatico
    $pdf->SetFont('Times','',12);
    $pdf->SetX(8);
	
	$pdf->Cell(10,7, utf8_decode("N"),1, 0 , 'C' );
    $pdf->Cell(20,7, utf8_decode("Id"),1, 0 , 'C' );
    $pdf->Cell(45,7, utf8_decode("Nombre"),1, 0 , 'C' );
    $pdf->Cell(45,7, utf8_decode("Apellido"),1, 0 , 'C' );
    $pdf->Cell(15,7, utf8_decode("Edad"),1, 0 , 'C' );
    $pdf->Cell(15,7, utf8_decode("Sexo"),1, 0 , 'C' );  
    $pdf->Cell(24,7, utf8_decode("Teléfono"),1, 0 , 'C' );
    $pdf->Cell(24,7, utf8_decode("Ocupacion"),1, 0 , 'C' );

	$pdf->SetFillColor(233, 229, 235); //color de fondo rgb
	$pdf->SetDrawColor(61, 61, 61); //color de linea  rgb

    $pdf->SetFont('Arial','B',10);
    $pdf->SetWidths(array(10,20,45,45,15,15,24,24));
   // $pdf->SetAligns(array('C','C','C','C','C','C','C','L'));
	
	$pdf->SetY(50);
    for($i=0; $i < count($data); $i++){
	
		$pdf->Row(array($i+1,$data[$i]['id'], utf8_decode($data[$i]['nombre']), utf8_decode($data[$i]['apellido']), $data[$i]['edad'] ,utf8_decode($data[$i]['sexo']), $data[$i]['telefono'] , utf8_decode($data[$i]['ocupacion'])),8);
    //}
    //$pdf->Row(array($i + 1, $data[$i]['codigo'], ucwords(strtolower(utf8_decode($data[$i]['nombre']))), '$' . $data[$i]['precio']), 15);
    }
    $pdf->Output();

?>