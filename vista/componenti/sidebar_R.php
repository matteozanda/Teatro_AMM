<div class="sidebar2">
	<nav>
        <div class="login">
        	<?php


        		$risultato = $this->modello->recupera_utente_connesso();
        		if(null == ($risultato)){ echo "Non connesso<br><br><br>";}
        		else{echo $risultato->nome."<br> Cod.Utente: ".$risultato->ID ; }
				

	        	//$is_connected=0;
	        	if(isset($_SESSION['username']) && isset($_SESSION['ruolo_utente'])){

	        		//echo $UtenteConnesso->ID." ".$UtenteConnesso->nome."<br/>";
	        		if ($_SESSION['ruolo_utente']=='SuperUser'){
	        			?>
			            	<p>Super User</p>
							
			            	<a href="index.php?comando=gestisci_articoli" style="text-decoration: none">Gestisci gli articoli</a><br/>
			            	<a href="index.php?comando=nuovo_articolo" style="text-decoration: none">Nuovo Articolo</a><br/>
			            	<a href="index.php?comando=gestisci_utenti" style="text-decoration: none">Gestisci gli utenti</a><br/>
			            	<a href="index.php?comando=resoconto_prenotazioni" style="text-decoration: none">Resoconto Prenotazioni</a><br/>
							<br/><br/>
							<a href="index.php?comando=logout" style="text-decoration: none">Esci</a><br/> 
		            	<?php
	            	}
	        		else if ($_SESSION['ruolo_utente']=='Amministratore'){
	        			?>
			            	<p>Amministratore</p>
							<?php 
								$tot_biglietti = $this->modello->recupera_num_prenotazioni_per_idUtente($_SESSION['userID']);
								if(is_null($tot_biglietti))$tot_biglietti = 0;
							?>

			            	<a href="index.php?comando=gestisci_articoli" style="text-decoration: none">Gestisci gli articoli</a><br/>
			            	<a href="index.php?comando=nuovo_articolo" style="text-decoration: none">Nuovo Articolo</a><br/>
			            	<a href="index.php?comando=resoconto_prenotazioni" style="text-decoration: none">Resoconto Prenotazioni</a><br/>
			            	<br/>
			            	<?php if($tot_biglietti != 0){ ?>
			            		<a href="index.php?comando=vedi_prenotati_per_id&ID=<?= $_SESSION['userID']?>" style="text-decoration: none">Prenotati <?= $tot_biglietti; ?> biglietti</a><br/>
								<?php } else { echo "Nessun biglietto prenotato<br/>";
							}  ?>
							<br/><br/>
							<a href="index.php?comando=logout" style="text-decoration: none">Esci</a><br/> 
			            	
			            <?php
	            	}
	        		else if ($_SESSION['ruolo_utente']=='Utente Registrato'){
	        			?>
			            	<p>Utente Registrato</p>
							<?php 
								$tot_biglietti = $this->modello->recupera_num_prenotazioni_per_idUtente($_SESSION['userID']);
								if(is_null($tot_biglietti))$tot_biglietti = 0;
							?>
							<br/>
							<?php if($tot_biglietti != 0){ ?>
			            		<a href="index.php?comando=vedi_prenotati_per_id&ID=<?= $_SESSION['userID']?>" style="text-decoration: none">Prenotati <?= $tot_biglietti; ?> biglietti</a><br/>
								<?php } else { echo "Nessun biglietto prenotato<br/>";
							}  ?>

							<br/><br/>
							<a href="index.php?comando=logout" style="text-decoration: none">Esci</a><br/> 
	        			<?php
	            	} else {?> <p>tipologia utente non riconosciuta</p>
							<br/><br/> <a href="index.php?comando=logout" style="text-decoration: none">Esci</a><br/> <?php
						}
				}else{	?>
	            	<a href="index.php?comando=login_record" style="text-decoration: none">Accedi o registrati </a><br/>
	            <?php 
	            }
            ?>
        </div>
	</nav>	
</div>