<?php

	include_once("modello/DettaglioOrdine.php");
	include_once("modello/Utente.php");
	include_once("modello/Articolo.php");
	include_once("modello/Prenotazione.php");
	include_once("modello/Poltroncina.php");

	include("controllo/connect_db.php");



	class Modello
	{


	public function recupera_utente_connesso()
	{	
		if(isset($_SESSION['userID'])){
			$utente_connesso = $this->recupera_utente_per_id($_SESSION['userID']);
			return $utente_connesso;}
			else {return null;}
	}



	/*
		//tengo qui a disposizione i dati dell'utente attualmente connesso
		if(isset($_SESSION['username'])){
			recupera_utente_per_id($id_utente) 
				
			$utenteCorrente = new Utente();
		} else $utenteCorrente = null;
	*/

//----------------- funzioni relative agli ARTICOLI  -------------------------------

	public function recupera_articoli()
	{
		$catalogo = $this->get_articoli();
		return $catalogo;
	}


	public function recupera_articoli_pubblicati()
	{
		$catalogo = $this->get_articoli_pubblicati();
		return $catalogo;
	}


	public function recupera_articolo_per_id($idCercato)
	{
		$catalogo = $this->get_articoli();
		foreach ($catalogo as $lista) {
			if ($idCercato == $lista->id){$risultato = $lista;}
		}
		return $risultato;
	}

	private function get_articoli()
	{
		include 'controllo/connect_db.php';
		$query_veditutto="SELECT ID, titolo, sottotitolo, testo, prezzo, foto, status, data, posti_disponibili FROM articoli ";
		$risultato_query_veditutto=mysqli_query($connessione, $query_veditutto)
			or die("Errore gravissimo!!!: ".mysqli_error($connessione));
		$catalogo = array();
		$i=0;
		while($row = mysqli_fetch_assoc($risultato_query_veditutto))
		{
			$catalogo[$i] = new Articolo($row['ID'], $row['titolo'], $row['sottotitolo'],$row['testo'],$row['prezzo'],$row['foto'], $row['status'], $row['data'], $row['posti_disponibili']);
			$i++;
		}
		return $catalogo;
	}



	private function get_articoli_pubblicati()
	{
		include 'controllo/connect_db.php';
		$query_veditutto="SELECT ID, titolo, sottotitolo, testo, prezzo, foto, status, data, posti_disponibili FROM articoli ";
		$risultato_query_veditutto=mysqli_query($connessione, $query_veditutto)
			or die("Errore gravissimo!!!: ".mysqli_error($connessione));
		$catalogo = array();
		$i=0;
		while($row = mysqli_fetch_assoc($risultato_query_veditutto))
		{
			$catalogo[$i] = new Articolo($row['ID'], $row['titolo'], $row['sottotitolo'],$row['testo'],$row['prezzo'],$row['foto'], $row['status'], $row['data'], $row['posti_disponibili']);
			$i++;
		}
		return $catalogo;
	}

//----------------- /funzioni relative agli ARTICOLI  -------------------------------




//----------------- funzioni relative agli UTENTI  -------------------------------

public function recupera_utenti()
{
	$catalogo = $this->get_utenti();
	return $catalogo;
}

public function recupera_utente_per_id($id_utente) //può esserci un solo utente con l'ID cercato
{
	$lista_utenti = $this->get_utenti();
	foreach ($lista_utenti as $lista) {
		if ($id_utente == $lista->ID){$risultato = $lista;}
	}
	return $risultato;
}

public function accedi($nome, $password){
	include 'controllo/connect_db.php';

	//ora creo la query: cerco l'utente all'interno della tabella anagrafica. Se è presente, pongo il flag nel campo del login in tabella
	//$query_insert="insert into anagrafica(nome, cognome, password, ruolo) values('$nome','$cognome','$password','$ruolo')";

	$nome=mysqli_real_escape_string($connessione, strip_tags($nome));
	$password=mysqli_real_escape_string($connessione, strip_tags($password));

	$query_accedi="select ID, nome, cognome, ruolo, connected, timestamp from anagrafica where nome = '$nome' AND password = '$password'";

	//echo "Ciao ".$nome." - ".$password."</br></br>";
	$risultato_query_accesso=mysqli_query($connessione, $query_accedi);
	$num_rows = $risultato_query_accesso->num_rows;
	if($num_rows<1){
		echo "Username o Password errati (Modello)";
		return 0;
	}else{
		//global $UtenteConnesso;// da capire se è utile
		if($row = mysqli_fetch_assoc($risultato_query_accesso)){
			$_SESSION['username']= $row['nome'];
			$_SESSION['ruolo_utente']= $row['ruolo'];
			$_SESSION['userID']=  $row['ID'];

			echo "</br>da modello:</br>";
			echo "Bentornato ".$_SESSION['username']." con ID=".$_SESSION['userID'];
			echo "<br/>possiedi i privilegi di ".$_SESSION['ruolo_utente'];

			$this->tu = new Utente($row['ID'], $row['nome'], $row['cognome'],$row['ruolo'],$row['connected'],$row['timestamp'] );

			echo $this->tu->ID.$this->tu->nome.$this->tu->cognome.$this->tu->ruolo.$this->tu->connected.$this->tu->timestamp; 

			//$is_connected = true;
			//setcookie("login_cookie", "OK", time() +60000);
		}
		return 1;
	}
}


private function get_utenti()
{
	include 'controllo/connect_db.php';
	$query_vediutenti="select * from anagrafica";
	$risultato_query_vediutenti=mysqli_query($connessione, $query_vediutenti)
		or die("Errore di connessione all'anagrafica del database!!!<br/>  <br/>".mysqli_error($connessione));
	$lista_utenti = array();
	$i=0;
	while($row = mysqli_fetch_assoc($risultato_query_vediutenti))
	{
		$lista_utenti[$i] = new Utente($row['ID'], $row['nome'], $row['cognome'],$row['ruolo'],$row['connected'],$row['timestamp'] );
		$i++;
	}
	return $lista_utenti;
}

//----------------- /funzioni relative agli UTENTI  -------------------------------


//----------------- funzioni relative alle PRENOTAZIONI  -------------------------------

	public function recupera_num_prenotazioni_per_idUtente($id_utente)
	{
		include 'controllo/connect_db.php';
		$query_num_biglietti="SELECT poltrona FROM poltroncine WHERE utente = $id_utente";
		$num_prenotazioni=mysqli_query($connessione, $query_num_biglietti);
		$n_prenotazioni = mysqli_num_rows($num_prenotazioni);
		return $n_prenotazioni;
		//return $num_prenotazioni;
	}

	public function recupera_num_prenotazioni_per_idArticolo($id_articolo)
	{
		include 'controllo/connect_db.php';
		$query_num_biglietti="SELECT poltrona FROM poltroncine WHERE articolo = $id_articolo";
		$num_prenotazioni=mysqli_query($connessione, $query_num_biglietti);
		$n_prenotazioni = mysqli_num_rows($num_prenotazioni);
		return $n_prenotazioni;
	}

	private function leggi_prenotazioni_utente($id_utente)
	{
		include 'controllo/connect_db.php';
		//$query_vediprenotazioni="select * from anagrafica, articoli, prenota where anagrafica.ID = utente AND articoli.ID = articolo AND utente = '$id_utente'";
		//$query_vediprenotazioni="select * from anagrafica, articoli, poltroncine where anagrafica.ID = utente AND articoli.ID = articolo AND utente = '$id_utente'";
		$query_vediprenotazioni="select utente, nome, cognome, articolo, data, titolo, prezzo, foto, categoria, status, posti_disponibili, count(poltrona) as num_biglietti from anagrafica, articoli, poltroncine where anagrafica.ID = utente AND articoli.ID = articolo AND utente = '$id_utente' GROUP BY articolo";
		$risultato_query_vediprenotazioni=mysqli_query($connessione, $query_vediprenotazioni)
			or die("Errore nello scaricare la lista delle prenotazioni!!!<br/>  <br/>".mysqli_error($connessione));
		$lista_prenotazioni = array();
		$i=0;
		while($row = mysqli_fetch_assoc($risultato_query_vediprenotazioni))
		{
			$lista_prenotazioni[$i] = new Prenotazione($row['utente'], $row['nome'], $row['cognome'],$row['num_biglietti'],
				$row['articolo'], $row['data'], $row['titolo'],$row['prezzo'], $row['foto'], $row['categoria'], $row['status'], $row['posti_disponibili'] );	
			$i++;
		}
		return $lista_prenotazioni;
	}

//	$totPoltroncinePrenotate = $this->modello->recupera_tot_poltroncine_prenotate(){
//		SELECT COUNT(utente) FROM poltroncine WHERE utente ='27'}

	public function recupera_poltroncine_prenotate($id_articolo){
		$poltroncine_prenotate = $this->get_poltroncine_prenotate($id_articolo);
		return $poltroncine_prenotate;
	}

	private function get_poltroncine_prenotate($id_articolo){
		include 'controllo/connect_db.php';
		$query_vediprenotazioni="select * from poltroncine where articolo = '$id_articolo' order by poltrona";
		$risultato_query_vediprenotazioni=mysqli_query($connessione, $query_vediprenotazioni)
			or die("Errore nello scaricare la lista delle prenotazioni!!!<br/>  <br/>".mysqli_error($connessione));
		$lista_poltroncine_prenotate = array();
		$i=0;
		$lista_poltroncine_prenotate[0] = new Poltroncina(0, 0, 0);
		while($row = mysqli_fetch_assoc($risultato_query_vediprenotazioni))
		{
			$lista_poltroncine_prenotate[$i] = new Poltroncina($row['utente'], $row['articolo'], $row['poltrona']);
			$i++;
		}
		return $lista_poltroncine_prenotate;
	}



	public function prenotaPoltroncine($id_articolo, $id_utente, $poltrone){
		$this->setPrenotaPoltroncine($id_articolo, $id_utente, $poltrone);
	}

	private function setPrenotaPoltroncine($id_articolo, $id_utente, $poltrone){
		include 'controllo/connect_db.php';

	/////////	Transazione Database	////////////////////////////////////////  
		mysqli_query($connessione, "BEGIN"); // transaction begins
		$errori=0;

		foreach ($poltrone as $poltroncina) {
			if($poltroncina > 0){
				$query_insert="insert into poltroncine(utente, articolo, poltrona) values('$id_utente','$id_articolo','$poltroncina')"; 
					/*echo "nuova prenotazione";
					} else {$query_insert="UPDATE prenota SET num_biglietti = num_biglietti + $quantita WHERE utente = $id_utente AND articolo = $id_articolo";
							echo "incremento prenotazione precedente";}
					*/
				$risultato_query=mysqli_query($connessione, $query_insert) /*or die("Errore nel creare Prenotazione: ".mysqli_error($connessione))*/;
				
				if($risultato_query){echo"<br/>Memorizzo".$poltroncina;}
					else {
						mysqli_query($connessione, "ROLLBACK");
						echo" -- Errore, annullamento prenotazione --<br/>";
						$errori=1;
					}
			}
		}

		if($errori==0) {mysqli_query($connessione, "COMMIT"); // transaction is committed
		echo "<br/><br/>TRANSAZIONE DATABASE COMPLETATA CON SUCCESSO<br/><br/>";}
		else echo "<br/><br/>TRANSAZIONE DATABASE ANNULLATA<br/><br/>";
	/////////	Transazione Database	////////////////////////////////////////
	}
//----------------- /funzioni relative alle PRENOTAZIONI  -------------------------------



//----------------- /funzioni OBSOLETE relative alle PRENOTAZIONI  -------------------------------
/*	public function recupera_prenotazioni_priorita_articolo()
	{
		$prenotazioni_utente = $this->get_tutte_le_prenotazioni_articolo();
		return $prenotazioni_utente;
	}*/
/*	public function recupera_prenotazioni_per_idArticolo($id_articolo) //inserisce nel vettore $risultato le righe restituite dal DBMS che matchano con l'ID cercato
	{	
		$prenotazioni_utente = $this->leggi_prenotazioni_articolo($id_articolo);
		$risultato = array();
		$i=0;
		foreach ($prenotazioni_utente as $lista){
			if ($id_articolo == $lista->getArticolo()){
				$risultato[$i] = $lista;
				$i++;
			}
		}
		return $risultato;
	}
*/
/*	public function set_prenota_biglietti($quantita, $id_articolo, $id_utente)
	{
		$esito = $this->prenota_biglietti($quantita, $id_articolo, $id_utente);
		return $esito;
	}
*/
/*	public function annulla_prenotazione($id_articolo, $id_utente){
		$esito = $this->elimina_prenotazione($id_articolo, $id_utente);
		return $esito;
	}
*/
/*	private function elimina_prenotazione($id_articolo, $id_utente){
		include 'controllo/connect_db.php';
		//controllo quanti biglietti erano prenotati
		$query_num_biglietti="SELECT num_biglietti as posti_prenotati FROM prenota WHERE utente = $id_utente AND articolo = $id_articolo";
		$result=mysqli_query($connessione, $query_num_biglietti);

			while($row = $result->fetch_assoc()) {
				$num_prenotazioni = $row["posti_prenotati"];
				echo "Riassegno: " . $num_prenotazioni. " posti<br>";
			}

		//elimino prenotazione
		$query_delete_prenotazione="DELETE FROM prenota WHERE utente = '$id_utente' AND articolo = '$id_articolo'"; 
		$risultato_query=mysqli_query($connessione, $query_delete_prenotazione) or die("Errore nel cancellare Prenotazione: ".mysqli_error($connessione));

		//reinserisco i posti nell'evento
		$query_update="UPDATE articoli SET posti_disponibili = posti_disponibili + '$num_prenotazioni'  WHERE ID = '$id_articolo'";
		$risultato_query=mysqli_query($connessione, $query_update) or die("Errore nel ripristinare posti nell'articolo: ".mysqli_error($connessione));
	}
*/	
/*	private function prenota_biglietti($quantita, $id_articolo, $id_utente)
	{

		//	deve collegarsi al database e:
		//		- creare una nuova prenotazione
		//		- decrementare i posti_disponibili nell'articolo interessato
		

		include 'controllo/connect_db.php';

		if($id_utente == '0'){ 
			echo"Utente non registrato";
			return 0;
		}


		//crea nuova voce di prenotazione
		//o aggiungi biglietti a precedente prenotazione per stessa coppia utente-articolo
		//la var_di_controllo ci dice se esistono già biglietti prenotati a nome di un utente
		
		$var_di_controllo = $this->check_prenotazione($id_articolo, $id_utente );
		if($var_di_controllo<0 || is_null($var_di_controllo)) {
			$query_insert="insert into prenota(utente, articolo, num_biglietti) values('$id_utente','$id_articolo','$quantita')"; 
				echo "nuova prenotazione";
				} else {$query_insert="UPDATE prenota SET num_biglietti = num_biglietti + $quantita WHERE utente = $id_utente AND articolo = $id_articolo";
						echo "incremento prenotazione precedente";}

		//	$query_insert="insert into prenota(utente, articolo, num_biglietti) values('$id_utente','$id_articolo','$quantita')"; 

			$risultato_query=mysqli_query($connessione, $query_insert) or die("Errore nel creare Prenotazione: ".mysqli_error($connessione));
			if($risultato_query){echo"<br/><br/>Prenotazione memorizzata";} else {echo"errore di inserimento prenotazione";}
		

		//decrementa i posti nell'articolo
		$query_decrementa_posti="UPDATE articoli SET posti_disponibili = posti_disponibili - $quantita WHERE ID = $id_articolo ";
		$risultato_query_decrementa_posti=mysqli_query($connessione, $query_decrementa_posti)
			or die("Errore nel decrementare posti: ".mysqli_error($connessione));
		
		return 1;
	}
*/
/*	private function check_prenotazione($id_articolo, $id_utente)
	{
		echo "check prenotazione, ";
		include 'controllo/connect_db.php';
		$query_controllo="SELECT num_biglietti FROM prenota WHERE utente = $id_utente AND articolo = $id_articolo";
		$risultato_query=mysqli_query($connessione, $query_controllo) or die("Errore nel decrementare posti: ".mysqli_error($connessione));
		$row = mysqli_fetch_assoc($risultato_query);
		echo " num_biglietti : ".$row['num_biglietti'];
		return $row['num_biglietti'];
	}
*/
/*	private function get_tutte_le_prenotazioni_articolo()  //priorità ad articolo, group by articoli.ID
		{
		include 'controllo/connect_db.php';
		$query_vediprenotazioni="select *, SUM(num_biglietti) AS tot_biglietti, articoli.ID AS articolo_id FROM articoli LEFT JOIN prenota ON articoli.ID = articolo LEFT JOIN anagrafica ON utente = anagrafica.ID group by articoli.ID";
		$risultato_query_vediprenotazioni=mysqli_query($connessione, $query_vediprenotazioni)
			or die("Errore nello scaricare la lista delle prenotazioni!!!<br/>  <br/>".mysqli_error($connessione));
		$lista_prenotazioni = array();
		$i=0;
		while($row = mysqli_fetch_assoc($risultato_query_vediprenotazioni))
		{
			$lista_prenotazioni[$i] = new Prenotazione($row['utente'], $row['nome'], $row['cognome'],$row['tot_biglietti'],//$row['costo_tot']
				$row['articolo_id'], $row['data'], $row['titolo'],$row['prezzo'], $row['foto'], $row['categoria'], $row['status'], $row['posti_disponibili'] );
			$i++;
		}
		return $lista_prenotazioni;
	}
*/
/*	private function leggi_prenotazioni_articolo($id_articolo)
	{
		include 'controllo/connect_db.php';

		$query_vediprenotazioni="select * from anagrafica, articoli, prenota where anagrafica.ID = utente AND articoli.ID = articolo AND articolo = '$id_articolo'";
		$risultato_query_vediprenotazioni=mysqli_query($connessione, $query_vediprenotazioni)
			or die("Errore nello scaricare la lista delle prenotazioni!!!<br/>  <br/>".mysqli_error($connessione));
		$lista_prenotazioni = array();
		$i=0;
		while($row = mysqli_fetch_assoc($risultato_query_vediprenotazioni))
		{
			$lista_prenotazioni[$i] = new Prenotazione($row['utente'], $row['nome'], $row['cognome'],$row['num_biglietti'],
				$row['articolo'], $row['data'], $row['titolo'],$row['prezzo'], $row['foto'], $row['categoria'], $row['status'], $row['posti_disponibili'] );
			$i++;
		}
		return $lista_prenotazioni;
	}
*/
/*	public function recupera_prenotazioni_per_idUtente($id_utente) //inserisce nel vettore $risultato le righe restituite dal DBMS che matchano con l'ID cercato
	{	
		$prenotazioni_utente = $this->leggi_prenotazioni_utente($id_utente);
		$risultato = array();
		$i=0;
		foreach ($prenotazioni_utente as $lista){
			if ($id_utente == $lista->getUserID()){
				$risultato[$i] = $lista;
				$i++;
			}
		}
		return $risultato;
	}
*/

}
?>
