<!DOCTYPE html>

<?php include_once("vista/componenti/head.php"); ?>

<body>
	<div class="wrapper">
		
		<header>
            <?php include_once("vista/componenti/header_image.php"); ?>
		</header>	
        <?php include_once("vista/componenti/topmenu.php"); 
        //include_once("vista/componenti/sidebar_L.php");
        include_once("vista/componenti/sidebar_R.php"); ?>
        
		<div class="page_2colonne">
			<h1>Riepilogo Prenotazioni</h1>
			
			<ul>
				<?php
			  // visualizzo la lista di biglietti prenotati dall'utente
				if ($prenotazioni) {
					echo "<p>Articolo: ".$prenotazioni[0]->getTitolo(). " - Posti ancora disponibili: ".$prenotazioni[0]->getPosti_disponibili()."</p><br/>";
					foreach ($prenotazioni as $articolo)
					{
						?>
						<li id="lista_riepilogo">
							
							<b><?=	$articolo->getNome()." ".$articolo->getCognome(); ?></b>
							
							<br/>Prenotati <?=	$articolo->getNum_biglietti()?> biglietti
							<div style="text-align: right; text-decoration: none"><a href="index.php?comando=annulla_prenotazione&id_articolo=<?= $articolo->getArticolo() ?>&id_utente=<?= $articolo->getUserID()?>&pagina= dettaglio_prenotazioni_articolo"<b>Annulla Prenotazione</b></a></div>
							
							Costo biglietto: <?= $articolo->getPrezzo()?>
							€. - TOT: <?=	$articolo->getCosto_tot()?>
							€. <br/>

						</li>
					<?php }
				} else {echo'Nessuna prenotazione per questo spettacolo';}
				?>
			</ul>

		</div>	

		<footer>
			<?php include_once("vista/componenti/footer.php"); ?>
		</footer>
	</div>
</body>