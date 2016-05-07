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
			<h1>  Carrello </h1>

			<table>
			<tr><th>Articolo</th><th>Quantit&agrave;</th><th>Prezzo unitario</th><th>Importo</th></tr>
			<?php foreach($elenco as $dettaglio) { ?>

			<tr>
			<td> <?= $dettaglio->nomeArticolo ?> </td>
			<td> <?= $dettaglio->quantita ?> </td>
			<td> <?= $dettaglio->prezzo ?> &euro; </td>
			<td> <?= $dettaglio->quantita * $dettaglio->prezzo ?> &euro; </td>
			</tr>

			<?php } ?>
			<tr>
			<td colspan="3"><strong>Totale</strong></td>
			<td><strong><?= $totale ?> &euro;</strong></td>
			</tr>
			</table>

			<p>
			<a href="index.php?comando=catalogo"> Torna al catalogo </a>
			</p>

		</div>	

		<footer>
			<?php include_once("vista/componenti/footer.php"); ?>
		</footer>
	</div>
</body>

