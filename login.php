<?php

    // Avvia la sessione
    session_start();
    // Verifica l'accesso
    /*if(isset($_SESSION["username"]))
    {
        // Vai alla home
        header("Location: home.php");
        exit;
    }*/

    // Verifica l'esistenza di dati POST
    if(isset($_POST["username"]) && isset($_POST["password"]))
    {
        // Connetti al database
        $conn = mysqli_connect("localhost", "root", "", "dbhw1");
        //escapde delle credenziali
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        // Cerca utenti con quelle credenziali
        $query = "SELECT * FROM clienti WHERE username = '".$_POST['username']."'";
        $res = mysqli_query($conn, $query);
        // Verifica la correttezza delle credenziali
        if(mysqli_num_rows($res) > 0)
        {
            $login = mysqli_fetch_assoc($res);
            if(password_verify($_POST['password'], $login['password'])){
            // Imposta la variabile di sessione
            $_SESSION["username"] = $_POST["username"];
            // Vai alla pagina home_db.php
            header("Location: home.php");
            mysqli_free_result($res);
                mysqli_close($conn);
            exit;
        }
        else
        {
            // Flag di errore
            $errore = true;
        }
    }
}
?>
<html>
    <head>
        <link rel='stylesheet' href='login.css'>
        <script src='login.js' defer></script>
    </head>
    <body>
    <header>
            <nav>
                <div id="logo">
                    <img src="./images/logo.png">
                </div>
                <div id="links">
                <a href="signup.php">Registrati</a>
                </div>
            </nav>
    </header>
        <section>
        <main id='setlogin'>
                <?php
                if(isset($errore)){
                    echo "<p class='errore'>Credenziali non valide.</p>";
                }
                ?>
                <form name='form' method='post'>
                    <p><label>Username <input type='text' name='username'></label></p>
                    <p><label>Password <input type='password' name='password'></label></p>

                    <p><label>&nbsp;<input type='submit'></label></p>
                </form>
                <div id='avviso' class='hidden'>Errore compilazione</div>
            </main>
            </section> 
            
    </body>
</html>