<?php

$tornate = array(
	//'2020_2' => array('descrizione' => 'Referendum confermativo sul taglio dei parlamentari del 29 marzo 2020', 'elezioni' => array('2020-referendum')),
	'2020_1' => array('descrizione' => 'Elezioni Regionali dell\'Emilia-Romagna del 26 gennaio 2020', 'elezioni' => array('2020_regionali_er')),
	'2019_1' => array('descrizione' => 'Elezioni Europee e Comunali del 26 maggio 2019', 'elezioni' => array('2019_europee','2019_comunali')),
	'2018_1' => array('descrizione' => 'Elezioni Politiche del 4 marzo 2018', 'elezioni' => array('2018_camera','2018_senato'), 'note' => 'NOTA: non è stata prevista l\'opzione di nomina diretta da parte dei due delegati principali, che andrebbe fatta in modo congiunto, tecnicamente possibile, ma non viene quasi mai utilizzata, se dovesse servire a qualcuno non esitate a contattarmi e vedrò di inserire anche questa opzione.'),
	'2016_1' => array('descrizione' => 'Referendum confermativo sulla riforma costituzionale del 4 dicembre 2016', 'elezioni' => array('2016_referendum')),
);

$elezioni = array(
	'2020_referendum' => array('tipo' => 'Referendum'),
	'2020_regionali_er' => array('tipo' => 'Regionali'),
	'2019_europee' => array('tipo' => 'Europee'),
	'2019_comunali' => array('tipo' => 'Comunali'),
	'2018_camera' => array('tipo' => 'Camera'),
	'2018_senato' => array('tipo' => 'Senato'),
	'2016_referendum' => array('tipo' => 'Referendum'),
	//'esempio_completo' => array('tipo' = 'Comunali', 'normalfont' => 'CALIBRI.php', 'normalfontsize' => 12, 'boldfont' => 'CALIBRIB.php', 'boldfontsize' => 14), 
);

$versione_programma = '1.5';

if(!empty($_GET['tornata']) && !empty($tornate[$_GET['tornata']]))
 $tornata_corrente_id = $_GET['tornata'];
else
 $tornata_corrente_id = key($tornate);

$elezioni_correnti = $tornate[$tornata_corrente_id]['elezioni'];

$elezione_unica = (count($elezioni_correnti)==1);

if(empty($_POST))
{
?><!DOCTYPE html>
<html>
<head>
	<title>M5S RdL Designator</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
</head>
<body onload="ol()">
	<p><font size="+3">M5S RdL Designator <?php echo $tornate[$tornata_corrente_id]['descrizione']; ?></font><br><font size="-1">ver <?php echo $versione_programma; ?> Realizzato da <a href="mailto:d.vergini@gameprog.it">Daniele Vergini</a> del <a href="http://www.movimento5stelleforli.it">M5S Forl&igrave;</a> (non esitate a contattarmi per domande, segnalazione bug e richieste di customizzazione)</font></p>

	<p>Questa applicazione web permette di generare facilmente le nomine per rappresentanti di lista del MoVimento 5 Stelle partendo da un semplice foglio di calcolo.</p>
	
	<p>Alcuni Comuni permettono di presentare un unico modulo cumulativo con tutti i nomi dei rappresentanti di lista, ma altri richiedono esplicitamente un modulo per ogni seggio, questo programmino viene incontro all&apos;esigenza di automatizzare questa operazione che richiederebbe molto tempo. Il programma compila automaticamente i moduli di designazione dei rappresentanti di lista per i vari seggi prelevando i dati da un foglio di calcolo, generando un unico file PDF da stampare, le designazioni saranno quindi solo da firmare e timbrare.</p>

	<p><strong><u>Clicca "invia" in fondo senza toccare nulla per vedere un esempio dell'esito</u></strong></p>

	<p><b>ISTRUZIONI</b></p>
	<p>1) Scaricate uno dei seguenti file di esempio (vengono fornite varie versioni per i vari programmi di fogli di calcolo, cliccate sui link sottostanti per scaricare quello più adatto a voi)
	<ul>
		<li><a href="files/esempio_rdl.xlsx">formato XLSX</a> (per Excel 2007 o successivi, va bene anche per Open Office o simili)</li>
		<li><a href="files/esempio_rdl.xls">formato XLS</a> (per chi ha versioni precedenti di Excel)</li>
		<!--li><a href="files/esempio_rdl.ods">formato ODS</a> (per software di fogli di calcolo open source)</li-->
		<li><a href="files/esempio_rdl.csv">formato CSV</a> (per chi dispone solo di un editor di testo)</li>
	</ul>
	</p>
	
	<p>2) Compilate il file con i dati di tutti i vostri rappresentanti di lista <u>seguendo la stessa formattazione del file di esempio</u> dove ogni riga dovrà contenere: il Comune, il n. del seggio, i dati del rappresentate effettivo (pi&ugrave;, solo se presente, i dati del rappresentante supplente). Potete inserire nel file un numero a piacere di righe. Il file ottenuto dovrà essere usato come file di input nella form sottostante.</p>
	
	<p>3) Compilate i restanti campi di input testuali che vedete qui sotto con i dati reali di chi designa i rappresentanti e dell&apos;autenticatore</p>
	
	<p>4) Cliccate invia e verrà automaticamente generato in pochi secondi il PDF pronto da stampare</p>

	<p>NOTA BENE: nessun dato viene salvato sul server, ma sono utilizzati esclusivamente per generare il pdf</p>

	<form method="POST" action="" enctype="multipart/form-data">
		<strong>INSERISCI DI SEGUITO I DATI CHE VUOI UTILIZZARE</strong> (quelli che trovi precompilati sono solo di esempio)
		<table border="0">
		<tr><td>File di input</td><td><input type="file" name="dati"> (file contenente i dati dei rappresentanti di lista, da caricare dal tuo pc)</td></tr>
