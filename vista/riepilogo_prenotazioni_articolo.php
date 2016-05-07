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
			<p>Utente: <?php echo $prenotazioni[0]->getNome().' '.$prenotazioni[0]->getCognome() ?></p><br/>

			<ul>
				<?php
			  // visualizzo la lista di biglietti prenotati dall'utente
				
				if ($prenotazioni) {
							foreach ($prenotazioni as $articolo)
							{
								?>
								<li id="lista_riepilogo">
									<img id="image"  src="uploads/images/<?= $articolo->getFoto() ?>" alt="foto"/>
									<a href="index.php?comando=dettaglioarticolo&ID=<?= $articolo->getArticolo() ?>"<b><?=	$articolo->getTitolo() ?></b></a>
									
									<br/>Prenotati <?=	$articolo->getNum_biglietti()?> biglietti
									<div style="text-align: right; text-decoration: none"><a href="index.php?comando=annulla_prenotazione&id_articolo=<?= $articolo->getArticolo() ?>&id_utente=<?= $articolo->getUserID() ?>"<b>Annulla Prenotazione</b></a></div>
									
									Costo biglietto: <?=	$articolo->getPrezzo()?>
									€. - TOT: <?=	$articolo->getCosto_tot()?>
									€. <br/>Posti ancora disponibili: <?=	$articolo->getPosti_disponibili(); ?>


								</li>
							  
							<?php }
							
				} else {echo'Nessuna prenotazione';}
				?>
			</ul>

		</div>	

		<footer>
			<?php include_once("vista/componenti/footer.php"); ?>
		</footer>
	</div>
</body>