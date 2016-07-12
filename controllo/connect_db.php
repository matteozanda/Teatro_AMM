<?php
 /*   $db_host="localhost";
    $db_user="storedb";
    $db_password="storedb1";
    $db_database="storedb";

    // Istanziare la classe mysqli
    $mysqli = new mysqli();

    // prima connessione con localhost
    $connessione = mysqli_connect($db_host, $user, $db_password);
    // Check connessione, se fallisce è problema di user e pw
    if (!$connessione) {
        echo "L'utente non esiste";
        //echo ("Connessione fallita, problema di autenticazione user: " . mysqli_connect_error());
        //This will create the user if it doesn't exist:
        //grant all on `database`.* to 'user'@'localhost' identified by 'db_password';
        // Crea nuovo utente
        $sql = "CREATE USER 'storedb@localhost' IDENTIFIED BY 'storedb1'";
        if (mysqli_query($connessione, $sql)) {
            echo "Utente creato";
        } else {
            echo "Errore nel creare l'utente: " . mysqli_error($connessione);
        }

    }

    $connessione=mysqli_connect($db_host, $db_user, $db_password, $db_database);
*/
    $db_host="localhost";
    $db_user="zandaMatteo";
    $db_password="pterodattilo697";
    $db_database="amm14_zandaMatteo";

    $connessione = mysqli_connect($db_host, $db_user, $db_password);

    if (!$connessione) {
        echo "L'utente non esiste";
        $sql = "CREATE USER 'storedb@localhost' IDENTIFIED BY 'storedb1'";
        if (mysqli_query($connessione, $sql)) {
            echo "Utente creato";
        } else {
            echo "Errore nel creare l'utente: " . mysqli_error($connessione);
        }

    }

    $connessione=mysqli_connect($db_host, $db_user, $db_password, $db_database);
/*

    $db_host="localhost";
    $db_user="storedb";
    $db_password="storedb1";
    $db_database="storedb";

    $connessione = mysqli_connect($db_host, $db_user, $db_password);

    if (!$connessione) {
        echo "L'utente non esiste";
        $sql = "CREATE USER 'storedb@localhost' IDENTIFIED BY 'storedb1'";
        if (mysqli_query($connessione, $sql)) {
            echo "Utente creato";
        } else {
            echo "Errore nel creare l'utente: " . mysqli_error($connessione);
        }

    }

    $connessione=mysqli_connect($db_host, $db_user, $db_password, $db_database);

*/
/*

    //----------------------------- DA RICONTROLLARE ED ELIMINARE SE NON FUNZIONA BENE -----------------------------
    // seconda connessione con localhost per verificare esistenza db e connessione
    if (!$connessione) {
    //se fallisce la connessione vuol dire che non esiste il database
        echo "<br/>";
        echo "Utente riconosciuto ma DB non trovato, lo creo di nuovo." . PHP_EOL . mysqli_connect_errno() . PHP_EOL . mysqli_connect_error() . PHP_EOL;
        echo "<br/>";
        
        // Crea database
        $sql = "CREATE DATABASE storedb";
        if (mysqli_query($connessione, $sql)) {
            echo "Database creato";
        } else {
            echo "Errore nel creare il database: " . mysqli_error($connessione);
        }

        // Crea tabelle
        $sql = "CREATE TABLE anagrafica (
            ID INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(30) NOT NULL,
            cognome VARCHAR(30) NOT NULL,
            db_password VARCHAR(30),
            ruolo VARCHAR(30),
            connected BOOLEAN
        )";

        if (mysqli_query($connessione, $sql)) {
            echo "Table MyGuests created successfully";
        } else {
            echo "Error creating table: " . mysqli_error($connessione );
        }
    exit;
    }
*/?>



