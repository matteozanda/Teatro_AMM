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
			<h1>Resoconto Prenotazioni</h1>

			<ul>
				<?php
			  // visualizzo la lista di biglietti prenotati dall'utente
				
				if ($prenotazioni) {
					foreach ($prenotazioni as $articolo)
					{
						 ?>
						<li id="lista_riepilogo">
							<?php $tot_biglietti = $articolo->getNum_biglietti(); if(is_null($tot_biglietti))$tot_biglietti = 0; ?>
							<?php $tot_costo = $tot_biglietti * $articolo->getPrezzo(); if(is_null($tot_costo))$tot_costo = 0; ?>


							<img id="image"  src="uploads/images/<?= $articolo->getFoto() ?>" alt="foto"/><?=	"Art.".$articolo->getArticolo()." - " ?>
							<b><?=	$articolo->getTitolo() ?></b>
							<br/><br/>Costo biglietto: <?=	$articolo->getPrezzo()?>€. - TOT: <?=	$tot_costo ?>€. 
							<br/>Posti ancora disponibili: <?=	$articolo->getPosti_disponibili(); ?>
							
							<a href="index.php?comando=dettaglio_prenotazioni_articolo&ID=<?= $articolo->getArticolo() ?>">
								<br/><br/>Prenotati <?=	$tot_biglietti ?> biglietti
								<br/>Utenti prenotanti: <?= $this->modello->recupera_num_prenotazioni_per_idArticolo( $articolo->getArticolo()); ?>
							</a>
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