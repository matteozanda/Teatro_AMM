<?php

class DettaglioOrdine
{
   // attributi
   public $nomeArticolo;
   public $quantita;
   public $prezzo;

   public function __construct($_NomeArticolo, $_Quantita, $_Prezzo)
   {
      $this->nomeArticolo = $_NomeArticolo;
      $this->quantita = $_Quantita;
      $this->prezzo = $_Prezzo;
   }
}

?>