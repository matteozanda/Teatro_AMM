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
			<h1>Spettacoli in programma </h1>

			<ul>
				<?php
				  // visualizzo il catalogo
				  foreach ($catalogo as $articolo)
				{ ?>
					<li id=cat_art>
						<p id=cat_desc><a href="index.php?comando=dettaglioarticolo&ID=<?= $articolo->id; ?>" style="text-decoration: none;">  <?= $articolo->nome;  ?> </a></p>
						<div id=cat_img ><a href="index.php?comando=dettaglioarticolo&ID=<?= $articolo->id;  ?>"> <img id="image"  src="uploads/images/<?= $articolo->foto ?>" alt="foto"/> </a></div> 
						<div id=cat_price  style="text-decoration: none;">Biglietto:  &euro; <?= $articolo->prezzo ?> </div>
						<div id=cat_descr  style="text-decoration: none;">  <?= $articolo->testo;  ?> </div>
					</li>
				  
				<?php }
				?>
			</ul>

		</div>	

		<footer>
			<?php include_once("vista/componenti/footer.php"); ?>
		</footer>
	</div>
</body>

