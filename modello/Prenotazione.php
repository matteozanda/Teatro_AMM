<?php

class Prenotazione{
 private $userID; //userID
 private $nome;
 private $cognome;
 private $num_biglietti;
 private $articoloID; //articolo_id
 private $data;
 private $titolo;
 private $prezzo;
 private $foto;
 private $categoria;
 private $status;
 private $posti_disponibili;
 private $costo_tot; // prezzo*num_biglietti

	public function __construct ($userID, $nome, $cognome, $num_biglietti, $articolo_id, $data, $titolo, $prezzo, $foto, $categoria, $status, $posti_disponibili)
	{	$this->userID = $userID;
		$this->nome = $nome;
		$this->cognome = $cognome;
		$this->num_biglietti = $num_biglietti;
		$this->articoloID = $articolo_id;
		$this->data = $data;
		$this->titolo = $titolo;
		$this->prezzo = $prezzo;
		$this->foto = $foto;
		$this->categoria = $categoria;
		$this->status = $status;
		$this->posti_disponibili = $posti_disponibili;
	}

	public function getUserID(){
		return $this->userID;
	}
	public function getNome(){
		return $this->nome;
	}
	public function getCognome(){
		return $this->cognome;
	}
	public function getNum_biglietti(){
		return $this->num_biglietti;
	}
	public function getCosto_tot(){
		$this->costo_tot= $this->num_biglietti * $this->prezzo;
		return $this->costo_tot;
	}
	public function getArticolo(){
		return $this->articoloID;
	}
	public function getData(){
		return $this->data;
	}
	public function getTitolo(){
		return $this->titolo;
	}
	public function getPrezzo(){
		return $this->prezzo;
	}
	public function getFoto(){
		return $this->foto;
	}
	public function getCategoria(){
		return $this->categoria;
	}
	public function getStatus(){
		return $this->status;
	}
	public function getPosti_disponibili(){
		return $this->posti_disponibili;
	}
}