<?php
	if($elezione_unica)
	 echo '		<input type="hidden" name="elezioni[]" value="'.current($elezioni_correnti).'" />'."\n";
	else
	{
		echo '		<tr><td>Scegli elezioni</td><td>';
		foreach($elezioni_correnti as $e)
	 	 echo '<input type="checkbox" checked="checked" id="elezione_'.$e.'" name="elezioni[]" value="'.$e.'" onclick="javascript:x =document.getElementsByClassName(\''.$elezioni[$e]['tipo'].'\'); for(i = 0; i < x.length; i++) if(x[i].style.display==\'none\') x[i].style.display=\'\'; else x[i].style.display=\'none\';" /> '.$elezioni[$e]['tipo'].'<br />';

	 	echo '</td></tr>'."\n";
	}

	foreach($elezioni_correnti as $e)
 	{
 		if(in_array($elezioni[$e]['tipo'],array('Camera','Senato')))
 		 echo '		<tr class="'.$elezioni[$e]['tipo'].'"><td>Nome Cognome delegati di lista'.($elezione_unica?'':' '.$elezioni[$e]['tipo']).'</td><td><input type="text" name="nome_delegati_'.$e.'" value="Primo '.$elezioni[$e]['tipo'].' e Secondo '.$elezioni[$e]['tipo'].'" size="75"> (che hanno firmato le sub-delege dal notaio per '.$elezioni[$e]['tipo'].')</td></tr>';
 	}
