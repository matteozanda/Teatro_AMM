<!-- Pagina tramite la quale gestire gli articoli:
	Modifica;
 -->


<!DOCTYPE html>

<?php include_once("vista/componenti/head.php"); ?>

<body>
    <div class="wrapper">

        <header>
            <?php include_once("vista/componenti/header_image.php"); ?>
        </header>   
        
        <?php 
        include_once("vista/componenti/topmenu.php"); 
        //include_once("vista/componenti/sidebar_L.php");
        include_once("vista/componenti/sidebar_R.php"); ?>
        
	    <div class="page_2colonne">
	    	<h1>Modifica: <?= $articolo->nome ?></h1>
	    	<div id="modifica_articolo">

			    <form action="index.php?comando=edit_article" method="post" enctype="multipart/form-data">
			        <label>Titolo</label></br>
			        <input type="text" name="titolo_art" value="<?= $articolo->nome ?> "></br></br>
			        <label>Sottotitolo</label></br>
			        <input type="text" name="sottotitolo_art" value="<?= $articolo->sottotitolo ?>"></br></br>
			        <label>Descrizione</label></br>
					<textarea name="testo_art" rows="30" cols="90" ><?= $articolo->testo ?> </textarea></br></br>
			        <label>Prezzo</label></br>
			        <input type="text" name="prezzo_art" value="<?= $articolo->prezzo ?> &euro;"></br></br>
                    <p> <img src="uploads/images/<?= $articolo->foto ?>" alt="foto"/> </p>
                    <label>Cambia foto:</label></br>
                    <input type="file" name="foto_art"><br></br>

                    <input type="hidden" name="id_art" value="<?= $articolo->id ?>" />


			        <label>Posti disponibili</label></br>
			        <input type="text" name="posti_disponibili" value="<?= $articolo->posti_disponibili ?>"></br></br>


                    <label>Modifica status: </label>
                    <select name="status_art" value="1">
                        <option <?php if($articolo->status == "Pubblicato"){echo "selected";} else{echo "value";} ?>="Pubblicato">Pubblicato</option>
                        <option <?php if($articolo->status == "Bozza"){echo "selected";} else{echo "value";} ?>="Bozza">Bozza</option>
                        <option <?php if($articolo->status == "Eliminato"){echo "selected";} else{echo "value";} ?>="Eliminato">Eliminato</option>
                    </select>
                    </br>

					</br>
					<!--<input type="submit" name="comando" value="Aggiorna" />-->
			        <button>Aggiorna</button>&emsp; &emsp; &emsp;
			        <a href="index.php?comando=gestisci_articoli"> Indietro </a>
			    </form>


	    	</div>
		</div>	

	    
	    <footer>
	        <?php include_once("vista/componenti/footer.php"); ?>
	    </footer>
    </div>
</body>




