<!DOCTYPE html>
<!--
		<div class="page_2colonne">
			<h1>Poltroncine</h1>
			<div class="piantaTeatro">
				<img style=" width: 100%;" src="immagini/m2webRidotta.jpg" usemap="mappaPoltroncine">
				<map name="mappaPoltroncine">
					<area shape=”rect” coords="40%, 50%, 70%, 70%" href="&palco" target=”_blank” alt=”Palco”>
					<area shape="rect" coords="195,169,212,191"  nohref="nohref" />
					<area shape="rect" coords="214,168,228,192"  nohref="nohref" />
					<area shape="rect" coords="230,168,243,192"  nohref="nohref" />
					<area shape="rect" coords="246,169,259,193"  nohref="nohref" />
					<area shape="rect" coords="262,168,275,192"  nohref="nohref" />
					<area shape="rect" coords="231,491,520,619" alt="Palco"  nohref="nohref" />
				</map>
			</div>	
		</div>	
-->



<head>

	<meta charset="UTF-8">
	<meta name="description" content="Esercitazione di AMM">
	<link rel="stylesheet" type="text/css" href="vista/css/stile.css">

   	<script type='text/javascript' src="js/script.js"></script>
	<title>Esercitazione di AMM</title>


    <style type="text/css">
        #sidebar{position:relative;clear: left; left:0;display: block;}
        #box {position:relative; float: left; left:75px;top:10; border:solid 2px blue;background-color:gray;height :200px;width:200px;}
        #box1{position:relative; z-index:5;left:50px ;top:50px;height: 25px;width:75px;background-color :green;display:none;}
        #box2{position:relative; z-index:5;left:20px ;top:75px;height: 25px;width:75px;background-color :red;display:none;}
        #box3{position:relative; z-index:5;left:70px ;top:110px;height: 25px;width:75px;background-color :blue;display:none;}

        #box2_{position:relative; float: left; left:75px ;border:solid 2px blue;background-color:gray;height :200px;width:200px;}
        #box2_1{position:relative; z-index:5;left: 50px;top:50px;height :25px;width:75px; border:solid 2px blue ;}
        #box2_2{position:relative; z-index:5;left: 25px;top:100px;height :25px;width:75px; border:solid 2px blue ;}
        #box2_3{position:relative; z-index:5;left: 80px;top:110px;height :25px;width:75px; border:solid 2px blue ;}

        #box2_1:hover{background-color:green ;}
        #box2_2:hover{background-color:red ;}
        #box2_3:hover{background-color:blue ;}

		div#poltroncine {
		    float: left;
		    display: block;
		}

        #poltroncine div:hover {background-color: aquamarine;}

        #poltroncine div {
		    background-color: white;
		    font-size: xx-small;
		    width: 25px;
		    height: 10px;
		    border: solid 1px;
		    border-radius: 2px;
		    padding-top: 15px;
		    text-align: right;
		}

		div#palco {
		    background-color: #73CECE;
		    width: 100%;
		    height: 30px;
		    border: solid 1px;
		    border-radius: 2px;
		    text-align: center;
		    padding-top: 15px;
		}

        div#nulla {background-color: white;  border: solid 0px;}

		div#selezionato {
		    width: 150px;
		    height: 150px;
		    background-color: purple;
		    float: left;
		    display: block;
		}

    </style>

    <script language="javascript" type="text/javascript">
        function show(selezionato)
        {
            var div = document.getElementById(selezionato);
            div.style.display = 'block';
        }
        function hide(selezionato)
        {
            var div = document.getElementById(selezionato);
            div.style.display = 'none';
        }
	</script>
</head>

<body>

	<div class="wrapper">
		
		<header>
            <?php include_once("vista/componenti/header_image.php"); ?>
		</header>	
        
        <?php include_once("vista/componenti/topmenu.php"); 
        include_once("vista/componenti/sidebar_R.php"); ?>
        
		<div style="min-height: 500px"; class="page_2colonne">
<!--	    <div id="sidebar">
		        <br/>Show/Hide<br/>
		        <a href="javascript:;" onclick="show('box1')" onmouseout ="hide('box1')">Box 1</a><br />
		        <a href="javascript:;" onmouseover="show('box2')" onmouseout ="hide('box2')">Box 2</a><br />
		        <a href="javascript:;" onmouseover="show('box3')" onmouseout ="hide('box3')">Box 3</a><br />
		        <br/>Show Only<br/>
		        <a href="javascript:;" onmouseover="show('box1')">Box 1</a><br />
		        <a href="javascript:;" onmouseover="show('box2')">Box 2</a><br />
		        <a href="javascript:;" onmouseover="show('box3')">Box 3</a><br />
		    </div>

		    <div id="box">
		        <div id="box1"> BOX 1</div>
		        <div id="box2"> BOX 2</div>
		        <div id="box3"> BOX 3</div>
		    </div>
		    <div id="box2_">
		        <div id="box2_1"> BOX 2_1</div>
		        <div id="box2_2"> BOX 2_2</div>
		        <div id="box2_3"> BOX 2_3</div>
		    </div>		
-->	


<h1>Prenotazione Poltroncine</h1>
<div id="poltroncine" >
	<table>
			<?php
				$num=0;
				for($j=0;$j<10;$j++){
					echo "<tr>";
					for($i=0;$i<5;$i++){
						$num=($j.$i)+1;
						//<td><div id= p".$j.$i.">".$num."</div></td>";

						echo "
							<td><a href=javascript:; onmouseover=show('selezionato'); onmouseout =hide('selezionato');>
								<div id= p".$j.$i.">".$num."</div>
							</a></td>
						";
					}
					echo "<td><div id= nulla> </div></td>";
					for($i=5;$i<10;$i++){
						$num=($j.$i)+1;
						echo "
							<td><a href=javascript:; onmouseover=show('selezionato'); onmouseout =hide('selezionato');>
								<div id= p".$j.$i.">".$num."</div>
							</a></td>
						";
					}
					echo "</tr>";
				}
			?>
		<tr><td colspan="11"><div id="palco">PALCO</div></td></tr>

	</table>
</div>

<div id="selezionato">
</div>




		</div>	

		<footer>
			<?php include_once("vista/componenti/footer.php"); ?>
		</footer>
	</div>

</body>
