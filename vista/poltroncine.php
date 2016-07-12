<!DOCTYPE html>

<head>
	<meta charset="UTF-8">
	<meta name="description" content="Esercitazione di AMM">
	<link rel="stylesheet" type="text/css" href="vista/css/stile.css">

   	<script type='text/javascript' src="js/script.js"></script>
	<title>Esercitazione di AMM</title>

	

	<?php if(isset($_SESSION['userID']))
		$userID = $_SESSION['userID'];
	else $userID = 0;
	?>

	<script language="javascript" type="text/javascript">
		var a=0;
		lista = new Array();
		var conta = 0;
		var userID = <?= $userID ?>

		var poltronePrenotate = new Array();
		var prenotante = new Array();

		popolaCaselle(15);

		function select(selezionato)
		{
			var selected = document.getElementById(selezionato);
			if(lista[selezionato] == null){
				selected.style.backgroundColor= 'blue';
				selected.style.color='white';
				lista[selezionato] = userID;
				conta ++;
				scriviSelezionati();
			}
			else{
				selected.style.backgroundColor= 'transparent';
				selected.style.color='blue';
				delete lista[selezionato];
				conta --;
				scriviSelezionati();
			}
		}

		function annullaSelezione(item, index) {
			var selected = document.getElementById(index);
			if(lista[index] != null){
				selected.style.backgroundColor= 'transparent';
				selected.style.color='blue';
				delete lista[index];
				conta =0;
				scriviSelezionati();
			}

		}
		function scriviSelezionati(){
			quantiPosti.innerHTML = '<b>Posti selezionati: '+conta+'<br /><br /></b>';
			selezionato.innerHTML = '';

			lista.forEach(scrivili);
			selezionato.innerHTML = selezionato.innerHTML; 

		}
		var invisible =0;
		function scrivili(item, index) {
			//invisible = invisible +  index + "-"+item + ", "; 
			selezionato.innerHTML = selezionato.innerHTML +  index + ", "; 

		}

		function inviaPrenotazione(){
			//var listaSeriale = lista.toString();
			//var listaDeserializzata = JSON.parse( listaSeriale );
			//var listaSeriale = json_encode(lista);
			//selezionato.innerHTML = listaSeriale; 

			if(userID != '0'){
				var listaPrenotati=selezionato.innerHTML;
				window.location = "index.php?comando=prenotaPoltroncine&id_articolo="+<?= $articolo->id ?>+"&id_utente="+userID+"&posti="+listaPrenotati;
			} else {
				quantiPosti.innerHTML = '<b>Occorre effettuare il login per poter prenotare</b>';
				selezionato.innerHTML = '';	
			}
		}

		function popolaCaselle(num){
			var selected = document.getElementById(num);
			selected.style.backgroundColor= 'blue';
			selected.style.color='white';
			selected.innerHTML = 'prova di scrittura';	
		}

	</script>
</head>

<body>

	<div class="wrapper">
		
		<header>
			<?php include_once("vista/componenti/header_image.php"); ?>
		</header>	
		
		<?php include_once("vista/componenti/topmenu.php"); 
		include_once("vista/componenti/sidebar_R.php"); ?>
		
		<div style="min-height: 500px"; class="page_2colonne">
			<h1>Prenotazione Poltroncine</h1>
			<h3> <?= $articolo->nome ?> </h1>

			<div id="poltroncine" >
				<table>
					<?php
						$num=0;
						$mieiposti=0;
						$num_poltroncina =0; //variabile utile alla colorazione delle poltroncine
						for($j=0;$j<10;$j++){
							echo "<tr>";
							for($i=0;$i<5;$i++){
								$num=($j.$i)+1;
								/*<td><a href=javascript:; onclick=select('p".$j.$i."', ".$num."); >*/
								
									if((int)$num == (int)$listaPoltroncinePrenotate[$num_poltroncina]->getNum_poltroncina() )
									{ 
										if($listaPoltroncinePrenotate[$num_poltroncina]->getUtente() == $userID)
											{echo "<td>
												<div style='background-color: goldenrod'   class='quadro' id= ".$num.">".$num."</div>
											</td>";
											$mieiposti ++;

										}
											else{echo "<td>
												<div style='background-color: red'   class='quadro' id= ".$num.">".$num."</div>
											</td>";}
										if($num_poltroncina < (count($listaPoltroncinePrenotate)-1)) $num_poltroncina ++;
									}
									else echo "
										<td><a href=javascript:; onclick=select('".$num."'); >
											<div  class='quadro' id= ".$num.">".$num."</div>
										</a></td>
									";
								}
							echo "<td><p style='min-width:25px'> </p></td>";
							for($i=5;$i<10;$i++){
								$num=($j.$i)+1;
									if((int)$num == (int)$listaPoltroncinePrenotate[$num_poltroncina]->getNum_poltroncina())
									{ 
										if($listaPoltroncinePrenotate[$num_poltroncina]->getUtente() == $id_utente)
											{echo "<td>
												<div style='background-color: goldenrod'   class='quadro' id= ".$num.">".$num."</div>
											</td>";
											$mieiposti ++;
										}
											else{echo "<td>
												<div style='background-color: red'   class='quadro' id= ".$num.">".$num."</div>
											</td>";}
										if($num_poltroncina < (count($listaPoltroncinePrenotate)-1)) $num_poltroncina ++;
									}
									else echo "
										<td><a href=javascript:; onclick=select('".$num."'); >
											<div  class='quadro' id= ".$num.">".$num."</div>
										</a></td>
									";
							}
							echo "</tr>";
						}
					?>
					<tr><td colspan="11"><div id="palco">PALCO</div></td></tr>
				</table>
			</div>

			<div id="quantiPosti"><b>Posti selezionati: 0</b>
			</div>
			<div id="selezionato"><b></b>
			</div>

			<div id="prenota">
				<button onclick="inviaPrenotazione()">Prenota</button>
				<button onclick="lista.forEach(annullaSelezione)">Annulla selezione</button>
			</div>

			<!-- stampo la legenda coi quadrati dei tre colori-->
			<div id="legenda">
				Legenda:
				
				<table>
				
					<tr><td><div style='background-color: red'   class='quadro'> </div></td>
						<td>Già prenotato da altri utenti</td>
					</tr>
					<tr><td><div style='background-color: transparent'   class='quadro'> </div></td>
						<td>Libero</td>
					</tr>
					<tr><td><div style='background-color: goldenrod'   class='quadro'> </div></td>
						<td>Prenotato da te</td>
					</tr>
					<tr><td><div style='background-color: blue'   class='quadro'> </div></td>
						<td>Selezione</td>
					</tr>

				</table>
			</div>
		</div>	
		<footer>
			<?php include_once("vista/componenti/footer.php"); ?>
		</footer>
	</div>
</body>

<?php
/*for ($i=0; $i<(count($listaPoltroncinePrenotate)-1); $i++)
	echo "<br/>".$i," ".$listaPoltroncinePrenotate[$i]->getNum_poltroncina();
*/?>
<!--
	//Passaggio array da php a Javascript
	
	var arrayJS= new Array();
	<?php
	$array_PHP = array('uno', 'due', 'tre');
	foreach($array_PHP as $chiave => $valore) {
	?>
	arrayJS[<?php echo $chiave; ?>] = [<?php echo $valore; ?>];
	<?php
	}
	?>
	*/
-->



<!-- -->