<?php 


//controllo connessione utente
	include_once 'connect_db.php';
/*	$is_connected;
	if (!$is_connected) {setcookie("login_cookie", "NO", time() +60000);}
*/


//session_start();



include_once("modello/Modello.php");

class GenericController{
	public $modello;

	public function __construct()
	{
		$this->modello = new Modello();
	}

	public function invoke()
	{
		//leggo il comando passato per url, per default la pagina iniziale
		$comando=isset($_REQUEST["comando"])? $_REQUEST["comando"] : "catalogo";
		$id_cercato=isset($_REQUEST["ID"])? $_REQUEST["ID"] : "0";


//***************** TOP MENU ****************		
		if($comando == "homepage")
		{
			//passo il controllo alla vista "homepage.php"
			include("vista/homepage.php");
		}
		elseif($comando == "chi_siamo")
		{
			include("vista/chi_siamo.php");
		}
		elseif($comando == "contatti")
		{
			include("vista/contatti.php");
		}
		elseif($comando == "news")
		{
			include("vista/news.php");
		}
		elseif($comando == "poltroncine")
		{
			include("vista/poltroncine.php");
		}
//***************** //TOP MENU ****************	

		elseif ($comando == "accedi") {

		    $nome = $_POST['nome'];
		    $password = $_POST['password'];

		    $esito_accesso = $this->modello->accedi($nome, $password);

		    //echo "Ciao ".$nome." - ".$password."</br></br>";
		    
		    if($esito_accesso){echo "<br>Accesso eseguito<br>";} else {echo "<br>Username o password non corretti (GenericController) <br>";}
		    header('Refresh: 1; URL = index.php?comando=catalogo');

/*			echo "</br></br>";
            echo "Bentornato ".$_SESSION['username']." con ID=".$_SESSION['userID'];
            echo "<br/>possiedi i privilegi di ".$_SESSION['ruolo_utente'];
*//*
		    mysqli_close($connessione);
		    unset($connessione);
*/		}

//***************** ADMIN ACTIONS ****************
// riconosco che articolo modificare tramite il $nome = $_REQUEST["id"];
		elseif($comando == "nuovo_articolo")
		{
			include("vista/amministratore/nuovo_articolo.php");
		}
		elseif($comando == "Elimina")
		{
			$nome = $_REQUEST["id"];
			include("vista/dettaglioarticolo.php");
		}
		elseif($comando == "Elimina_da_db")
		{
			$nome = $_REQUEST["id"];
			include("vista/dettaglioarticolo.php");
		}
		elseif ($comando == "gestisci_articoli") {
			$catalogo=$this->modello->recupera_articoli();
			include("vista/amministratore/gestisci_articoli.php");
		}
		elseif ($comando == "modifica_articolo") {
			$articolo = $this->modello->recupera_articolo_per_id($id_cercato);
			$messaggio = "";
			include("vista/amministratore/modifica_articolo.php");
		}
		elseif ($comando == "newarticle")
		{
					/*
					creazione di un nuovo articolo

					---------------

						STRUTTURA TABELLA articoli
						1	ID	int(11)
						2	data	timestamp
						3	titolo	varchar(50)
						4	sottotitolo	varchar(100)
						5	testo	varchar(5000)
						6	prezzo	int(11)
						7	foto	varchar(50)
						8	categoria	varchar(30)
					*/


					include 'connect_db.php';

					//mysqli_real_escape_string pulisce la query
					//strip_tags toglie i tag html ed evitiamo gli script
					$titolo_art=mysqli_real_escape_string($connessione, strip_tags($_POST['titolo_art']));
					$sottotitolo_art=mysqli_real_escape_string($connessione, strip_tags($_POST['sottotitolo_art']));
					$testo_art=mysqli_real_escape_string($connessione, strip_tags($_POST['testo_art']));
					$prezzo_art=mysqli_real_escape_string($connessione, strip_tags($_POST['prezzo_art']));
					$foto_art=mysqli_real_escape_string($connessione, $_FILES['foto_art']['name']);
					$posti_disponibili=mysqli_real_escape_string($connessione, strip_tags($_POST['posti_disponibili']));



					//ora creo la query
					$query_insert="insert into articoli(titolo, sottotitolo, testo, prezzo, foto, posti_disponibili) values('$titolo_art','$sottotitolo_art','$testo_art','$prezzo_art','$foto_art','$posti_disponibili')"; 
					$risultato_query=mysqli_query($connessione, $query_insert);
					if($risultato_query)
						{echo"dati memorizzati con successo nel database";} else {echo"errore di inserimento nel db";}



					echo "<h2>Riepilogo: </h2>";
						
						$query = mysqli_query ($connessione, "SELECT id from articoli order by id DESC limit 1" ) ;
						$record = mysqli_fetch_array( $query ) ;
						$ultimoid = $record['id'];

						$query_risultato="select titolo, sottotitolo, testo, prezzo, foto, posti_disponibili from articoli where ID=$ultimoid ";
						$risultato_query_risultato=mysqli_query($connessione, $query_risultato)
						or die("Error: ".mysqli_error($connessione));
						$row = mysqli_fetch_array($risultato_query_risultato,MYSQLI_NUM);
						echo "articolo num: ". $ultimoid;
						echo "</br>Titolo: " . $row[0]. "</br>Sottotitolo: " . $row[1] . "</br> Testo: " . $row[2]. "</br>Prezzo: " . $row[3]. "<br/>Posti disponibili: " . $row[5]. "<br/>Immagine: " . $row[4];  ?>
						</br><img src="../uploads/images/<?php echo $row[4]; ?>" alt="testo" width="60px">
						<?php 
						echo "</br></br></br>";
					/*
						echo "</br>Titolo: " . $row[1]. "</br>Sottotitolo: " . $row[2] . "</br> Testo: " . $row[3]. "</br>Prezzo: " . $row[4];  ?>
						</br><img src="../uploads/images/<?php echo $row[5]; ?>" alt="testo" width="60px">
					*/

					//-------upload_file.php----------------------------------------------


					$uploaddir = '../uploads/images/';
					$uploadfile = $uploaddir . basename($_FILES['foto_art']['name']);

					if(!file_exists($uploaddir)) {
					    mkdir($uploaddir, 0755, true);
					}

					echo '<pre>';
						if (move_uploaded_file($_FILES['foto_art']['tmp_name'], $uploadfile)) {
						  echo "File is valid, and was successfully uploaded.\n";
						} else {
						   echo "Upload failed.\n";
						}
						/*
						echo 'Alcune informazioni di debug:';
						print_r($_FILES);
						*/
					print "</pre>";

					echo "<br>";
					  echo "Upload: " . $_FILES["foto_art"]["name"] . "<br>";
					  echo "Type: " . $_FILES["foto_art"]["type"] . "<br>";
					  echo "Size: " . ($_FILES["foto_art"]["size"] / 1024) . " kB<br>";
					  echo "Stored in: " . $uploaddir . $_FILES["foto_art"]["name"];



					mysqli_close($connessione);
					unset($connessione);


					header('Refresh: 1; URL = index.php?comando=catalogo');
		}
		
//***************** //ADMIN ACTIONS ****************	


//***************** USER ACTIONS ****************	
		elseif($comando == "login_record")
		{
			include("vista/login_record.php");
		}
		elseif($comando == "catalogo")
		{
			//$catalogo=$this->modello->recupera_articoli();
			$catalogo=$this->modello->recupera_articoli_pubblicati();
			include("vista/catalogoarticoli.php");
		}
		elseif($comando == "dettaglioarticolo")
		{
			$articolo = $this->modello->recupera_articolo_per_id($id_cercato);
			$messaggio = "";
			include("vista/dettaglioarticolo.php");
		}


		elseif($comando == "vedi_prenotati_per_id" ){

			$prenotazioni = $this->modello->recupera_prenotazioni_per_idUtente($id_cercato);
			//$prenotazioni = $this->modello->recupera_prenotazioni_per_idUtente($_SESSION['userID']);
			include("vista/amministratore/riepilogo_prenotazioni_utente.php");
		}

		elseif($comando == "riepilogo_prenotazioni_per_id" ){
			$prenotazioni = $this->modello->recupera_prenotazioni_per_idUtente($id_cercato);
			include("vista/amministratore/riepilogo_prenotazioni_utente.php");
		}


		elseif($comando == "resoconto_prenotazioni" ){
			$prenotazioni = $this->modello->recupera_prenotazioni_priorita_articolo();
			include("vista/amministratore/resoconto_prenotazioni.php");
		}

		elseif($comando == "dettaglio_prenotazioni_articolo"){
			$prenotazioni = $this->modello->recupera_prenotazioni_per_idArticolo($id_cercato);
			include("vista/amministratore/riepilogo_prenotazioni_articolo.php");
		}

/********************************DELETE ARTICLE**************/


/**************** /DELETE ARTICLE**********/


		elseif($comando == "Prenota"){
			$quantita=isset($_REQUEST["quantita"])? $_REQUEST["quantita"] : "0";


			$posti_disponibili=isset($_REQUEST["posti_disponibili"])? $_REQUEST["posti_disponibili"] : "0";
			if(isset($_REQUEST["ID"])){$id_articolo = $_REQUEST["ID"];} else{ $id_articolo = "0";};
			if(isset($_SESSION['userID'])){$id_utente= $_SESSION['userID'];} else{ $id_utente = "0";};

			if($quantita > 0){
				if($quantita <= $posti_disponibili){
					$risultato = $this->modello->set_prenota_biglietti($quantita, $id_articolo, $id_utente);
					if($risultato){
						echo "Prenotati ".$quantita." biglietti dello spettacolo con id= ".$id_articolo."<br/>a nome di ".$id_utente;
						echo "<br/><br/><br/><br/>";
					} else {echo"Prenotazione fallita";}
				} else { echo "Spiacenti, sono disponibili solo ".$posti_disponibili." posti.";}
			 }else { echo "Selezionare almeno un biglietto";}
			


			echo "<br/><br/><br/><br/>";
			header('Refresh: 1; URL = index.php?comando=catalogo');
		}
		elseif($comando == "annulla_prenotazione"){
			if(isset($_REQUEST["id_articolo"])){$id_articolo = $_REQUEST["id_articolo"];} else{ $id_articolo = "0";};
			if(isset($_REQUEST["id_utente"])){$id_utente = $_REQUEST["id_utente"];} else{ $id_utente = "0";};

			$risultato = $this->modello->annulla_prenotazione($id_articolo, $id_utente);
			header('Refresh: 1; URL = index.php?comando=resoconto_prenotazioni');
		}

//***************** //USER ACTIONS ****************	

//***************** //GENERIC ACTIONS ****************			



		elseif ($comando == "logout") {
			//setcookie("login");
			//print "Arrivederci!";	
/*
			unset($_SESSION["username"]);
			unset($_SESSION["ruolo_utente"]);
			unset($_SESSION["num_prenotati"]);
*/

    		session_unset();

			echo 'Logout eseguito';
			header('Refresh: 1; URL = index.php');
		}











/*---------------------------------------- GESTIONE FORM E DB -----------------------------------------*/
		elseif ($comando == "newuser") {
			/*registrazione di un nuovo utente */

			include 'connect_db.php';

			//mysqli_real_escape_string pulisce la query
			//strip_tags toglie i tag html ed evitiamo gli script
			$nome=mysqli_real_escape_string($connessione, strip_tags($_POST['nome']));
			$cognome=mysqli_real_escape_string($connessione, strip_tags($_POST['cognome']));
			$password=mysqli_real_escape_string($connessione, strip_tags($_POST['password']));


			echo "$nome " . " " . " $cognome ";
			echo "</br></br></br>";

			//ora creo la query
			$query_insert="insert into anagrafica(nome, cognome, password, ruolo) values('$nome','$cognome','$password', 'Utente Registrato')";

			$risultato_query=mysqli_query($connessione, $query_insert);
			if($risultato_query)
				{echo"dati memorizzati con successo nel database";} else {echo"errore di inserimento nel db";}

			mysqli_close($connessione);
			unset($connessione);

		   header('Refresh: 1; URL = index.php?comando=catalogo');
		}




		elseif($comando == "edit_article"){
				include 'connect_db.php';

				$id_art=mysqli_real_escape_string($connessione, strip_tags($_POST['id_art']));
				$titolo_art=mysqli_real_escape_string($connessione, strip_tags($_POST['titolo_art']));
				$sottotitolo_art=mysqli_real_escape_string($connessione, strip_tags($_POST['sottotitolo_art']));
				$testo_art=mysqli_real_escape_string($connessione, strip_tags($_POST['testo_art']));
				$prezzo_art=mysqli_real_escape_string($connessione, strip_tags($_POST['prezzo_art']));
				$foto_art=mysqli_real_escape_string($connessione, $_FILES['foto_art']['name']);
				$posti_disponibili=mysqli_real_escape_string($connessione, strip_tags($_POST['posti_disponibili']));
				$status_art=($_POST['status_art']);


				//ora creo la query
				$query_update="UPDATE articoli SET titolo = '$titolo_art', sottotitolo = '$sottotitolo_art',
				 	testo = '$testo_art', prezzo = '$prezzo_art', posti_disponibili = '$posti_disponibili', status = '$status_art' WHERE ID = $id_art"; 
				//ora creo la query per la foto
				if($foto_art!="") {$query_update="UPDATE articoli SET  foto = '$foto_art' WHERE ID = $id_art";}
			
				echo "</br></br></br>";

				$risultato_query=mysqli_query($connessione, $query_update);
				if($risultato_query)
					{echo"dati memorizzati con successo nel database";} else {echo ("errore di inserimento nel database" . mysql_error());}


				echo "<h2>Riepilogo: </h2>";
					$query_risultato="select ID, titolo, sottotitolo, testo, prezzo, foto, status from articoli where ID=$id_art ";
					$risultato_query_risultato=mysqli_query($connessione, $query_risultato)
					or die("Error: ".mysqli_error($connessione));
					$row = mysqli_fetch_array($risultato_query_risultato,MYSQLI_NUM);
					echo "ID articolo: ". $id_art;
					echo "</br>Titolo: " . $row[1]. "</br>Sottotitolo: " . $row[2] . "</br> Testo: " . $row[3]. "</br>Prezzo: " . $row[4]. "</br>Status: " . $row[6];  ?>
					</br><img src="../uploads/images/<?php echo $row[5]; ?>" alt="testo" width="60px">
					<?php 
					echo "</br></br></br>";


				//-------upload_file.php----------------------------------------------
				$uploaddir = '../uploads/images/';
				$uploadfile = $uploaddir . basename($_FILES['foto_art']['name']);

				if(!file_exists($uploaddir)) {
				    mkdir($uploaddir, 0755, true);
				}
				if($foto_art!="")
					{
						echo '<pre>';
							if (move_uploaded_file($_FILES['foto_art']['tmp_name'], $uploadfile)) {
							  echo "File is valid, and was successfully uploaded.\n";
							} else {
							   echo "Upload failed.\n";
							}
							/*
							echo 'Alcune informazioni di debug:';
							print_r($_FILES);
							*/
						print "</pre>";


				echo "<br>";
				  echo "Upload: " . $_FILES["foto_art"]["name"] . "<br>";
				  echo "Type: " . $_FILES["foto_art"]["type"] . "<br>";
				  echo "Size: " . ($_FILES["foto_art"]["size"] / 1024) . " kB<br>";
				  echo "Stored in: " . $uploaddir . $_FILES["foto_art"]["name"];
					} else {echo "immagine non cambiata";}


				mysqli_close($connessione);
				unset($connessione);

				header('Refresh: 1; URL = index.php?comando=gestisci_articoli');
		}

		elseif($comando == "deleteArticle"){
			echo "Eliminazione articolo dal database";

				include 'connect_db.php';


				//ora creo la query
				$query_delete="DELETE FROM `articoli` WHERE ID = '$id_cercato'"; 
			
				echo "</br></br></br>";

				$risultato_query=mysqli_query($connessione, $query_delete);
				if($risultato_query)
					{echo"eliminato dal database articolo id ";} else {echo ("errore di eliminazione dal database dell'articolo id ".mysql_error());}


				echo "</br></br></br>"+$id_cercato+"</br></br></br>";


				mysqli_close($connessione);
				unset($connessione);

				header('Refresh: 1; URL = index.php?comando=gestisci_articoli');
		}


		elseif ($comando == "gestisci_utenti")
		{
			$catalogo=$this->modello->recupera_utenti();
			include("vista/amministratore/gestisci_utenti.php");
		}
		elseif ($comando == "modifica_utente") {
			$utente = $this->modello->recupera_utente_per_id($id_cercato);
			include("vista/amministratore/modifica_utente.php");
		}
		elseif($comando == "edit_user"){

			include 'connect_db.php';

			$id_utente=mysqli_real_escape_string($connessione, strip_tags($_POST['id_utente']));
			$nome_utente=mysqli_real_escape_string($connessione, strip_tags($_POST['nome_utente']));
			$cognome_utente=mysqli_real_escape_string($connessione, strip_tags($_POST['cognome_utente']));
			$ruolo_utente=mysqli_real_escape_string($connessione, strip_tags($_POST['ruolo_utente']));

			//ora creo la query
			$query_update="UPDATE `anagrafica`
					SET 
						nome = '$nome_utente',
						cognome = '$cognome_utente',
						ruolo = '$ruolo_utente'
					WHERE ID = $id_utente"; 


			echo "</br></br></br>";

			$risultato_query=mysqli_query($connessione, $query_update);
			if($risultato_query)
				{echo"dati memorizzati con successo nel database";} else {echo ("errore di inserimento nel database" . mysql_error());}


			echo "<h2>Riepilogo: </h2>";
				$query_risultato="select ID, nome, cognome, ruolo from anagrafica where ID=$id_utente ";
				$risultato_query_risultato=mysqli_query($connessione, $query_risultato)
				or die("Error: ".mysqli_error($connessione));

				$row = mysqli_fetch_array($risultato_query_risultato,MYSQLI_NUM);
				echo "ID utente: ". $id_utente;
				echo "</br>Nome: " . $row[1]. "</br>Cognome: " . $row[2] . "</br> Ruolo: " . $row[3];  ?>
				<?php 
				echo "</br></br></br>";

			mysqli_close($connessione);
			unset($connessione);

			header('Refresh: 1; URL = index.php?comando=gestisci_utenti')
			?>


			<br/><br/><br/>
			<?php



		}

		elseif($comando == "deleteUser"){
			echo "Eliminazione utente dal database";

				include 'connect_db.php';


				//ora creo la query
				$query_delete="DELETE FROM `anagrafica` WHERE ID = '$id_cercato'"; 
			
				echo "</br></br></br>";

				$risultato_query=mysqli_query($connessione, $query_delete);
				if($risultato_query)
					{echo"eliminato dal database utente id ";} else {echo ("errore di eliminazione dal database dell' utente id ".mysql_error());}


				echo "</br></br></br>"+$id_cercato+"</br></br></br>";


				mysqli_close($connessione);
				unset($connessione);

				header('Refresh: 5; URL = index.php?comando=gestisci_utenti');
		}


	}
}






			    
			 /*   //*******************esempi di mysqli_fetch_xxxxx************************************
			    // riporto il cursore della riga corrente a 0
			mysqli_data_seek($risultato_query_accedi,0);
			echo "<br/>";
			// eseguo la fetch dei risultati
			    while ($riga = mysqli_fetch_assoc($risultato_query_accedi))
			    {
				echo "<br/>";
			        printf ("ID utente:%d, nome:%s, cognome:%s, tipo:%s\n",
				$riga['ID'], $riga['nome'],$riga['cognome'],$riga['ruolo']);
			    }
			echo "<br/>";


			// riporto il cursore della riga corrente a 0
			mysqli_data_seek($risultato_query_accedi,0);

			// eseguo la fetch dei risultati
			while ($riga = mysqli_fetch_array($risultato_query_accedi))
			{
				echo "<br/>";
			        printf ("ID utente:%d, nome:%s, cognome:%s\n",
				$riga[0], $riga['nome'],$riga[2]);
			}
			echo "<br/>";


			// riporto il cursore della riga corrente a 0
			mysqli_data_seek($risultato_query_accedi,0);

			// eseguo la fetch dei risultati
			while ($riga = mysqli_fetch_object($risultato_query_accedi))
			{
				echo "<br/>";
			        printf ("ID utente:%d, nome:%s, cognome:%s\n",
				$riga->ID, $riga->nome, $riga->cognome);
			}

			// chiudo il set dei risultati per liberare memoria
			mysqli_free_result($risultato_query_accedi);
			    //*****************************************************************
			 */
			    

?>