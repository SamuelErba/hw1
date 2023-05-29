<?php
    session_start();
    /*if(isset($_SESSION["username"])) {
        header("Location: home.php");
        exit;
    }*/

    // Verifica l'esistenza di dati POST
    if(isset($_POST["nome"]) && isset($_POST['cognome']) && isset($_POST['codice_fiscale']) && 
       isset($_POST['username']) && isset($_POST['password'])){
        $nome = $_POST["nome"];
        $cognome = $_POST["cognome"];
        $codice_fiscale = $_POST["codice_fiscale"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        
        if(strlen("$password")<=6 ){
            $errore_password = true; 
        }
        
        if(isset($_POST["username"])){
            $conn = mysqli_connect("localhost", "root", "", "dbhw1");
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $query = "SELECT username FROM clienti where username=\"$username\"";
            $res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));
            if (mysqli_num_rows($res) > 0)
                $errore_username = true;
            mysqli_free_result($res);
            mysqli_close($conn);
        }

        if(!isset($errore_username) && !isset($errore_password)){
        // Connetti al database
        $conn = mysqli_connect("localhost", "root", "", "dbhw1");
        if(!$conn){
            die('controllare ingresso db:' .mysql_error());
         }
        $nome = mysqli_real_escape_string($conn, $_POST['nome']);
        $cognome = mysqli_real_escape_string($conn, $_POST['cognome']);
        $codice_fiscale = mysqli_real_escape_string($conn, $_POST['codice_fiscale']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $pw = password_hash($password, PASSWORD_DEFAULT);
        
        // Cerca utenti con quelle credenziali
        $query = "INSERT INTO clienti VALUES (\"$nome\", \"$cognome\", \"$codice_fiscale\", \"$username\", \"$pw\")";
        $res = mysqli_query($conn, $query);
        mysqli_close($conn);
        $_SESSION["username"] = $username;
        header("Location: home.php");
        exit;
        }
    }
?>

<html>
    <head>
        <script src='signup.js' defer></script>
        <link rel='stylesheet' href='signup.css'>
    </head>
    <body>
    <header>
            <nav>
                <div id="logo">
                    <img src="./images/logo.png">
                </div>
                <div id="links">
                <a href="home.php">Accedi</a>
                <a href="signup.php">Registrati</a>
                </div>
            </nav>
    </header>
        <section>
        <main id='setsign'>
                <form name='form' method='post'>
                    <p><label>Nome <input type='text' name='nome'></label></p>
                    <p><label>Cognome <input type='text' name='cognome'></label></p>
                    <p><label>Codice Fiscale <input type='text' name='codice_fiscale'></label></p>
                    <p><label>Username <input type='text' name='username'></label></p>
                    <p><label>Password <input type='password' name='password'></label></p>
                    <p><label>&nbsp;<input type='submit'></label></p>
                </form>
                <div id='warning' class='hidden'>Campi non corretti</div>
            </main> 
            <div id="errore">
                <?php
                    if (isset($errore_password)){
                    echo "<span> usa almeno 7 caratteri </span><br>";
                    }  
                    
                    if (isset($errore_username)) {
                        echo "<span>Username già esistente</span><br>";
                    }
                ?>
            </div>
            </section>
    </body>
</html>
