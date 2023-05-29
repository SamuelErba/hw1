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
    <link rel="stylesheet" href="home.css">
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
    <section>
        <div id="opzioni">
            <div>
                <img src="./images/ricettario.png" />
                <h1>Ricettario</h1>
                <a class="button" href="ricetta.php">Visita</a>
                <p><em>Cerca la tua ricetta</em></p>
            </div>
            <div>
                <img src="./images/prova.png" />
                <h1>Shop</h1>
                <a class="button" href="shop.php">Visita</a>
                <p><em>Scopri i nostri box</em></p>
            </div>
        </div>
    </section>
    </body>
</html>