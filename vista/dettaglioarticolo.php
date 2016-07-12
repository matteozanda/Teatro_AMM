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
													
						<h1> <?= $articolo->nome ?> </h1>
						<h3> <?= $articolo->sottotitolo ?> </h3>

						<p> <?= $articolo->prezzo ?> &euro; </p>
						<!--nl2br($articolo->testo); mi consente di rettificare la formattazione del testo-->
						<p> <?= nl2br($articolo->testo); ?> </p>
						<p class="fotoDettaglio"> <img src="uploads/images/<?= $articolo->foto ?>" alt="foto"/> </p>

						<form action="index.php" method="get">
							<label>Ancora <?= $articolo->posti_disponibili-$numPostiDisponibili; ?> posti disponibili</label><br><br>
							

							<input type="hidden" name="ID" value="<?= $articolo->id ?>" />
							<input type="hidden" name="posti_disponibili" value="<?= $articolo->posti_disponibili ?>" />
							<input type="submit" name="comando" value="Prenota biglietti" />
						</form>
							<p>
							<a href="index.php?comando=catalogo"> Torna al catalogo </a>
						</p>

		</div>	

		<footer>
			<?php include_once("vista/componenti/footer.php"); ?>
		</footer>
	</div>
</body>

