<!-- Pagina tramite la quale gestire gli articoli:

Visualizza;
Modifica;
Aggiungi;
Elimina.
 -->


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
	    	<h1>Gestisci gli articoli</h1> 
			<ul>
				<?php
				  // visualizzo il catalogo
				  foreach ($catalogo as $nome => $articolo)
				{ ?>

					<li id=cat_art_edit>
					<p id=cat_desc_edit><a href="index.php?comando=modifica_articolo&ID=<?= $articolo->id; ?>" style="text-decoration: none;">  <?= $articolo->nome;  ?> </a></p>
					<div id=cat_img_edit ><a href="index.php?comando=modifica_articolo&ID=<?= $articolo->id; ?>"> <img id="image_edit"  src="uploads/images/<?= $articolo->foto ?>" alt="foto"/> </a></div> 
					<div id=cat_price_edit  style="text-decoration: none;">  € <?= $articolo->prezzo;  ?> </div>
					<div id=cat_descr_edit  style="text-decoration: none;">  <?= $articolo->testo;  ?> </div>
					<div id=cat_date_edit  style="text-decoration: none;"> Inserito il: <?= $articolo->data;?> - <?= $articolo->status;?></div>
					<div id=cat_status_edit  style="text-decoration: none;"> </div>
					


					<div id=cat_ico_edit>
						<a href="index.php?comando=modifica_articolo&ID=<?= $articolo->id; ?>" style="text-decoration: none; font-size: 0.9em;"> 
						<img src="immagini\edit_ico\edit.png" width="10%">Modifica </a>
						
						<a  style="text-decoration: none;" href="#"  onclick="deleteArticle(<?= $articolo->id; ?>)" ><img src="immagini\edit_ico\delete.png" width="10%">Elimina</a>
					
					</div>
					
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







