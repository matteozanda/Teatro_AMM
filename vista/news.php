<!DOCTYPE html>

<?php include_once("vista/componenti/head.php"); ?>

<body>
	<div class="wrapper">
		
		<header>
            <?php include_once("vista/componenti/header_image.php"); ?>
		</header>	
        <?php include_once("vista/componenti/topmenu.php"); 
        //include_once("vista/componenti/sidebar_L.php");
        include_once("vista/componenti/sidebar_R.php"); ?>
        
		<div class="page_2colonne">
			<h1>News</h1>
			<h3>direttamente dal sito teatro.it</h3>
			


									<script language="Javascript">
/*										
										//Funzione per la gestione asincrona AJAX
										function xmlhttpPost(strURL) {
										
											//Inizializzo l'oggetto xmlHttpReq
											var xmlHttpReq = false;
											var self = this;
											
											// qui valutiamo la tipologia di browser utilizzato per selezionare la tipologia di oggetto da creare.
											// Se sono in un browser Mozilla/Safari, utilizzo l'oggetto XMLHttpRequest per lo scambio di dati tra browser e server.
											if (window.XMLHttpRequest) {
											self.xmlHttpReq = new XMLHttpRequest();
											}
											
											// Se sono in un Browser di Microsoft (IE), utilizzo Microsoft.XMLHTTP
											//che rappresenta la classe di riferimento per questo browser
											else if (window.ActiveXObject) {
											self.xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");
											}
											
											//Apro il canale di connessione per regolare il tipo di richiesta.
											//Passo come parametri il tipo di richiesta, url e se è o meno un operazione asincrona (isAsync)
											self.xmlHttpReq.open('POST', strURL, true);
											 
											//setto l'header dell'oggetto
											self.xmlHttpReq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
											 
											// Passo alla richiesta i valori del form in modo da generare l'output desiderato
											//self.xmlHttpReq.send(recuperaValore());
											self.xmlHttpReq.send(recuperaValore());

											 
											// Valuto lo stato della richiesta 
											self.xmlHttpReq.onreadystatechange = function() {
												//Gli stai di una richiesta possono essere 5
												// 0 - UNINITIALIZED
												// 1 - LOADING
												// 2 - LOADED
												//* 3 - INTERACTIVE
												//* 4 - COMPLETE
											 
												//Se lo stato è completo
												if (self.xmlHttpReq.readyState == 4) {
													// Aggiorno la pagina con la risposta ritornata dalla precendete richiesta dal web server.
													// Quando la richiesta è terminata il responso della richiesta è disponibie come responseText.
													aggiornaPagina(self.xmlHttpReq.responseText);
												}
											}
										}

										//Questa funzione recupera i dati dal form.
										function recuperaValore() {
											var form = document.forms['form'];
											var nome = form.nome.value;
											valore = 'nome=' + escape(nome);
											return valore;
										}
										//Questa funzione viene richiamata dall'oggetto xmlHttpReq per l'aggiornamento asincrono dell'elemento risultato
										function aggiornaPagina(stringa){
											document.getElementById("risultato").innerHTML = stringa;
										}
*/									</script>




<script>
function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "gethint.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>
</head>
<body>

<p><b>Start typing a name in the input field below:</b></p>
<form> 
First name: <input type="text" onkeyup="showHint(this.value)">
</form>
<p>Suggestions: <span id="txtHint"></span></p>



				<!-- Questo è il form, ad ogni submit del forum viene richiamata la funzione xmlhttpPost
				che ha come argomento il file esempio_ajax che esamineremo successicamente. 
				<form name="form" onSubmit="javascript:xmlhttpPost('vista/esempio_ajax.php'); return false;">
					<p>Qual'&egrave; il tuo nome?
					<input name="nome" type="text">
					<input value="Invia" type="submit">
					</p>
					<div id="risultato"></div>
				</form>


-->





		</div>	

		<footer>
			<?php include_once("vista/componenti/footer.php"); ?>
		</footer>
	</div>
</body>