<?php

$diffX = -3.0;
$diffY = 0.0;

$y = 50.5;
$spacing = 8;

$pdf->SetFont('normalfont','',$normal_font_size);
//$y+= 22;

$pdf->SetXY(41+$diffX,$y+$diffY);
$pdf->CellFitScale(155,8,$nome_delegato,$border,0);

$y+= 5.5;

$pdf->SetXY(81+$diffX,$y+$diffY);
$pdf->CellFitScale(115,8,$nome_delegati,$border,0);

$y+= $spacing;

$y+= $spacing;

$y+= 34.5;

$pdf->SetXY(71+$diffX,$y+$diffY);
$pdf->CellFitScale(10,8,$sezione,$border,0,'C');

$pdf->SetXY(106+$diffX,$y+$diffY);
$pdf->CellFitScale(80,8,$comune,$border,0);

$y+= 12;
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
	$pdf->Rect(10,141,300,30,'F');
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

$y+= 10;

$pdf->SetXY(19+$diffX,$y+$diffY);
$pdf->CellFitScale(65,8,$luogo_documento,$border,0);

$pdf->SetXY(88+$diffX,$y+$diffY);
$pdf->CellFitScale(37,8,$data_documento,$border,0);

$y+= 27;

$pdf->SetXY(44+$diffX,$y+$diffY);
$pdf->CellFitScale(143,8,$nome_autenticatore,$border,0);

$y+= 5.5;

$pdf->SetXY(44+$diffX,$y+$diffY);
$pdf->CellFitScale(143,8,$qualifica_autenticatore,$border,0);

$y+= 10;

$pdf->SetXY(31+$diffX,$y+$diffY);
$pdf->CellFitScale(160,8,$nome_delegato,$border,0);

$y+= 5.5;

$pdf->SetXY(33+$diffX,$y+$diffY);
$pdf->CellFitScale(78,8,$comune_nascita_delegato,$border,0);

$pdf->SetXY(120+$diffX,$y+$diffY);
$pdf->CellFitScale(25,8,$data_nascita_delegato,$border,0);

//$pdf->SetXY(48+$diffX,$y+$diffY);
//$pdf->CellFitScale(135,8,$domicilio_delegato,$border,0);

$y+= 5.0;

$pdf->SetXY(81+$diffX,$y+$diffY);
$pdf->CellFitScale(114,8,$documento_delegato,$border,0);

$y+= 20.7;

$pdf->SetXY(30+$diffX,$y+$diffY);
$pdf->CellFitScale(72,8,$luogo_documento,$border,0);

$pdf->SetXY(110+$diffX,$y+$diffY);
$pdf->CellFitScale(37,8,$data_documento,$border,0);

?>