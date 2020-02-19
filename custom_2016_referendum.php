<?php

$diffX = 0.0;
$diffY = 0.0;

$pdf->SetFont('boldfont','',$bold_font_size);
$y = 12;
$spacing = 8;

$pdf->SetXY(20+$diffX,$y+$diffY);
$pdf->CellFitScale(170,8,'REFERENDUM COSTITUZIONALE DEL 4 DICEMBRE 2016',$border,0,'C');

$pdf->SetFont('normalfont','',$normal_font_size);
$y+= 22;

$pdf->SetXY(47+$diffX,$y+$diffY);
$pdf->CellFitScale(140,8,$nome_delegato,$border,0);

$y+= $spacing;

$pdf->SetXY(35+$diffX,$y+$diffY);
$pdf->CellFitScale(117,8,$comune_nascita_delegato,$border,0);

$pdf->SetXY(160+$diffX,$y+$diffY);
$pdf->CellFitScale(25,8,$data_nascita_delegato,$border,0);

$y+= $spacing;

$domicilio_delegato = '';

$pdf->SetXY(48+$diffX,$y+$diffY);
$pdf->CellFitScale(135,8,$domicilio_delegato,$border,0);

$y+= 23;

$pdf->SetXY(71+$diffX,$y+$diffY);
$pdf->CellFitScale(10,8,$sezione,$border,0,'C');

$pdf->SetXY(106+$diffX,$y+$diffY);
$pdf->CellFitScale(80,8,$comune,$border,0);

$y+= 20;
$spacing = 6;

$pdf->SetXY(19+$diffX,$y+$diffY);
$pdf->CellFitScale(164,8,$nome_rdl,$border,0);

$y+= $spacing;

$pdf->SetXY(36+$diffX,$y+$diffY);
$pdf->CellFitScale(110,8,$comune_nascita_rdl,$border,0);

$pdf->SetXY(155+$diffX,$y+$diffY);
$pdf->CellFitScale(25,8,$data_nascita_rdl,$border,0);

$y+= $spacing;

$pdf->SetXY(41+$diffX,$y+$diffY);
$pdf->CellFitScale(145,8,$residenza_rdl,$border,0);

$y+= 17.5;

if(empty($nome_rdl_supplente))
{
	$pdf->SetFillColor(255,255,255);
	$pdf->Rect(10,113,300,30,'F');
	$y+= $spacing;
	$y+= $spacing;
}
else
{
	$pdf->SetXY(19+$diffX,$y+$diffY);
	$pdf->CellFitScale(164,8,$nome_rdl_supplente,$border,0);

	$y+= $spacing;

	$pdf->SetXY(36+$diffX,$y+$diffY);
	$pdf->CellFitScale(110,8,$comune_nascita_rdl_supplente,$border,0);

	$pdf->SetXY(155+$diffX,$y+$diffY);
	$pdf->CellFitScale(25,8,$data_nascita_rdl_supplente,$border,0);

	$y+= $spacing;

	$pdf->SetXY(41+$diffX,$y+$diffY);
	$pdf->CellFitScale(145,8,$residenza_rdl_supplente,$border,0);
}

$y+= 12;

$pdf->SetXY(19+$diffX,$y+$diffY);
$pdf->CellFitScale(72,8,$luogo_documento,$border,0);

$pdf->SetXY(94+$diffX,$y+$diffY);
$pdf->CellFitScale(37,8,$data_documento,$border,0);

$y+= 39.5;

$pdf->SetXY(44+$diffX,$y+$diffY);
$pdf->CellFitScale(143,8,$nome_autenticatore,$border,0);

$y+= 7.5;

$pdf->SetXY(45+$diffX,$y+$diffY);
$pdf->CellFitScale(140,8,$qualifica_autenticatore,$border,0);

$y+= 10;

$pdf->SetXY(70+$diffX,$y+$diffY);
$pdf->CellFitScale(120,8,$nome_delegato,$border,0);

$y+= 10;

$pdf->SetXY(58+$diffX,$y+$diffY);
$pdf->CellFitScale(130,8,$documento_delegato,$border,0);

$y+= 22.7;

$pdf->SetXY(19+$diffX,$y+$diffY);
$pdf->CellFitScale(72,8,$luogo_documento,$border,0);

$pdf->SetXY(94+$diffX,$y+$diffY);
$pdf->CellFitScale(37,8,$data_documento,$border,0);

?>