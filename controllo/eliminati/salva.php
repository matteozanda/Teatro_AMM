<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'connect_db.php';


//strip_tags toglie i tag html ed evitiamo gli script
//mysqli_real_escape_string pulisce la query
$nome=mysqli_real_escape_string($connessione, strip_tags($_POST['nome']));
$tipo=mysqli_real_escape_string($connessione, strip_tags($_POST['tipo']));
$numero=mysqli_real_escape_string($connessione, strip_tags($_POST['numero']));
$nomefoto=$_FILES['file']['name'];

//ora creo la query
$query_insert="insert into oggetti(nome, tipo, numero, foto) values('$nome','$tipo','$numero', '$nomefoto')";

$risultato_query=mysqli_query($connessione, $query_insert);
if($risultato_query)
	{echo"dati inseriti con successo";} else {echo"errore di inserimento";}

mysqli_close($connessione);


//-------upload_file.php----------------------------------------------


$uploaddir = '../uploads/';
$uploadfile = $uploaddir . basename($_FILES['file']['name']);

if(!file_exists($uploaddir)) {
    mkdir($uploaddir, 0755, true);
}

echo '<pre>';

if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
  echo "File is valid, and was successfully uploaded.\n";
} else {
   echo "Upload failed.\n";
}

echo 'Alcune informazioni di debug:';
print_r($_FILES);
print "</pre>";

echo "<br>";
  echo "Upload: " . $_FILES["file"]["name"] . "<br>";
  echo "Type: " . $_FILES["file"]["type"] . "<br>";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
  echo "Stored in: " . $_FILES["file"]["tmp_name"];

?>

