<!-- Pagina tramite la quale gestire gli utenti:

Visualizza;
Modifica;
Aggiungi;
Elimina.


STRUTTURA DB UTENTI
	ID
	nome
	cognome
	password
	ruolo
	connected
	timestamp

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
	    	<h1>Gestisci gli utenti</h1>

			<ul>
				<?php
				// visualizzo la lista utenti
				foreach ($catalogo as $chiave => $utente)	
				{ ?>

					<li id=lista_utenti_edit>
						<div id=user_nome_edit  style="text-decoration: none;"> <a href="index.php?comando=modifica_utente&ID=<?= $utente->ID ?>" style="text-decoration: none;"><?= $utente->nome;?> <?= $utente->cognome; ?> </a></div>
						<div id=user_ruolo_edit  style="text-decoration: none;"><?= $utente->ruolo; ?> </div>
						<div id=user_data_edit   style="text-decoration: none;"> ID: <?= $utente->ID; ?>     &emsp; &emsp; Utente dal: <?= $utente->timestamp;?></div> 
						<?php $num_biglietti = $this->modello->recupera_num_prenotazioni_per_idUtente($utente->ID); if(is_null($num_biglietti))$num_biglietti = 0; ?>
			            <a href="index.php?comando=vedi_prenotati_per_id&ID=<?= $utente->ID; ?>" style="text-decoration: none"><?= $num_biglietti; ?> biglietti prenotati</a><br/>

						<div id=cat_ico_edit>
							<a href="index.php?comando=modifica_utente&ID=<?= $utente->ID; ?>" style="text-decoration: none; font-size: 0.9em;"> 
							<img src="immagini\edit_ico\edit.png" width="10%">Modifica </a>
							
							<a  style="text-decoration: none;" href="#"  onclick="deleteUser(<?= $utente->ID; ?>)" ><img src="immagini\edit_ico\delete.png" width="10%">Elimina</a>
						
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







