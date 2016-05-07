<html>
	<body>

		<?PHP
			session_start();
			//setcookie("login");
			//print "Arrivederci!";

			unset($_SESSION["username"]);
			unset($_SESSION["ruolo_utente"]);
		
			echo 'You have cleaned session';
			header('Refresh: 2; URL = index.php');
		?>

	</body>
</html>