?> 				
		<tr><td colspan="2">&nbsp;</td></tr>
		<tr><td colspan="2"><strong>Dati della persona che designa i rappresentanti di lista</strong> (è colui che fa materialmente la nomina, solitamente si tratta del &quot;delegato&quot; o del &quot;sub-delegato&quot;, per quest'ultimo non dimenticate di allegare alle designazione la delega che vi deve aver fornito il delegato)</td></tr>
		<tr><td>Nome Cognome (sub)delegato</td><td><input type="text" name="nome_delegato" value="Daniele Vergini" size="75"></td></tr>
<?php
	foreach($elezioni_correnti as $e)
 	{
 		if(!in_array($elezioni[$e]['tipo'],array('Camera','Senato')))
 		 echo '		<tr class="'.$elezioni[$e]['tipo'].'"><td>In qualità di'.($elezione_unica?'':' ('.$elezioni[$e]['tipo'].')').'</td><td><input type="text" name="qualita_'.$e.'" value="subdelegato giusta delega che si allega in copia al presente atto di nomina" size="75"></td></tr>';

 		if($elezioni[$e]['tipo']=='Comunali')
 		 echo '		<tr class="'.$elezioni[$e]['tipo'].'"><td>Comune'.($elezione_unica?'':' (Comunali)').'</td><td><input type="text" name="comune_'.$e.'" value="COMUNE DI FORLI\'" size="75"></td></tr>';
 	}
?>
		<tr><td>Comune Nascita (sub)delegato</td><td><input type="text" name="comune_nascita_delegato" value="Forl&igrave;" size="75"></td></tr>
		<tr><td>Data Nascita (sub)delegato</td><td><input type="text" name="data_nascita_delegato" value="25/06/1977"> (formato GG/MM/AAAA)</td></tr>
		<tr><td>Documento del (sub)delegato</td><td><input type="text" name="documento_delegato" value="Carta di identit&agrave; n.AT12345678" size="75"></td></tr>
		<tr><td>Luogo Firma Documento</td><td><input type="text" name="luogo_documento" value="Forl&igrave;" size="50"> (attenzione il luogo deve essere nella &quot;giurisdizione&quot; dell&apos;autenticatore)</td></tr>
		<tr><td>Data Firma Documento</td><td><input type="text" name="data_documento" value="<?php echo date('d/m/Y'); ?>"> (formato GG/MM/AAAA)</td></tr>
		<tr><td colspan="2">&nbsp;</td></tr>
		<tr class="aut"><td colspan="2"><strong>Dati dell'autenticatore</strong> (deve essere una persona diversa dalla precedente, e deve avere poteri di autentica ai fini elettorali, ad es un consigliere comunale abilitato, un segretario comunale o un dipendente comunale abilitato. Se non siete certi chi vi autenticherà la firma lasciante in bianco e compilate a mano successivamente)</td></tr>
		<tr class="aut"><td>Nome Cognome autenticatore firma</td><td><input type="text" name="nome_autenticatore" value="Simone Benini" size="75"> (ATTENZIONE: deve essere una persona diversa dal (sub)delegato!)</td></tr>
		<tr class="aut"><td>Qualifica autenticatore firma</td><td><input type="text" name="qualifica_autenticatore" value="Consigliere Comunale" size="50"></td></tr>
		<tr><td>Oscura autentica</td><td><input type="checkbox" id="oscura_autentica" name="oscura_autentica" value="1" onclick="javascript:x =document.getElementsByClassName('aut'); for(i = 0; i < x.length; i++) if(x[i].style.display=='none') x[i].style.display=''; else x[i].style.display='none';"> (per generare estratti di nomine cumulative)</td></tr>
		</table>
		
		<input type="submit" name="submit" value="invia" style="width:90px;height:45px;"> (e attendi pazientemente qualche secondo, si aprir&agrave; direttamente il PDF)
	</form>
	
	<p><strong>MODULO PER DESIGNAZIONI COMULATIVE</strong>: per evitare di firmare tanti moduli potete usare anche il 
<?php
	if($elezione_unica)
	 echo '<a href="files/modulo_'.current($elezioni_correnti).'_cumulativo.docx">file docx Word per le nomine cumulative</a>';
	else
	{
		echo 'file docx Word per le nomine cumulative per ';
		$o = '';
		foreach($elezioni_correnti as $e)
		{
			echo $o.'<a href="files/modulo_'.$e.'_cumulativo.docx">'.$elezioni[$e]['tipo'].'</a>';
			$o = ' o ';
		}
	}
?>
 (clicca nel link qui a sinistra per scaricarlo) anche questo modulo va autenticato, e l'autentica va su ogni facciata, alcuni comuni chiedono in aggiunta anche gli "estratti" singoli che è possibile generare cliccando sopra l'apposita spunta.</p>

<?php 
	
	if(!empty($tornate[$tornata_corrente_id]['note']))
	 echo '	<p>'.$tornate[$tornata_corrente_id]['note'].'</p>'; 

?>

	<p style="text-align: right;"><font size="-1">Moduli elezioni precedenti:<br />
<?php
	foreach($tornate as $kt => $t)
	 if($kt == $tornata_corrente_id)
	  continue;
	 else
	  echo '	<a href="?tornata='.$kt.'">'.$t['descrizione'].'</a><br />'."\n";
?>
	</font></p>
	<script>
	function ol()
	{
		if(document.getElementById("oscura_autentica").checked == true)
		{
			x = document.getElementsByClassName('aut'); 
			for(i = 0; i < x.length; i++) 
			 if(x[i].style.display=='none') 
			  x[i].style.display=''; 
			 else 
			  x[i].style.display='none';			
		}
<?php
		if(!$elezione_unica)
		 foreach($elezioni_correnti as $e)
	 	  echo '

		if(document.getElementById("elezione_'.$e.'").checked != true)
		{
			x = document.getElementsByClassName(\''.$elezioni[$e]['tipo'].'\'); 
			for(i = 0; i < x.length; i++) 
			 if(x[i].style.display==\'none\') 
			  x[i].style.display=\'\'; 
			 else 
			  x[i].style.display=\'none\';
		}';
?>

	}
	</script>
</body>
</html>
<?php
}
else
{
	if(
		empty($_POST['elezioni'])||
		//empty($_POST['qualita'])||
		empty($_POST['nome_delegato'])||
	    empty($_POST['comune_nascita_delegato'])||
	    empty($_POST['data_nascita_delegato'])||
	    //empty($_POST['luogo_documento'])||
	    //empty($_POST['data_documento'])||
	    //empty($_POST['nome_autenticatore'])||
	    //empty($_POST['qualifica_autenticatore'])||
	    empty($_POST['documento_delegato'])||
	    uploadError()
	)
	{
		echo '<font color="red">ATTTENZIONE: mancano dei dati obbligatori! Torna indietro e compilali.</font>';
		die();
	}

	require_once './vendor/autoload.php';
	require_once './libs/FPDI_CellFit.php';

	if($_FILES['dati']['error']==UPLOAD_ERR_NO_FILE)
	 $tmpfile = 'files/esempio_rdl.xls';
	else
	 $tmpfile = $_FILES['dati']['tmp_name'];

	class MyReadFilter implements \PhpOffice\PhpSpreadsheet\Reader\IReadFilter
	{
	    public function readCell($column, $row, $worksheetName = '') 
	    {
            if(in_array($column,range('A','J'))) 
            {
                return true;
            }
	        return false;
	    }
	}

	$inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($tmpfile);
	$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
	$reader->setReadFilter(new MyReadFilter());
	if($inputFileType=='Csv')
	 $reader->setInputEncoding("CP1252");
	$spreadsheet = $reader->load($tmpfile);

	$worksheet = $spreadsheet->getSheet(0);
	//$worksheet->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_DDMMYYYY);
	//$worksheet->getStyle("E2")->getNumberFormat()->setFormatCode("YYYY-MM-DD");
	$sheetData = $worksheet->toArray('');

	if($sheetData[0][0]=='Comune')
	 unset($sheetData[0]); // rimuovo header se presente

	if($_POST['nome_delegato']=='debugdata')
	{
		echo '<pre>';
		print_r($_POST);
		echo print_r($sheetData, true);
		echo '</pre>';
		die();
	}
	elseif($_POST['nome_delegato']=='debugborder')
	 $border = 1;
	else
	 $border = 0;

	$pdf = new FPDI_CellFit();

	$pdf->SetAutoPageBreak(false);

	$pdf->AddFont('normalfont','','CALIBRI.php');
	$pdf->AddFont('boldfont','','CALIBRIB.php');

	$nome_delegato = empty($_POST['nome_delegato'])?'':trim(iconv('UTF-8', 'CP1252//TRANSLIT',$_POST['nome_delegato']));
    $comune_nascita_delegato = empty($_POST['comune_nascita_delegato'])?'':trim(iconv('UTF-8', 'CP1252//TRANSLIT',$_POST['comune_nascita_delegato']));
    $data_nascita_delegato = empty($_POST['data_nascita_delegato'])?'':trim(iconv('UTF-8', 'CP1252//TRANSLIT',$_POST['data_nascita_delegato']));

    $luogo_documento = empty($_POST['luogo_documento'])?'':trim(iconv('UTF-8', 'CP1252//TRANSLIT',$_POST['luogo_documento']));
    $data_documento = empty($_POST['data_documento'])?'':trim(iconv('UTF-8', 'CP1252//TRANSLIT',$_POST['data_documento']));

    $nome_autenticatore = empty($_POST['nome_autenticatore'])?'':trim(iconv('UTF-8', 'CP1252//TRANSLIT',$_POST['nome_autenticatore']));
    $qualifica_autenticatore = empty($_POST['qualifica_autenticatore'])?'':trim(iconv('UTF-8', 'CP1252//TRANSLIT',$_POST['qualifica_autenticatore']));
    $documento_delegato = empty($_POST['documento_delegato'])?'':trim(iconv('UTF-8', 'CP1252//TRANSLIT',$_POST['documento_delegato']));
    $oscura_autentica = empty($_POST['oscura_autentica'])?false:true;

	foreach($sheetData as $s)
	{
		$comune = empty($s[0])?'':trim(iconv('UTF-8', 'CP1252//TRANSLIT',$s[0]));
		$sezione = empty($s[1])?'':trim(iconv('UTF-8', 'CP1252//TRANSLIT',$s[1]));
		$nome_rdl = empty($s[2])?'':trim(iconv('UTF-8', 'CP1252//TRANSLIT',$s[2]));
		$comune_nascita_rdl = empty($s[3])?'':trim(iconv('UTF-8', 'CP1252//TRANSLIT',$s[3]));
		$data_nascita_rdl = empty($s[4])?'':trim(iconv('UTF-8', 'CP1252//TRANSLIT',$s[4]));
		$residenza_rdl = empty($s[5])?'':trim(iconv('UTF-8', 'CP1252//TRANSLIT',$s[5]));
		$nome_rdl_supplente = empty($s[6])?'':trim(iconv('UTF-8', 'CP1252//TRANSLIT',$s[6]));
		$comune_nascita_rdl_supplente = empty($s[7])?'':trim(iconv('UTF-8', 'CP1252//TRANSLIT',$s[7]));
		$data_nascita_rdl_supplente = empty($s[8])?'':trim(iconv('UTF-8', 'CP1252//TRANSLIT',$s[8]));
		$residenza_rdl_supplente = empty($s[9])?'':trim(iconv('UTF-8', 'CP1252//TRANSLIT',$s[9]));

		foreach($_POST['elezioni'] as $elezione)
		{
			$nome_delegati = empty($_POST['nome_delegati_'.$elezione])?'':trim(iconv('UTF-8', 'CP1252//TRANSLIT',$_POST['nome_delegati_'.$elezione]));
			$qualita = empty($_POST['qualita_'.$elezione])?'':trim(iconv('UTF-8', 'CP1252//TRANSLIT',$_POST['qualita_'.$elezione]));
			$comune_comunali = empty($_POST['comune_'.$elezione])?'':trim(iconv('UTF-8', 'CP1252//TRANSLIT',$_POST['comune_'.$elezione]));

			$pdf->setSourceFile('./files/modulo_'.$elezione.'.pdf');
			$tplidx = $pdf->ImportPage(1);
			$s = $pdf->getTemplateSize($tplidx);
			$pdf->AddPage($s['orientation'], array($s['width'], $s['height']));
			$pdf->useTemplate($tplidx);

			if(!empty($elezioni[$elezione]['normalfont']))
			 $pdf->AddFont('normalfont','',$elezioni[$elezione]['normalfont']);

			if(!empty($elezioni[$elezione]['boldfont']))
			 $pdf->AddFont('boldfont','',$elezioni[$elezione]['boldfont']);

			if(!empty($elezioni[$elezione]['normalfontsize']))
			 $normal_font_size = $elezioni[$elezione]['normalfontsize'];
			else
			 $normal_font_size = 12;

			if(!empty($elezioni[$elezione]['boldfontsize']))
			 $bold_font_size = $elezioni[$elezione]['boldfontsize'];
			else
			 $bold_font_size = 14;

			if(file_exists('./custom_'.$elezione.'.php'))
			 require './custom_'.$elezione.'.php';
			else //default
			{
				$diffX = -3.0;
				$diffY = 8;

				$y = 50.5;
				$spacing = 8;

				if($elezioni[$elezione]['tipo']=='Comunali')
				{
					$pdf->SetFont('boldfont','',$bold_font_size);
					$pdf->SetXY(38+$diffX,18+$diffY);
					$pdf->CellFitScale(140,8,$comune_comunali,$border,0,'C');
				}

				$pdf->SetFont('normalfont','',$normal_font_size);
				//$y+= 22;

				$pdf->SetXY(41+$diffX,$y+$diffY);
				$pdf->CellFitScale(155,8,$nome_delegato,$border,0);

				$y+= 5.5;

				$pdf->SetXY(39+$diffX,$y+$diffY);
				$pdf->CellFitScale(157,8,$qualita,$border,0);

				$y+= $spacing;

				$y+= $spacing;

				$y+= 35;

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
					$pdf->Rect(10,151,300,30,'F'); // secondo numero Y
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

				if($oscura_autentica)
				{
					$y+= 10;
					$pdf->SetFillColor(255,255,255);
					$pdf->Rect(10,$y,300,110,'F');
				}
				else
				{
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

					$y+= 5.0;

					$pdf->SetXY(81+$diffX,$y+$diffY);
					$pdf->CellFitScale(114,8,$documento_delegato,$border,0);

					$y+= 20.7;

					$pdf->SetXY(30+$diffX,$y+$diffY);
					$pdf->CellFitScale(72,8,$luogo_documento,$border,0);

					$pdf->SetXY(110+$diffX,$y+$diffY);
					$pdf->CellFitScale(37,8,$data_documento,$border,0);
				}
			}
		}
	}

	$pdf->Output('designator_output.pdf','I');	
}

function uploadError()
{
	if($_FILES['dati']['error']==UPLOAD_ERR_NO_FILE)
	 return false; // vado avanti in caso di nessun file cariacato (uso file di test)

	if(!empty($_FILES['dati']['error']))
	 return true;

	return !is_uploaded_file($_FILES['dati']['tmp_name']);
}

?>