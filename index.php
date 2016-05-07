<?php 
	session_start();
	include_once("controllo/ControllerGenerico.php");

	$controllo = new genericController();
	$controllo->invoke();


	date_default_timezone_set("Europe/Rome");





?>
