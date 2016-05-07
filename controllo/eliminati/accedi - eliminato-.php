<?php
    session_start();
    /*
        accesso
     */
    include_once 'connect_db.php';
    //mysqli_real_escape_string pulisce la query
    //strip_tags toglie i tag html ed evitiamo gli script
    $nome=mysqli_real_escape_string($connessione, strip_tags($_POST['nome']));
    $password=mysqli_real_escape_string($connessione, strip_tags($_POST['password']));
    echo "</br>";
    //ora creo la query: cerco l'utente all'interno della tabella anagrafica. Se è presente, pongo il flag nel campo del login in tabella
    //$query_insert="insert into anagrafica(nome, cognome, password, ruolo) values('$nome','$cognome','$password','$ruolo')";

    $query_accedi="select ID, nome, cognome, ruolo from anagrafica where nome = '$nome' AND password = '$password'";
    $risultato_accesso=mysqli_query($connessione, $query_accedi);
    $num_rows = $risultato_accesso->num_rows;
    if($num_rows<1){
        echo "Username o Password errati";
    }else{
        global $UtenteConnesso;
        if($UtenteConnesso = mysqli_fetch_assoc($risultato_accesso)){
            $_SESSION['username']= $UtenteConnesso['nome'];
            $_SESSION['ruolo_utente']= $UtenteConnesso['ruolo'];
            $_SESSION['ID']=  $UtenteConnesso['ID'];

            echo "Bentornato ".$_SESSION['username'];
            echo "<br/>possiedi i privilegi di ".$_SESSION['ruolo_utente'];

            //$is_connected = true;
            //setcookie("login_cookie", "OK", time() +60000);
        }
    }

    header('Refresh: 2; URL = ../index.php?comando=catalogo');

    mysqli_close($connessione);
    unset($connessione);
?>

      
<!--  //*******************esempi di mysqli_fetch_xxxxx************************************
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
-->