<?php
// stiamo creando la classe user


/*
	STRUTTURA DB UTENTI
		ID
		nome
		cognome
		password
		ruolo
		connected
		timestamp
*/

class Utente{

	public $ID;
	public $nome;
	public $cognome;
	//private $password <- la escludo perchè viene gestita dal db 
	public $ruolo;
	public $connected;
	public $timestamp;

	public function __construct ($ID, $nome, $cognome, $ruolo, $connected, $timestamp)
	{	$this->ID = $ID;
		$this->nome = $nome;
		$this->cognome = $cognome;
		$this->ruolo = $ruolo;
		$this->connected = $connected;
		$this->timestamp = $timestamp;
	}

	public function getID(){
		return $this->ID;
	}
	public function getNome(){
		return $this->nome;
	}
	public function getCognome(){
		return $this->cognome;
	}
	public function getTipoUtente(){
		return $this->ruolo;
	}
	public function getConnected(){
		return $this->connected;
	}
	public function getTimestamp(){
		return $this->timestamp;
	}
}