<?php

	include_once 'connect_db.php';

	//mysqli_real_escape_string pulisce la query
	//strip_tags toglie i tag html ed evitiamo gli script


	$id_art=mysqli_real_escape_string($connessione, strip_tags($_POST['id_art']));
	$titolo_art=mysqli_real_escape_string($connessione, strip_tags($_POST['titolo_art']));
	$sottotitolo_art=mysqli_real_escape_string($connessione, strip_tags($_POST['sottotitolo_art']));
	$testo_art=mysqli_real_escape_string($connessione, strip_tags($_POST['testo_art']));
	$prezzo_art=mysqli_real_escape_string($connessione, strip_tags($_POST['prezzo_art']));
	$foto_art=mysqli_real_escape_string($connessione, $_FILES['foto_art']['name']);
	$posti_disponibili=mysqli_real_escape_string($connessione, strip_tags($_POST['posti_disponibili']));
	$status_art=($_POST['status_art']);




/*	if($foto_art!=""){ //query con aggiornamento della foto
		$query_update="UPDATE articoli SET titolo = '$titolo_art', sottotitolo = '$sottotitolo_art', 
			testo = '$testo_art', prezzo = '$prezzo_art', posti_disponibili = '$posti_disponibili', status = '$status_art' WHERE ID = $id_art";
	} else{ //query senza aggiornamento della foto
		$query_update="UPDATE articoli SET titolo = '$titolo_art', sottotitolo = '$sottotitolo_art', 
			testo = '$testo_art', prezzo = '$prezzo_art', posti_disponibili = '$posti_disponibili', status = '$status_art', foto = '$foto_art' WHERE ID = $id_art";
	}
*/
	//ora creo la query
	$query_update="UPDATE articoli SET titolo = '$titolo_art', sottotitolo = '$sottotitolo_art',
	 	testo = '$testo_art', prezzo = '$prezzo_art', posti_disponibili = '$posti_disponibili', status = '$status_art' WHERE ID = $id_art"; 
	//ora creo la query per la foto
	if($foto_art!="") {$query_update="UPDATE articoli SET  foto = '$foto_art' WHERE ID = $id_art";}

	echo "</br></br></br>";

	//$query_insert="insert into articoli(titolo, sottotitolo, testo, prezzo, foto) values('$titolo_art','$sottotitolo_art','$testo_art','$prezzo_art' ,'$foto_art')"; 
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

	header('Refresh: 2; URL = ../index.php?comando=gestisci_articoli')
?>
