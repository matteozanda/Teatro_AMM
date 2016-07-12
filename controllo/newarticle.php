<?php
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


include_once 'connect_db.php';

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


header('Refresh: 20; URL = ../index.php?comando=catalogo')
?>

<br/><br/><br/>
