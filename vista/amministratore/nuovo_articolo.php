<!-- Pagina tramite la quale gestire gli articoli:
	Inserisci nuovo;
	Modifica;
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
	    	<h1>Nuovo Articolo</h1>
	    	<div id="titolo_articolo">

			    <form action="index.php?comando=newarticle"  method="post" enctype="multipart/form-data">
			        <label>Titolo</label></br>
			        <input type="text" name="titolo_art" placeholder="Titolo"></br></br>
			        <label>Sottotitolo</label></br>
			        <input type="text" name="sottotitolo_art" placeholder="Sottotitolo"></br></br>
			        <label>Descrizione</label></br>
					<textarea name="testo_art" rows="5" cols="30"></textarea></br></br>
			        <label>Prezzo</label></br>
			        <input type="text" name="prezzo_art" placeholder="Prezzo: € "></br></br>
                    <label>Carica una foto</label></br>
                    <input type="file" name="foto_art"><br></br>
			        <label>Posti disponibili</label></br>
			        <input type="text" name="posti_disponibili" value="100"></br></br>
                    <div id="status">
				        <label>Status</label></br>
				        <select name="status">
				        	<option value="pubblicato">Pubblicato</option>
				        	<option value="bozza">Bozza</option>
				        	<option value="eliminato">Eliminato</option>			        	
				        </select> </br></br>
			        </div>
					</br>
			        <button>Salva</button>
			    </form>



	    	</div>
		</div>	

	    
	    <footer>
	        <?php include_once("vista/componenti/footer.php"); ?>
	    </footer>
    </div>
</body>



controllo/newarticle.php



