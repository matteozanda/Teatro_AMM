<!DOCTYPE html>

<?php include_once("vista/componenti/head.php"); ?>

<body>
    <div class="wrapper">
        <header>
            <?php include_once("vista/componenti/header_image.php"); ?>
        </header>   

        <?php
            include_once("vista/componenti/topmenu.php"); 
            include_once("vista/componenti/sidebar_R.php");
        ?>
        
        <div class="page_2colonne">
            <div id="loginpage">
                 
                <div id="accedi">
                    <h3>ACCEDI</h3>
                    <form action="index.php?comando=accedi"  method="post" enctype="multipart/form-data">
                        <input type="text" name="nome" placeholder="Username" required autofocus>
                        <input type="password" name="password" placeholder="Password" required>
                        <button>Login</button>
                    </form></br></br></br>
                </div>

                <div id="registrati">
                    <h3>REGISTRATI</h3>
                    <form action="index.php?comando=newuser"  method="post" enctype="multipart/form-data">
                        <input type="text" name="nome" placeholder="Nome" required>
                        <input type="text" name="cognome" placeholder="Cognome" required></br>
                        <input type="password" name="password" placeholder="Password" required>
                        <button>Registrati</button>
                    </form>
                </div>
            </div>
        </div>  

        <footer>
            <?php include_once("vista/componenti/footer.php"); ?>
        </footer>
    </div>
</body>