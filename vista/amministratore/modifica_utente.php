<!-- Pagina tramite la quale gestire gli utenti:
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
	    	<h1>Modifica: <?= $utente->nome ?>  <?= $utente->cognome ?></h1>
	    	<div id="modifica_utente">

			    <form action="index.php?comando=edit_user" method="post" enctype="multipart/form-data">
			        <label>Nome</label></br>
			        <input type="text" name="nome_utente" value="<?= $utente->nome ?> "></br></br>
			        <label>Cognome</label></br>
			        <input type="text" name="cognome_utente" value="<?= $utente->cognome ?>"></br></br>
			        <label>Ruolo: <?= $utente->ruolo ?> </label>
                    &emsp; &emsp; &emsp;


                    <input type="hidden" name="id_utente" value="<?= $utente->ID ?>" />
					
					<label>Cambia ruolo: </label>
                    <select name="ruolo_utente" value="1">
                        <option <?php if($utente->ruolo == "SuperUser"){echo "selected";} else{echo "value";} ?>="SuperUser">SuperUser</option>
                        <option <?php if($utente->ruolo == "Amministratore"){echo "selected";} else{echo "value";} ?>="Amministratore">Amministratore</option>
                        <option <?php if($utente->ruolo == "Utente Registrato"){echo "selected";} else{echo "value";} ?>="Utente Registrato">Utente Registrato</option>
                    </select>
                    


                    </br>
                    </br>
			        <label>ID: <?= $utente->ID ?>  &emsp; &emsp; Utente dal <?= $utente->timestamp ?> </label></br>

					</br>
                    </br>
					<!--<input type="submit" name="comando" value="Aggiorna" />-->
			        <button>Aggiorna</button>&emsp; &emsp; &emsp;
			        <a href="index.php?comando=gestisci_utenti"> Indietro </a>
			    </form>


	    	</div>
		</div>	

	    
	    <footer>
	        <?php include_once("vista/componenti/footer.php"); ?>
	    </footer>
    </div>
</body>




<!-- &nbsp; such as &thinsp;, &ensp;,and &emsp;   -->



