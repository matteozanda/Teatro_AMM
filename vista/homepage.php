<!DOCTYPE html>

<?php include_once("vista/componenti/head.php"); ?>

<body>
	<div class="wrapper">
		<header>
            	<?php include_once("vista/componenti/header_image.php"); ?>
		</header>	
        <?php include_once("vista/componenti/topmenu.php"); 
        //include_once("vista/componenti/sidebar_L.php");
        include_once("vista/componenti/sidebar_R.php");

            //*****************************
            include_once ("connect_db.php");
            //*****************************
		 ?>
            <div class="page_2colonne">
			<ul>
				<li><a href="index.php?comando=catalogo"> Catalogo </a></li>
			</ul> 
		</div>	

		<footer>
			<?php include_once("vista/componenti/footer.php"); ?>
		</footer>
	</div>
</body>

