<?php

include_once 'connect_db.php';

$del=strip_tags($_POST['del']); //prendo dal post la variabile numero da cancellare
//leggo da tabella oggetti i valori da cancellare e metto in una variabile
$query_vediuno="select ID, nome, tipo, numero, foto from oggetti where ID=$del";
$risultato_query_vediuno=mysqli_query($connessione, $query_vediuno);
$riga = mysqli_fetch_row($risultato_query_vediuno);

//scrivo variabile in tabella cancellati
$id=$riga[0];
$nome=$riga[1];
$tipo=$riga[2];
$numero=$riga[3];
$foto=$riga[4];
$query_insert="insert into cancellati(nome, tipo, numero, foto) values('$nome','$tipo','$numero','$foto')";

$risultato_query=mysqli_query($connessione, $query_insert);
if($risultato_query)
	{echo"dati inseriti con successo in tabella cancellati</br>";} else {echo"errore di inserimento</br>";}

//poi cancello voce in tabella oggetti

//strip_tags toglie i tag html ed evitiamo gli script
//mysqli_real_escape_string pulisce la query

$delete=mysqli_real_escape_string($connessione, strip_tags($_POST['del']));

//ora creo la query
$query_delete="delete from oggetti where ID=$del";

$risultato_query=mysqli_query($connessione, $query_delete);
if($risultato_query)
	{echo"dati inseriti con successo in tabella Oggetti";} else {echo"errore di cancellazione da tabella Oggetti";}

mysqli_close($connessione);

unset($connessione);
?>