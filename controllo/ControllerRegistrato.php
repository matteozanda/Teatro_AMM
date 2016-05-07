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
//***************** //TOP MENU ****************	


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
			$nome = $_REQUEST["nome"];
			$articolo = $this->modello->recupera_articolo_per_nome($nome);
			$messaggio = "";
			include("vista/amministratore/modifica_articolo.php");
		}
		elseif ($comando == "editarticle")
		{
			include("editarticle.php");
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
			$nome = $_REQUEST["nome"];
			$articolo = $this->modello->recupera_articolo_per_nome($nome);
			$messaggio = "";
			include("vista/dettaglioarticolo.php");
		}
		elseif($comando == "metti_carrello")
		{
			$nome=$_REQUEST["nome"];
			$quantita=$_REQUEST["quantita"];
			if($quantita!="")
			{
				$prezzo=$_REQUEST["prezzo"];
				// si crea un nuovo carrello perchè per ora
				// non si gestiscono le "sessioni di lavoro"
				$carrello=new Carrello();
				$carrello->aggiungi( new DettaglioOrdine($nome, $quantita, $prezzo));
				$elenco = $carrello->elenco;
				$totale = $carrello->calcola_totale();
				include("vista/carrelloarticoli.php");
			}
			else
			{
				$nome = $_REQUEST["nome"];
				$articolo = $this->modello->recupera_articolo_per_nome($nome);
				$messaggio = "errore, specificare la quantit&agrave;";
				include("vista/dettaglioarticolo.php");
			}
		}

//***************** //USER ACTIONS ****************	

//***************** //GENERIC ACTIONS ****************			
		elseif ($comando == "logout") {
			//setcookie("login");
			//print "Arrivederci!";	

			unset($_SESSION["username"]);
			unset($_SESSION["ruolo_utente"]);
		
			echo 'Logout eseguito';
			header('Refresh: 2; URL = index.php');
		}

	}


    /**
     * Procedura di autenticazione 
     * @param ViewDescriptor $vd descrittore della vista
     * @param string $username lo username specificato
     * @param string $password la password specificata
     */
    protected function login($vd, $username, $password) {
        // carichiamo i dati dell'utente

        $user = UserFactory::instance()->caricaUtente($username, $password);
        if (isset($user) && $user->esiste()) {
            // utente autenticato
            $_SESSION[self::user] = $user->getId();
            $_SESSION[self::role] = $user->getRuolo();
            $this->showHomeUtente($vd);
        } else {
            $vd->setMessaggioErrore("Utente sconosciuto o password errata");
            $this->showLoginPage($vd);
        }
    }

	
}

?>