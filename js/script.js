
	function deleteArticle(id)
	{
		var r = confirm("Sei sicuro di voler eliminare l'articolo dal database?");
	    if (r == true) {
	        location.href = "index.php?comando=deleteArticle&ID="+id;
	    }
	}

	function deleteUser(id)
	{
		var r = confirm("Sei sicuro di voler eliminare l'utente dal database?");
	    if (r == true) {
	        location.href = "index.php?comando=deleteUser&ID="+id;
	    }
	}


