<?php
    // Avvia la sessione
    session_start();
    // Verifica se l'utente è loggato
    if(!isset($_SESSION['username']))
    {
        // Vai alla login
        header("Location: login.php");
        exit;
    }

?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="carrello.css">
    <script src="carrello.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <header>
    <nav>
                <div id="logo">
                    <img src="./images/logo.png">
                </div>
                <div id="links">
                <a href="home.php">Home</a>
                <a href="shop.php">Shop</a>
                <a href="ricetta.php">Ricettario</a>
                <a href="carrello.php">Carrello</a>
                <a href="logout.php">Esci</a>
                </div>
            </nav>
    </header>

    <article>
      <section>
            <div class="negozio">
            <div class="newdiv"></div>
            </div>
            
        </section> 

      

    </article>
</html>