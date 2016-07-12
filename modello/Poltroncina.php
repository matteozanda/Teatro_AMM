<?php

class Poltroncina{
 private $utente; //userID
 private $articolo;
 private $num_poltroncina;
 

	public function __construct ($utente, $articolo, $num_poltroncina)
	{	$this->utente = $utente;
		$this->articolo = $articolo;
		$this->num_poltroncina = $num_poltroncina;
	}

	public function getUtente(){
		return $this->utente;
	}
	public function getArticolo(){
		return $this->articolo;
	}
	public function getNum_poltroncina(){
		return $this->num_poltroncina;
	}
}