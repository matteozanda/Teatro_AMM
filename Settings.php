<?php

/**
 * Classe che contiene una lista di variabili di configurazione
 *
 * @author Davide Spano
 */
class Settings {


    // variabili di accesso per il database
    public static $db_host="localhost";
    public static $db_user="storedb";
    public static $db_password="storedb1";
    public static $db_database="storedb";

    private static $appPath;

    /**
     * Restituisce il path relativo nel server corrente dell'applicazione
     * Lo uso perche' la mia configurazione locale e' ovviamente diversa da quella 
     * pubblica. Gestisco il problema una volta per tutte in questo script
     */
    public static function getApplicationPath() {
        if (!isset(self::$appPath)) {
            // restituisce il server corrente
            switch ($_SERVER['HTTP_HOST']) {
                case 'localhost':
                    // configurazione locale
                    self::$appPath = 'http://' . $_SERVER['HTTP_HOST'] . '/Teatro_AMM/';
                    break;
                /*case 'spano.sc.unica.it':
                    // configurazione pubblica
                    self::$appPath = 'http://' . $_SERVER['HTTP_HOST'] . '/amm2014/davide/esami14/';
                    break;
                */
                default:
                    self::$appPath = '';
                    break;
            }
        }
        
        return self::$appPath;
    }

}

?>









Prenotati 3 biglietti dello spettacolo con id= 20
a nome di user1 


in ingresso al Model: 3 20 user1 


errore di inserimento prenotazione





Prenotati 4 biglietti dello spettacolo con id= 20
a nome di 0
 in ingresso al Model: 4 20

 Utente non registrato0