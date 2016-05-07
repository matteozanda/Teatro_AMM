<?php

/*
registrazione di un nuovo utente
 */

include_once 'connect_db.php';


//mysqli_real_escape_string pulisce la query
//strip_tags toglie i tag html ed evitiamo gli script
$nome=mysqli_real_escape_string($connessione, strip_tags($_POST['nome']));
$cognome=mysqli_real_escape_string($connessione, strip_tags($_POST['cognome']));
$password=mysqli_real_escape_string($connessione, strip_tags($_POST['password']));


echo "$nome " . " " . " $cognome ";
echo "</br></br></br>";

//ora creo la query
$query_insert="insert into anagrafica(nome, cognome, password, ruolo) values('$nome','$cognome','$password', 'Utente_Registrato')";

$risultato_query=mysqli_query($connessione, $query_insert);
if($risultato_query)
	{echo"dati memorizzati con successo nel database";} else {echo"errore di inserimento nel db";}

mysqli_close($connessione);
unset($connessione);

   header('Refresh: 2; URL = ../index.php');

?>

