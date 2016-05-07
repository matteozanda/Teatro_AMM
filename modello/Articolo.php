<?php

// stiamo creando la classe Articolo


class Articolo{
	public $id;
	public $nome;
	public $sottotitolo;
	public $prezzo;
	public $testo;
	public $foto;
	public $status;
	public $data;
	public $posti_disponibili;

/*	rendere tutti private */

	


//	public function __construct ($nome, $tipologia, $schermo, $ram, $cpu, $hdd, $os, $descrizione, $num_disponibili, $prezzo)
	public function __construct ($_id, $_nome, $_sottotitolo, $_testo, $_prezzo, $_foto, $_status, $_data, $_posti_disponibili)
	{	$this->id= $_id;
		$this->nome = $_nome;
		$this->sottotitolo = $_sottotitolo;
		$this->prezzo = $_prezzo;
		$this->testo = $_testo;
		$this->foto = $_foto;
		$this->status = $_status;
		$this->data = $_data;
		$this->posti_disponibili = $_posti_disponibili;
	}
/*
	public function getNome(){
		return $this->nome;
	}
	public function getPrezzo(){
		return $this->prezzo;
	}
*/
}